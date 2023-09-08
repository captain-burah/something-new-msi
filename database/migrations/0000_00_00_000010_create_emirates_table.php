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
        Schema::create('emirates', function (Blueprint $table) {
            $table->id();
            $table->integer('country_id');
            $table->integer('city_name_en');
            $table->integer('city_name_ru');
            $table->integer('city_name_ar');
            $table->integer('city_code');
            $table->integer('zip_code');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emirates');
    }
};
