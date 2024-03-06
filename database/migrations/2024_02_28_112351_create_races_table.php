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
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('unevenness');
            $table->string('map');
            $table->integer('max_competitors');
            $table->decimal('distance');
            $table->date('date');
            $table->time('time');
            $table->string('start')->nullable();
            $table->string('promotion')->nullable();
            $table->decimal('inscription')->nullable();
            $table->boolean('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
