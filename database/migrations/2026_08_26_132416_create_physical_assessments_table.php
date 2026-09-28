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
        Schema::create('physical_assessments', function (Blueprint $table) {
            $table->id();
            $table->decimal('weight_kg',8,2)->nullable();
            $table->decimal('height_cm',8,2)->nullable();
            $table->decimal('body_fat_percentage',8,2)->nullable();
            $table->decimal('muscle_mass_kg',8,2)->nullable();
            $table->unsignedBigInteger('player_id')->nullable();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_assessments');
    }
};
