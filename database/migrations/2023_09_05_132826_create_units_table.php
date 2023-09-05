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
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id')->nullable(true)
                ->references('id')->on('projects')->onDelete('cascade');

            $table->unsignedBigInteger('status_id')->nullable(true)
                ->references('id')->on('unit_stauses')->onDelete('restrict');

            $table->unsignedBigInteger('community_id')->nullable(true)
                ->references('id')->on('communities')->onDelete('restrict');

            $table->string('name')->nullable(true);
            $table->string('building_name')->nullable(true);
            $table->string('address')->nullable(true);
            $table->string('exposure')->nullable(true);
            $table->string('main_unit_type')->nullable(true);
            $table->string('land_registration_fee')->nullable(true);
            $table->string('oqood_amount')->nullable(true);
            $table->string('dld_fees')->nullable(true);
            $table->string('usage')->nullable(true);
            $table->string('bedroom')->nullable(true);
            $table->string('bathroom')->nullable(true);
            $table->string('unit_price')->nullable(true);
            $table->string('unit_area')->nullable(true);
            $table->string('outdoor_area')->nullable(true);
            $table->string('terrace_area')->nullable(true);
            $table->string('is_floorplans')->nullable(true);
            $table->string('is_images')->nullable(true);
            $table->string('is_paymentplans')->nullable(true);
            $table->string('is_amenities')->nullable(true);
            $table->string('is_factsheet')->nullable(true);
            $table->string('is_brochure')->nullable(true);

            $table->unsignedBigInteger('created_by')->nullable(true)
                ->references('id')->on('users')->onDelete('restrict');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
