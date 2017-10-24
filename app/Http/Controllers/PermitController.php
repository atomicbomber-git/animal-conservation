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

    public function proposal(Request $request, Permit $permit)
    {
        return response()->file(storage_path("app/$permit->proposal_document"));
    }

    public function reference(Request $request, Permit $permit)
    {
        return response()->file(storage_path("app/$permit->reference_image"));
    }

    public function mother(Request $request, Permit $permit)
    {
        return response()->json([
            "name" => $permit->mother_name,
            "birthdate" => $permit->formattedMotherBirthdate(),
            "birthplace" => $permit->mother_birthplace,
            "certificateCode" => $permit->mother_certificate_code,
            "generation" => $permit->mother_generation,
            "certificateImageUrl" => route('permit.mother-cert-image', $permit)
        ]);
    }

    public function motherCertificateImage(Request $request, Permit $permit)
    {
        return response()->file(storage_path("app/$permit->mother_certificate_image"));
    }

    public function father(Request $request, Permit $permit)
    {
        return response()->json([
            "name" => $permit->father_name,
            "birthdate" => $permit->formattedFatherBirthdate(),
            "birthplace" => $permit->father_birthplace,
            "certificateCode" => $permit->father_certificate_code,
            "generation" => $permit->father_generation,
            "certificateImageUrl" => route('permit.father-cert-image', $permit)
        ]);
    }

    public function fatherCertificateImage(Request $request, Permit $permit)
    {
        return response()->file(storage_path("app/$permit->father_certificate_image"));
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
            "father_generation" => "required|integer|min:0",
            "father_certificate_image" => "required|file|mimes:jpg,jpeg,png",
            "mother_name" => "required",
            "mother_certificate_code" => "required",
            "mother_birthplace" => "required",
            "mother_birthdate" => "required|date",
            "mother_generation" => "required|integer|min:0",
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
