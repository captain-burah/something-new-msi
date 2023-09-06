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
        Schema::create('clientele_meetings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->nullable(true)
                ->references('id')->on('clientele')->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->string('meeting_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientele_meetings');
    }
};
