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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_id')->nullable(true)
                ->references('id')->on('units')->onDelete('restrict');

            $table->unsignedBigInteger('client_id')->nullable(true)
                ->references('id')->on('clienteles')->onDelete('restrict');


            $table->string('payment_status');   // online or bank deposit
            $table->string('payment_price');
            $table->string('payment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
