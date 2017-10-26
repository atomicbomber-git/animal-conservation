<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Law;
use Validator;
use Storage;

class LawController extends Controller
{
    public function index()
    {
        return view("law.index", ["laws" => Law::all()]);
    }

    public function create()
    {

    }

    public function save(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "name" => "required|min:6",
            "document" => "required|file|mimes:pdf"
        ])->validate();

        $data["document"] = $request->file("document")->store("laws/documents");
        Law::create($data);
        return redirect()->back()->with("message-success", "Selamat, Anda telah berhasil mendaftarkan sebuah peraturan pemerintah baru.");
    }

    public function delete(Request $request, Law $law)
    {
        Storage::delete($law->document);
        $law->delete();
        return redirect()->back()->with("message-success", "Selamat, Anda telah berhasil mendaftarkan sebuah peraturan pemerintah baru.");
    }

    public function download(Request $request, Law $law)
    {
        return response()->file(storage_path("app/$law->document"));
    }
}
