<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlantPermit;
use Storage;

class PlantPermitController extends Controller
{
    public function create()
    {
        return view("plant_permit.create");
    }

    public function save()
    {
        $data = request()->validate([
            "species" => "required",
            "parent_name" => "required",
            "parent_certificate_code" => "required",
            "parent_birthplace" => "required",
            "parent_birthdate" => "required|date",
            "parent_generation" => "required|integer|min:0",
            "parent_certificate_image" => "required|file|mimes:jpg,jpeg,png",
            "proposal_document" => "required|file|mimes:pdf",
            "reference_image" => "required|file|mimes:jpg,jpeg,png"
        ]);

        $data["parent_certificate_image"] = request()->file("parent_certificate_image")
            ->store("plant_permits/parent_certificates");
        $data["proposal_document"] = request()->file("proposal_document")
            ->store("plant_permits/proposal_documents");
        $data["reference_image"] = request()->file("reference_image")
            ->store("plant_permits/references");

        $permit = new PlantPermit($data);
        auth()->user()->plantPermits()->save($permit);

        return redirect()->back()->with("message-success", "Selamat, proposal izin penangkaran Anda telah berhasil diajukan!");
    }

    public function index()
    {
        return view("plant_permit.index", ["permits" => PlantPermit::all()]);
    }

    public function proposal(PlantPermit $permit)
    {
        return response()->file(storage_path("app/$permit->proposal_document"));
    }

    public function reference(PlantPermit $permit)
    {
        return response()->file(storage_path("app/$permit->reference_image"));
    }

    public function certificateImage(PlantPermit $permit)
    {
        return response()->file(storage_path("app/$permit->parent_certificate_image"));
    }

    public function parent(PlantPermit $permit)
    {
        return response()->json([
            "name" => $permit->parent_name,
            "birthdate" => $permit->formattedParentBirthdate(),
            "birthplace" => $permit->parent_birthplace,
            "certificateCode" => $permit->parent_certificate_code,
            "generation" => $permit->parent_generation,
            "certificateImageUrl" => route('plant_permit.parent-cert-image', $permit)
        ]);
    }
}
