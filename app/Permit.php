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
        return $this->mother_birthdate->format('j F Y');
    }

    public function formattedFatherBirthDate()
    {
        return $this->father_birthdate->format('j F Y');
    }

    public function getFatherBirthdateAttribute($birthdate) {
        return new Date($birthdate);
    }

    public function getMotherBirthdateAttribute($birthdate) {
        return new Date($birthdate);
    }

    protected $fillable = [
        "species", "father_name","father_certificate_code", "father_birthplace", "father_birthdate", "father_generation",
        "father_certificate_image", "mother_name", "mother_certificate_code", "mother_birthplace",
        "mother_birthdate", "mother_generation", "mother_certificate_image", "proposal_document", "reference_image", "user_id"
    ];
}
