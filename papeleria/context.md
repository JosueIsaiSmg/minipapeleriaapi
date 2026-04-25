# Bundle API Context

## Objetivo General Del Proyecto

Bundle API es una API construida con Laravel 12 y PHP 8.2 para administrar productos, servicios y paquetes (`bundles`) de una papeleria o centro de copiado. El objetivo funcional es modelar ofertas compuestas donde un bundle puede incluir articulos fisicos y servicios, mientras que cada servicio puede definir:

- consumibles requeridos para ejecutarse
- reglas de precio segun contexto
- exposicion REST para integracion externa
- administracion interna mediante Filament

La arquitectura actual esta centrada en Eloquent, controladores `apiResource`, seeders de datos base y recursos Filament para operacion administrativa.

## Stack Y Capas

- Backend: Laravel 12
- Lenguaje: PHP 8.2
- ORM: Eloquent
- Panel admin: Filament 4
- Documentacion API: Scribe
- Pruebas: PHPUnit 11

Capas principales:

1. `app/Models`: modelo de dominio y relaciones.
2. `app/Http/Controllers`: CRUD REST para consumo externo.
3. `app/Filament`: operacion administrativa.
4. `database/migrations`: contrato estructural de persistencia.
5. `database/seeders`: datos de referencia y ejemplos funcionales.

## Modelos Principales

### Bundle

Representa un paquete comercial.

Responsabilidades:

- agrupar multiples items
- exponer nombre y descripcion del paquete
- servir como agregado raiz de `BundleItem`

Implementacion actual:

```php
class Bundle extends Model
{
    protected $fillable = ['name', 'description'];

    public function items()
    {
        return $this->hasMany(BundleItem::class);
    }
}
```

### BundleItem

Representa una linea dentro de un bundle. Su funcion es enlazar el bundle con un item concreto y la cantidad incluida.

Responsabilidades:

- enlazar un bundle con un producto o servicio
- almacenar la cantidad del item dentro del paquete
- resolver el item real por relacion polimorfica

Implementacion actual:

```php
use App\Enums\ItemType;

class BundleItem extends Model
{
    protected $fillable = ['bundle_id', 'item_type', 'item_id', 'quantity'];

    protected $casts = [
        'item_type' => ItemType::class,
    ];

    public function bundle()
    {
        return $this->belongsTo(Bundle::class);
    }

    public function item()
    {
        return $this->morphTo();
    }
}
```

### Service

Representa un servicio vendible, por ejemplo impresion, enmicado o engargolado.

Responsabilidades:

- definir el catalogo de servicios
- concentrar reglas de precio
- concentrar consumibles necesarios
- permitir su inclusion en bundles

Implementacion actual:

```php
class Service extends Model
{
    protected $fillable = ['name', 'description'];

    public function pricingRules()
    {
        return $this->hasMany(ServicePricingRule::class);
    }

    public function consumables()
    {
        return $this->hasMany(ServiceConsumable::class);
    }

    public function bundleItems()
    {
        return $this->morphMany(BundleItem::class, 'item');
    }
}
```

### ServiceConsumable

Describe que producto consume un servicio y en que cantidad.

Responsabilidades:

- vincular un servicio con un producto inventariable
- definir unidades consumidas por ejecucion
- acotar consumo por material si aplica

Implementacion actual:

```php
class ServiceConsumable extends Model
{
    protected $fillable = [
        'service_id',
        'product_id',
        'units_per_service',
        'material',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
```

### ServicePricingRule

Define una regla de precio para un servicio en funcion de criterios operativos.

Responsabilidades:

- fijar precio por condiciones de negocio
- soportar segmentacion por cantidad, material, tamano o tipo documental
- aislar la logica de tarifacion del modelo `Service`

Implementacion actual:

```php
class ServicePricingRule extends Model
{
    protected $fillable = [
        'service_id',
        'condition_type',
        'condition_value',
        'min_quantity',
        'max_quantity',
        'material',
        'size',
        'doc_type',
        'price',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
```

## Relaciones Entre Los Modelos

### Mapa Relacional

- `Bundle 1:N BundleItem`
- `BundleItem N:1 Bundle`
- `BundleItem morphTo item`
- `Product 1:N BundleItem` via polimorfismo
- `Service 1:N BundleItem` via polimorfismo
- `Service 1:N ServiceConsumable`
- `ServiceConsumable N:1 Product`
- `Service 1:N ServicePricingRule`

### Diagrama Conceptual

