# API Usage

## Base URL

```bash
http://127.0.0.1:8000/api
```

Headers:

```bash
Accept: application/json
Content-Type: application/json
```

## Products

### List products

```bash
curl -X GET http://127.0.0.1:8000/api/products \
  -H "Accept: application/json"
```

### Create product

```bash
curl -X POST http://127.0.0.1:8000/api/products \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Hojas blancas",
    "description": "Paquete de hojas bond",
    "price": 80,
    "stock": 500,
    "category": "paper"
  }'
```

### Show product

```bash
curl -X GET http://127.0.0.1:8000/api/products/1 \
  -H "Accept: application/json"
```

### Update product

```bash
curl -X PUT http://127.0.0.1:8000/api/products/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Hojas blancas carta",
    "description": "Paquete de hojas bond tamaño carta",
    "price": 85,
    "stock": 450,
    "category": "paper"
  }'
```

### Delete product

```bash
curl -X DELETE http://127.0.0.1:8000/api/products/1 \
  -H "Accept: application/json"
```

## Services

### List services

```bash
curl -X GET http://127.0.0.1:8000/api/services \
  -H "Accept: application/json"
```

### Create service

```bash
curl -X POST http://127.0.0.1:8000/api/services \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Impresion",
    "description": "Servicio de impresion"
  }'
```

### Show service

```bash
curl -X GET http://127.0.0.1:8000/api/services/1 \
  -H "Accept: application/json"
```

### Update service

```bash
curl -X PUT http://127.0.0.1:8000/api/services/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Impresion laser",
    "description": "Servicio de impresion laser"
  }'
```

### Delete service

```bash
curl -X DELETE http://127.0.0.1:8000/api/services/1 \
  -H "Accept: application/json"
```

## Service Pricing Rules

### List pricing rules

```bash
curl -X GET http://127.0.0.1:8000/api/service-pricing-rules \
  -H "Accept: application/json"
```

### Create pricing rule

```bash
curl -X POST http://127.0.0.1:8000/api/service-pricing-rules \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "service_id": 1,
    "condition_type": "material",
    "condition_value": "opalina",
    "material": "opalina",
    "price": 10
  }'
```

### Show pricing rule

```bash
curl -X GET http://127.0.0.1:8000/api/service-pricing-rules/1 \
  -H "Accept: application/json"
```

### Update pricing rule

```bash
curl -X PUT http://127.0.0.1:8000/api/service-pricing-rules/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "service_id": 1,
    "condition_type": "quantity",
    "min_quantity": 100,
    "price": 2
  }'
```

### Delete pricing rule

```bash
curl -X DELETE http://127.0.0.1:8000/api/service-pricing-rules/1 \
  -H "Accept: application/json"
```

## Service Consumables

### List consumables

```bash
curl -X GET http://127.0.0.1:8000/api/service-consumables \
  -H "Accept: application/json"
```

### Create consumable

```bash
curl -X POST http://127.0.0.1:8000/api/service-consumables \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "service_id": 1,
    "product_id": 1,
    "units_per_service": 1,
    "material": "opalina"
  }'
```

### Show consumable

```bash
curl -X GET http://127.0.0.1:8000/api/service-consumables/1 \
  -H "Accept: application/json"
```

### Update consumable

```bash
curl -X PUT http://127.0.0.1:8000/api/service-consumables/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "service_id": 1,
    "product_id": 2,
    "units_per_service": 1,
    "material": "carta"
  }'
```

### Delete consumable

```bash
curl -X DELETE http://127.0.0.1:8000/api/service-consumables/1 \
  -H "Accept: application/json"
```

## Bundles

### List bundles

```bash
curl -X GET http://127.0.0.1:8000/api/bundles \
  -H "Accept: application/json"
```

### Create bundle

```bash
curl -X POST http://127.0.0.1:8000/api/bundles \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Kit escolar",
    "description": "Bundle de ejemplo"
  }'
```

### Show bundle

```bash
curl -X GET http://127.0.0.1:8000/api/bundles/1 \
  -H "Accept: application/json"
```

### Update bundle

```bash
curl -X PUT http://127.0.0.1:8000/api/bundles/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Kit escolar premium",
    "description": "Bundle actualizado"
  }'
```

### Delete bundle

```bash
curl -X DELETE http://127.0.0.1:8000/api/bundles/1 \
  -H "Accept: application/json"
```

## Bundle Items

### List bundle items

