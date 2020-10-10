<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pin extends Model {

    protected $fillable = [
        'rfidNumber',
        'latitude',
        'longitude',
    ];

    public function history() {
        return $this->hasMany('App\Models\PinHistory');
    }

}
