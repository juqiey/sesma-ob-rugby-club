<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalAssessment extends Model
{
    protected $fillable = [
        'weight_kg',
        'height_cm',
        'body_fat_percentage',
        'muscle_mass_kg',
        'player_id'
    ];

    public function player(){
        return $this->belongsTo(Player::class,'player_id');
    }
    
}
