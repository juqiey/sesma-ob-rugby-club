<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name',
        'type',
        'location',
        'logo',
        'email',
        'phone_no'
    ];

    public function playerRepresentation(){
        return $this->hasMany(PlayerRepresentation::class);
    }
}
