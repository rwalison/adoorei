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
        Schema::create('sale_products', function (Blueprint $table) {
            $table->id();
            $table->foreignID('sale_id')->constrained('sales');
            $table->foreignID('product_id')->constrained('products');
            $table->string('name');
            $table->decimal('price', 10, 3)->unsigned();
            $table->text('description')->nullable();
            $table->integer('amount')->unsigned()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_products');
    }
};
