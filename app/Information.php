<?php

namespace App;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    public function formattedDate()
    {
        $date = new Date($this->created_at);
        return $date->format('l, j F Y');
    }

    public function formattedTitle()
    {
        return ucwords( str_limit($this->title, 20) );
    }

    protected $fillable = [
        "title", "content", "image", "thumbnail"
    ];
}
