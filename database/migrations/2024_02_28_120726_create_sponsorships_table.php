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
        Schema::create('sponsorships', function (Blueprint $table) {
            $table->unsignedBigInteger('race');
            $table->unsignedBigInteger('sponsor');
            $table->timestamps();
            
            $table->primary(['race', 'sponsor']);

            $table->foreign('race')->references('id')->on('races')->onDelete('cascade');
            $table->foreign('sponsor')->references('id')->on('sponsors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sponsorships');
    }
};
