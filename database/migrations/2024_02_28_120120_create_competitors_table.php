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
        Schema::create('competitors', function (Blueprint $table) {
            $table->id();
            $table->string('dni')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('address');
            $table->date('birthdate');
            $table->boolean('sex');
            $table->integer('points');
            $table->boolean('pro');
            $table->boolean('partner');
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};
