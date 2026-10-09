<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepresentationPosition extends Model
{
    protected $fillable = [
        'player_representation_id',
        'position_id'
    ];

    //Relationship with player representations
    public function playerRepresentations(){
        return $this->belongsTo(PlayerRepresentation::class, 'player_representation_id');
    }

    //Relationship with positions
    public function positions(){
        return $this->belongsTo(Position::class, 'position_id');
    }
}
