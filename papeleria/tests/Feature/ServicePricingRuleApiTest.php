<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\ServicePricingRule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServicePricingRuleApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_pricing_rules_with_service_relation(): void
    {
        $service = Service::create([
            'name' => 'Impresion',
            'description' => 'Servicio de impresion',
        ]);

        ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 100,
            'price' => 4.5,
        ]);

        $response = $this->getJson('/api/service-pricing-rules');

        $response
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.service.name', 'Impresion')
            ->assertJsonPath('0.price', 4.5);
    }

    public function test_update_accepts_consistent_pricing_rule_payload(): void
    {
        $service = Service::create([
            'name' => 'Engargolado',
            'description' => 'Engargolado de documentos',
        ]);

        $rule = ServicePricingRule::create([
            'service_id' => $service->id,
            'min_quantity' => 1,
            'max_quantity' => 30,
            'price' => 20,
        ]);

        $response = $this->putJson("/api/service-pricing-rules/{$rule->id}", [
            'service_id' => $service->id,
            'variant' => 'opalina',
            'min_quantity' => 1,
            'max_quantity' => 50,
            'price' => 25.75,
        ]);

        $response
            ->assertOk()
            ->assertJsonPath('service.name', 'Engargolado')
            ->assertJsonPath('variant', 'opalina')
            ->assertJsonPath('price', 25.75);

        $this->assertDatabaseHas('service_pricing_rules', [
            'id' => $rule->id,
            'variant' => 'opalina',
            'price' => 25.75,
        ]);
    }
}
