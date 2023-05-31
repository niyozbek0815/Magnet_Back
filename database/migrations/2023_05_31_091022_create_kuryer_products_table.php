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
        Schema::create('kuryer_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuryer_id');
            $table->foreignId('product_id');
            $table->foreignId('order_id');
            $table->foreignId('store_id');
            $table->foreignId('status_id');
            $table->foreignId('order_product_id');
            $table->foreignId('sub_product_id');
            $table->foreignId('size_product_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuryer_products');
    }
};
