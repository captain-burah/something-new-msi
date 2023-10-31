<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('country_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dial_code');
            $table->string('code');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('country_codes');
    }
};
