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
        Schema::create('unit_floorplan_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_floorplan_id')->nullable(true);
            $table->string('name');
            $table->timestamps();
            $table->foreign('unit_floorplan_id')->references('id')->on('unit_floorplans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_floorplan_files');
    }
};
