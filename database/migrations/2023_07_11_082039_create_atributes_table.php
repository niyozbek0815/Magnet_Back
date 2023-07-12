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
        Schema::create('atributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained()->onDelete('cascade');
            $table->foreignId('sub_products_id')->constrained()->onDelete('cascade');
            $table->foreignId('size_products_id')->constrained()->onDelete('cascade');
            $table->string('price');
            $table->string('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atributes');
    }
};
