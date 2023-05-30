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
        Schema::create('order_tolovs', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('orders_id');
            $table->string('massa_tolov');
            $table->string('tolov');
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_tolovs');
    }
};
