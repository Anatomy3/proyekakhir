// database/migrations/2024_02_26_000002_create_products_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('base_price', 12, 2);
            $table->json('dimensions')->nullable(); // Store width, height, depth
            $table->json('materials')->nullable(); // Available materials
            $table->json('colors')->nullable(); // Available colors
            $table->json('options')->nullable(); // Additional customization options
            $table->enum('type', ['ready_made', 'customizable']);
            $table->integer('stock')->default(0); // Only for ready-made products
            $table->boolean('is_active')->default(true);
            $table->integer('production_days')->nullable(); // Estimated production time
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