```bash
curl -X GET http://127.0.0.1:8000/api/bundle-items \
  -H "Accept: application/json"
```

### Create bundle item

```bash
curl -X POST http://127.0.0.1:8000/api/bundle-items \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "bundle_id": 1,
    "item_type": "product",
    "item_id": 1,
    "quantity": 2
  }'
```

### Show bundle item

```bash
curl -X GET http://127.0.0.1:8000/api/bundle-items/1 \
  -H "Accept: application/json"
```

### Update bundle item

```bash
curl -X PUT http://127.0.0.1:8000/api/bundle-items/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "bundle_id": 1,
    "item_type": "service",
    "item_id": 1,
    "quantity": 1
  }'
```

### Delete bundle item

```bash
curl -X DELETE http://127.0.0.1:8000/api/bundle-items/1 \
  -H "Accept: application/json"
```

## Customers

### List customers

```bash
curl -X GET http://127.0.0.1:8000/api/customers \
  -H "Accept: application/json"
```

### Create customer

```bash
curl -X POST http://127.0.0.1:8000/api/customers \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Juan Perez",
    "phone": "5551234567",
    "email": "juan@example.com"
  }'
```

### Show customer

```bash
curl -X GET http://127.0.0.1:8000/api/customers/1 \
  -H "Accept: application/json"
```

### Update customer

```bash
curl -X PUT http://127.0.0.1:8000/api/customers/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Juan Perez",
    "phone": "5557654321",
    "email": "juan@example.com"
  }'
```

### Delete customer

```bash
curl -X DELETE http://127.0.0.1:8000/api/customers/1 \
  -H "Accept: application/json"
```

## Orders

### List orders

```bash
curl -X GET http://127.0.0.1:8000/api/orders \
  -H "Accept: application/json"
```

### Create order with nested items

```bash
curl -X POST http://127.0.0.1:8000/api/orders \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "customer_id": 1,
    "status": "pending",
    "description": "100 impresiones en opalina",
    "photo_links": ["https://example.com/referencia.jpg"],
    "order_items": [
      {
        "item_type": "service",
        "item_id": 1,
        "quantity": 100,
        "meta": {
          "material": "opalina"
        }
      },
      {
        "item_type": "product",
        "item_id": 3,
        "quantity": 2
      }
    ]
  }'
```

### Show order

```bash
curl -X GET http://127.0.0.1:8000/api/orders/1 \
  -H "Accept: application/json"
```

### Update order with full item replacement

```bash
curl -X PUT http://127.0.0.1:8000/api/orders/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "customer_id": 1,
    "status": "confirmed",
    "description": "50 impresiones blancas",
    "order_items": [
      {
        "item_type": "service",
        "item_id": 1,
        "quantity": 50
      }
    ]
  }'
```

### Delete order

```bash
curl -X DELETE http://127.0.0.1:8000/api/orders/1 \
  -H "Accept: application/json"
```

## Order Items

### List order items

```bash
curl -X GET http://127.0.0.1:8000/api/order-items \
  -H "Accept: application/json"
```

### Create order item

```bash
curl -X POST http://127.0.0.1:8000/api/order-items \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "order_id": 1,
    "item_type": "service",
    "item_id": 1,
    "quantity": 100,
    "meta": {
      "material": "opalina"
    }
  }'
```

### Show order item

```bash
curl -X GET http://127.0.0.1:8000/api/order-items/1 \
  -H "Accept: application/json"
```

### Update order item

```bash
curl -X PUT http://127.0.0.1:8000/api/order-items/1 \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "order_id": 1,
    "item_type": "service",
    "item_id": 1,
    "quantity": 30,
    "meta": {
      "size": "carta"
    }
  }'
```

### Delete order item

```bash
curl -X DELETE http://127.0.0.1:8000/api/order-items/1 \
  -H "Accept: application/json"
```

## Insomnia

Para usarlo en Insomnia:

1. Crea una `Request Collection`.
2. Usa `{{ base_url }}/api/...` como base URL.
3. Configura headers `Accept: application/json` y `Content-Type: application/json`.
4. Copia cualquiera de los JSON anteriores en la pestaña `Body > JSON`.
5. Para servicios, manda el selector correcto en `meta.material`, `meta.size`, `meta.doc_type` o `meta.condition_value`.

## Scribe Docs

El proyecto ya esta configurado para Scribe en `/docs`.

Cuando el entorno tenga una version de PHP compatible con tus dependencias, genera la documentacion con:

```bash
php artisan scribe:generate
```
