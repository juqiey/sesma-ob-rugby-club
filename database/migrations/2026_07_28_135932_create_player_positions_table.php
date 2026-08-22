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
        Schema::create('player_positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id')->nullable();
            $table->unsignedBigInteger('position_id')->nullable();

            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->nullOnDelete();

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->nullOnDelete();

            $table->string("remark")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('player_positions');
    }
};