```text
Bundle
  └── BundleItem
        ├── item_type = product  -> Product
        └── item_type = service  -> Service
                                      ├── ServiceConsumable -> Product
                                      └── ServicePricingRule
```

### Ejemplo De Carga Del Agregado

```php
$bundle = Bundle::with('items.item')->findOrFail($id);

foreach ($bundle->items as $item) {
    $modelo = $item->item;
    $cantidad = $item->quantity;
}
```

## Enums

## `ItemType`

Enum implementado actualmente en `app/Enums/ItemType.php`.

```php
enum ItemType: string
{
    case Product = 'product';
    case Service = 'service';
}
```

Uso esperado:

- serializar el tipo logico del item dentro del bundle
- alimentar selects en formularios
- reducir strings sueltos en codigo de aplicacion

## `ConsumableType`

No existe implementado hoy en el repositorio. Se recomienda agregarlo para formalizar el tipo de consumo y evitar usar `material` como campo ambiguo.

Ejemplo recomendado:

```php
enum ConsumableType: string
{
    case Base = 'base';
    case Material = 'material';
    case Finish = 'finish';
}
```

Uso recomendado:

- distinguir insumo base del servicio frente a variantes por material o acabado
- permitir validaciones consistentes en API y Filament

## `PricingRuleType`

No existe implementado hoy en el repositorio. Se recomienda agregarlo para reemplazar `condition_type` libre.

Ejemplo recomendado:

```php
enum PricingRuleType: string
{
    case Quantity = 'quantity';
    case Material = 'material';
    case Size = 'size';
    case DocumentType = 'doc_type';
}
```

Uso recomendado:

- eliminar valores arbitrarios en `condition_type`
- centralizar reglas admitidas por el motor de precios

## Logica De Negocio Por Entidad

### Bundle

- no calcula precios por si mismo en la implementacion actual
- actua como contenedor comercial
- debe cargar siempre `items.item` cuando se necesite informacion completa

Regla sugerida:

- un bundle no deberia quedar sin items una vez publicado

### BundleItem

- admite producto o servicio como item polimorfico
- controla cuantas unidades del item forman parte del bundle
- depende de que `item_type` y `item_id` sean coherentes

Observacion importante:

- la migracion guarda `item_type` como string simple
- el seeder usa `Product::class` y `Service::class`
- el enum `ItemType` usa valores `product` y `service`

Esa mezcla introduce riesgo de incompatibilidad en `morphTo()`. La convencion debe unificarse antes de automatizar generacion de codigo.

### Service

- es la entidad central del dominio operativo
- encapsula que insumos consume y bajo que reglas se cobra
- puede venderse solo o dentro de un bundle

Regla sugerida:

- todo servicio cobrable deberia tener al menos una `ServicePricingRule`

### ServiceConsumable

- expresa consumo tecnico de inventario
- permite estimar costo y rebaja de stock por ejecucion
- el campo `material` hoy funciona como filtro contextual simple

Observacion:

- la migracion permite `decimal(10,3)` en `units_per_service`
- `store()` valida entero minimo 1
- `update()` valida numerico minimo 0

Hay inconsistencia de validacion. La practica correcta es aceptar decimal positivo si el negocio requiere fracciones.

### ServicePricingRule

- modela la tarifa aplicable a un servicio
- soporta rango de cantidades y filtros adicionales
- deja abierta la posibilidad de un motor de resolucion posterior

Observacion:

- `condition_type` y `condition_value` aun no estan normalizados con enums
- no existe un servicio de dominio para resolver la mejor regla activa

Ejemplo recomendado de resolucion:

```php
$rule = $service->pricingRules()
    ->where('condition_type', 'quantity')
    ->where('min_quantity', '<=', $qty)
    ->where(function ($query) use ($qty) {
        $query->whereNull('max_quantity')
            ->orWhere('max_quantity', '>=', $qty);
    })
    ->orderByDesc('min_quantity')
    ->first();
```

## API Y Flujo De Integracion

La API expone CRUD REST con `Route::apiResource(...)` para:

- `products`
- `services`
- `service-pricing-rules`
- `service-consumables`
- `bundles`
- `bundle-items`

Ejemplo de alta de bundle:

```php
POST /api/bundles

[
    'name' => 'Kit Escolar Basico',
    'description' => 'Paquete con hojas y servicio de impresion',
]
```

Ejemplo de alta de item dentro del bundle:

```php
POST /api/bundle-items

[
    'bundle_id' => 1,
    'item_type' => 'product',
    'item_id' => 1,
    'quantity' => 2,
]
```

