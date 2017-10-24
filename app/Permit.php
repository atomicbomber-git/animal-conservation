<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permit extends Model
{
    public function user()
    {
        return $this->belongsTo("App\User");
    }

    protected $fillable = [
        "species", "father_name","father_certificate_code", "father_birthplace", "father_birthdate",
        "father_certificate_image", "mother_name", "mother_certificate_code", "mother_birthplace",
        "mother_birthdate", "mother_certificate_image", "proposal_document", "reference_image", "user_id"
    ];
}
