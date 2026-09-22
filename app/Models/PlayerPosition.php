<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerPosition extends Model
{
    protected $fillable = [
        'player_id',
        'position_id',
        'remark'
    ];

    //Relationship with players
    public function players(){
        return $this->belongsTo(Player::class, 'player_id');
    }

    //Relationship with positions
    public function positions(){
        return $this->belongsTo(Position::class, 'position_id');
    }
}
