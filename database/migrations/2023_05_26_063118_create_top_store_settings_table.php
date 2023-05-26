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
        Schema::create('top_store_settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('start');
            $table->decimal('stop');
            $table->string('name_uz');
            $table->string('name_kr');
            $table->string('name_en');
            $table->string('name_ru');
            $table->decimal('summa');
            $table->string('continuity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_store_settings');
    }
};
