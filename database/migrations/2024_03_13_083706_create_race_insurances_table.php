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
        Schema::create('race_insurances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('race');
            $table->unsignedBigInteger('insurance');
            $table->timestamps();

            $table->foreign('race')->references('id')->on('races')->onDelete('cascade');
            $table->foreign('insurance')->references('id')->on('insurances')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('race_insurances');
    }
};
