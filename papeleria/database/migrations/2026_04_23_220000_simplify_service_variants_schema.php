<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_pricing_rules', function (Blueprint $table) {
            $table->string('variant')->nullable()->after('service_id');
        });

        Schema::table('service_consumables', function (Blueprint $table) {
            $table->string('variant')->nullable()->after('units_per_service');
        });

        DB::table('service_pricing_rules')
            ->orderBy('id')
            ->get()
            ->each(function ($rule): void {
                DB::table('service_pricing_rules')
                    ->where('id', $rule->id)
                    ->update([
                        'variant' => $rule->condition_value ?? $rule->material ?? $rule->size ?? $rule->doc_type,
                    ]);
            });

        DB::table('service_consumables')
            ->orderBy('id')
            ->get()
            ->each(function ($consumable): void {
                DB::table('service_consumables')
                    ->where('id', $consumable->id)
                    ->update([
                        'variant' => $consumable->material,
                    ]);
            });

        Schema::table('service_pricing_rules', function (Blueprint $table) {
            $table->dropColumn(['condition_type', 'condition_value', 'material', 'size', 'doc_type']);
        });

        Schema::table('service_consumables', function (Blueprint $table) {
            $table->dropColumn(['material']);
        });
    }

    public function down(): void
    {
        Schema::table('service_pricing_rules', function (Blueprint $table) {
            $table->string('condition_type')->nullable()->after('service_id');
            $table->string('condition_value')->nullable()->after('condition_type');
            $table->string('material')->nullable()->after('max_quantity');
            $table->string('size')->nullable()->after('material');
            $table->string('doc_type')->nullable()->after('size');
        });

        Schema::table('service_consumables', function (Blueprint $table) {
            $table->string('material')->nullable()->after('units_per_service');
        });

        DB::table('service_pricing_rules')
            ->orderBy('id')
            ->get()
            ->each(function ($rule): void {
                DB::table('service_pricing_rules')
                    ->where('id', $rule->id)
                    ->update([
                        'condition_type' => filled($rule->variant) ? 'material' : 'quantity',
                        'condition_value' => $rule->variant,
                        'material' => $rule->variant,
                        'size' => null,
                        'doc_type' => null,
                    ]);
            });

        DB::table('service_consumables')
            ->orderBy('id')
            ->get()
            ->each(function ($consumable): void {
                DB::table('service_consumables')
                    ->where('id', $consumable->id)
                    ->update([
                        'material' => $consumable->variant,
                    ]);
            });

        Schema::table('service_pricing_rules', function (Blueprint $table) {
            $table->dropColumn(['variant']);
        });

        Schema::table('service_consumables', function (Blueprint $table) {
            $table->dropColumn(['variant']);
        });
    }
};
