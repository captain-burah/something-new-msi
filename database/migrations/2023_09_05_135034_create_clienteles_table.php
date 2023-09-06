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
        Schema::create('clienteles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id')->nullable(true);
            $table->string('name');
            $table->string('mobile');
            $table->string('nationality');
            $table->string('country_of_residence');
            $table->string('passport');
            $table->string('passport_expiry');
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('address_4');
            $table->string('po_box');
            $table->timestamps();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clienteles');
    }
};
