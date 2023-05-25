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
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->foreignId('stores_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('sale')->nullable();
            $table->string('count')->default(0);
            $table->string('count_review')->default(0);
            $table->string('stars')->default(0);
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
