<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class PlantPermit extends Model
{
    protected $fillable = [
        "species", "parent_name","parent_certificate_code", "parent_birthplace", "parent_birthdate", "parent_generation",
        "parent_certificate_image", "proposal_document", "reference_image", "user_id"
    ];

    public function formattedParentBirthdate()
    {
        $date = new Date($this->parent_birthdate);
        return $date->format('j F Y');
    }

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
