<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Report extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function formattedDate()
    {
        $date = new Date($this->date);
        return $date->format('l, j F Y');
    }

    protected $fillable = ["title", "description", "location", "date", "image"];
}

