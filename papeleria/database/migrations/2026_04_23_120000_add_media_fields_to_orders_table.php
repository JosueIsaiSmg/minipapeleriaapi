<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->text('description')->nullable()->after('status');
            $table->json('photo_paths')->nullable()->after('description');
            $table->json('photo_links')->nullable()->after('photo_paths');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['description', 'photo_paths', 'photo_links']);
        });
    }
};
