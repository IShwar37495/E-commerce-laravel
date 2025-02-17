<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('slug')->unique();
            $table->text('description')->nullable(); 
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable(); 
            $table->integer('quantity');
            $table->string('sku')->unique(); 
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
