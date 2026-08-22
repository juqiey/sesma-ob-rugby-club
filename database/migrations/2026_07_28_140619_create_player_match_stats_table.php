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
        Schema::create('player_match_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedInteger('tries')->default(0);
            $table->unsignedInteger('conversions')->default(0);
            $table->unsignedInteger('try_assists')->default(0);
            $table->unsignedInteger('tackles')->default(0);
            $table->unsignedInteger('tackles_missed')->default(0);
            $table->unsignedInteger('penalties_conceded')->default(0);
            $table->unsignedInteger('lineouts_won')->default(0);
            $table->unsignedInteger('lineouts_lost')->default(0);
            $table->unsignedInteger('scrums_won')->default(0);
            $table->unsignedInteger('scrums_lost')->default(0);
            $table->unsignedInteger('meters_gained')->default(0);
            $table->unsignedInteger('turnovers_won')->default(0);
            $table->unsignedInteger('yellow_cards')->default(0);
            $table->unsignedInteger('red_cards')->default(0);
            $table->unsignedInteger('line_breaks')->default(0);
            $table->unsignedInteger('offloads')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_match_stats');
    }
};
