<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        "name", "description", "image", "longitude", "latitude", "address"
    ];
}