Nota de arquitectura:

- el controlador actual documenta `item_type` como clase FQCN en algunos comentarios
- el enum y la intencion del dominio apuntan a `product|service`

Se debe fijar un unico contrato antes de ampliar clientes.

## Pautas De Integracion Con Copilot, Codex Y Gemini

### Instrucciones Generales

- tratar `Bundle` como agregado y `BundleItem` como entidad hija
- preservar relaciones Eloquent existentes antes de refactorizar
- no introducir strings libres para tipos si existe o debe existir un enum
- cuando se toquen controladores, alinear validaciones con migraciones y casts
- cargar relaciones explicitas en respuestas API para evitar N+1 y respuestas incompletas

### Para Copilot

- pedir sugerencias a nivel de metodo pequeno, no de archivo entero
- proporcionar contexto del modelo relacionado antes de aceptar codigo
- revisar especialmente sugerencias sobre `morphTo()` y valores de `item_type`

Prompt sugerido:

```php
// Genera validacion Laravel para BundleItem usando ItemType enum
// y manteniendo compatibilidad con una relacion polimorfica item().
```

### Para Codex

- usar primero lectura del dominio, migraciones y seeders antes de editar
- documentar en el cambio si el comportamiento corresponde a estado actual o estandar recomendado
- no asumir que `ConsumableType` y `PricingRuleType` ya existen

Prompt sugerido:

```php
// Refactoriza BundleItemController para validar item_type con ItemType
// y conserva compatibilidad con la estrategia morfica definida por el proyecto.
```

### Para Gemini

- usarlo para contrastar reglas de negocio y detectar huecos de consistencia
- no aceptar refactors grandes sin corroborar con migraciones y relaciones reales
- pedir propuestas de casos de prueba, no solo snippets

Prompt sugerido:

```php
// Propone casos de prueba para ServicePricingRule considerando
// min_quantity, max_quantity, material y ausencia de regla aplicable.
```

### Regla Operativa Para Los Tres

Toda IA debe distinguir entre:

- comportamiento actualmente implementado
- convencion recomendada
- deuda tecnica detectada

Si esa separacion no existe, el asistente tendera a consolidar bugs en lugar de corregirlos.

## Estrategia De Automatizacion De Cambios (CI/CD)

El repositorio no muestra un pipeline CI/CD versionado actualmente. La estrategia recomendada es la siguiente.

### CI

Disparadores:

- `push` a ramas activas
- `pull_request` hacia `main`

Pasos minimos:

1. `composer install --no-interaction --prefer-dist`
2. `cp .env.example .env`
3. `php artisan key:generate`
4. configurar SQLite o base efimera
5. `php artisan migrate --force`
6. `php artisan db:seed --force` si se requieren fixtures
7. `vendor/bin/pint --test`
8. `php artisan test`
9. `php artisan scribe:generate` o validacion equivalente si la documentacion API forma parte del contrato

Ejemplo de job:

```yaml
name: ci

on:
  push:
  pull_request:

jobs:
  test:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
      - run: composer install --no-interaction --prefer-dist
      - run: cp .env.example .env
      - run: php artisan key:generate
      - run: touch database/database.sqlite
      - run: php artisan migrate --force
      - run: vendor/bin/pint --test
      - run: php artisan test
```

### CD

Recomendacion:

- desplegar solo desde `main`
- bloquear despliegue si fallan pruebas o formato
- ejecutar migraciones de forma automatizada y controlada
- regenerar assets y documentacion antes de publicar

Flujo recomendado:

1. merge a `main`
2. ejecutar CI completo
3. construir artefacto
4. correr `php artisan migrate --force`
5. publicar aplicacion
6. smoke test contra endpoints criticos

## Riesgos Y Deuda Tecnica Visible

- falta implementar `ConsumableType`
- falta implementar `PricingRuleType`
- inconsistencia entre enum `ItemType`, seeders y comentarios del controlador
- inconsistencia de validaciones numericas en `ServiceConsumableController`
- no existe servicio de dominio para resolver precios de manera deterministica
- no hay pipeline CI/CD versionado en el repositorio

## Recomendaciones Inmediatas

1. Unificar el contrato de `BundleItem.item_type`.
2. Introducir `PricingRuleType` y `ConsumableType`.
3. Crear pruebas unitarias para resolucion de reglas de precio.
4. Mover la seleccion de tarifa a un servicio de dominio, por ejemplo `ServicePriceResolver`.
5. Versionar pipeline CI antes de expandir el uso de asistentes IA sobre el repositorio.

