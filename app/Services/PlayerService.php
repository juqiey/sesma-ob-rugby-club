<?php

namespace App\Services;

use App\Models\Player;

class PlayerService
{
    public function createPlayerCode($batch){
        $prefix = '#'.$batch;

        //Find last player code for the given batch
        $lastPlayer = Player::where('player_code', 'like', $prefix . '%')
            ->orderByDesc('player_code')
            ->first();

        if (!$lastPlayer) {
            $number = 1;
        } else {
            $lastNumber = (int) substr(
                $lastPlayer->player_code,
                strlen($prefix)
            );

            $number = $lastNumber + 1;
        }

        return $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}
