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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('home_team_id');
            $table->unsignedBigInteger('away_team_id');
            $table->date('game_date');
            $table->time('game_time');
            $table->string('location');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('home_team_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->string('status')->default('scheduled');
            $table->string('home_score')->nullable();
            $table->string('away_score')->nullable();
            $table->string('stage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
