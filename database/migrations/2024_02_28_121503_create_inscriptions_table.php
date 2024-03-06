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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('race');
            $table->string('competitor');
            $table->integer('number');
            $table->timestamp('arrival');
            $table->timestamps();

            $table->foreign('race')->references('id')->on('races')->onDelete('cascade');
            $table->foreign('competitor')->references('dni')->on('competitors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
