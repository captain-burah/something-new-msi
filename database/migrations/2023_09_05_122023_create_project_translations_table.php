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
        Schema::create('project_translations', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('0');

            $table->unsignedBigInteger('project_id')->nullable(true);
            $table->unsignedBigInteger('language_id')->nullable(true);
            $table->unsignedBigInteger('type_id')->nullable(true);
            $table->unsignedBigInteger('community_id')->nullable(true);
            $table->unsignedBigInteger('created_by')->nullable(true);

            $table->string('slug_link')->nullable(true);
            $table->string('name')->nullable(true);
            $table->string('description')->nullable(true);

            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keywords')->nullable(true);

            $table->string('latitude')->nullable(true);
            $table->string('longitude')->nullable(true);

            $table->integer('no_of_units')->nullable(true);
            $table->string('bedoom')->nullable(true);
            $table->string('bathrooms')->nullable(true);
            $table->string('unit_size_range')->nullable(true);
            $table->string('outoor_area')->nullable(true);
            $table->string('terrace_area')->nullable(true);
            $table->string('starting_price')->nullable(true);
            $table->string('escrow')->nullable(true);

            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('restrict');
            $table->foreign('type_id')->references('id')->on('project_types')->onDelete('restrict');
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('restrict');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_translations');
    }
};