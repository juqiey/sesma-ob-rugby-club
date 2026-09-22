<?php

namespace App\Models;

use App\Models\PlayerAppearance;
use App\Models\PlayerMatchStat;
use App\Models\PlayerPosition;
use App\Models\PlayerRepresentation;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'address',
        'player_code',
        'date_of_birth',
        'batch',
        'age',
        'status',
        'profile_url'
    ];

    protected $casts = [
        'date_of_birth'=>'date'
    ];

    //Relationship with player_position
    public function playerPosition(){
        return $this->hasMany(PlayerPosition::class);
    }

    //Relationship with player_representation->club
    public function playerRepresentation(){
        return $this->hasMany(PlayerRepresentation::class);
    }

    //Relationship with player_appearances -> tournaments
    public function playerAppearance(){
        return $this->hasMany(PlayerAppearance::class);
    }

    //Relationship with player_match_stats -> games
    public function playerMatchStats(){
        return $this->hasMany(PlayerMatchStat::class);
    }

    //All physical assessment
    public function physicalAssessment(){
        return $this->hasMany(PhysicalAssessment::class);
    }

    //Latest one physical assessment
    public function latestPhysicalAssessment()
    {
        return $this->hasOne(PhysicalAssessment::class)->latestOfMany();
    }
}
