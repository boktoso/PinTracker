<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PinHistory extends Model {

    protected $fillable = [
        'pin_id',
        'createDate',
        'latitude',
        'longitude',
    ];

    public function pin() {
        return $this->belongsTo('App\Models\Pin');
    }

}
