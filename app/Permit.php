<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Permit extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function formattedMotherBirthDate()
    {
        $date = new Date($this->mother_birthdate);
        return $date->format('j F Y');
    }

    public function formattedFatherBirthDate()
    {
        $date = new Date($this->father_birthdate);
        return $date->format('j F Y');
    }

    protected $fillable = [
        "species", "father_name","father_certificate_code", "father_birthplace", "father_birthdate", "father_generation",
        "father_certificate_image", "mother_name", "mother_certificate_code", "mother_birthplace",
        "mother_birthdate", "mother_generation", "mother_certificate_image", "proposal_document", "reference_image", "user_id"
    ];
}
