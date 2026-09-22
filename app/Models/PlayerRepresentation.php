<?php

namespace App\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;

class PlayerRepresentation extends Model
{
    protected $fillable = [
        'player_id',
        'club_id',
        'remark',
        'start_date',
        'end_date',
        'status',
        'level'
    ];

    protected $casts = [
        'start_date'=>'date',
        'end_date'=>'date'
    ];

    //Relationship with players
    public function players(){
        return $this->belongsTo(Player::class, 'player_id');
    }

    //Relationship to clubs
    public function clubs(){
        return $this->belongsTo(Club::class, 'club_id');
    }
}
