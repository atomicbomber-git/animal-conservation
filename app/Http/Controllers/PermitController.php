<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Permit;

class PermitController extends Controller
{
    public function index()
    {
        return view("permit.index", ["permits" => Permit::all()]);
    }

    public function create()
    {
        return view("permit.create", ["page_category" => "permit"]);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            "species" => "required",
            "father_name" => "required",
            "father_certificate_code" => "required",
            "father_birthplace" => "required",
            "father_birthdate" => "required|date",
            "father_certificate_image" => "required|file|mimes:jpg,jpeg,png",
            "mother_name" => "required",
            "mother_certificate_code" => "required",
            "mother_birthplace" => "required",
            "mother_birthdate" => "required|date",
            "mother_certificate_image" => "required|file|mimes:jpg,jpeg,png",
            "proposal_document" => "required|file|mimes:pdf",
            "reference_image" => "required|file|mimes:jpg,jpeg,png"
        ])->validate();

        $data["father_certificate_image"] = $request->father_certificate_image->store("permit/images");
        $data["mother_certificate_image"] = $request->mother_certificate_image->store("permit/images");
        $data["proposal_document"] = $request->proposal_document->store("permit/proposals");
        $data["reference_image"] = $request->reference_image->store("permit/reference_images");
        $data["user_id"] = auth()->user()->id;

        Permit::create($data);

        return redirect()->back()->with("message-success", "Selamat, proposal izin penangkaran Anda telah berhasil diajukan!");
    }
}
