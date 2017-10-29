<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Validator;
use Storage;
use Image;

class InformationController extends Controller
{
    public function create()
    {
        return view("information.create");
    }

    public function index()
    {
        return view("information.index",
            ["articles" => Information::orderBy("created_at", "desc")->get()]
        );
    }

    public function detail(Request $request, Information $information)
    {
        if ($request->ajax()) {
            return [
                "title" => $information->title,
                "content" => $information->content,
                "imageUrl" => route("information.image", $information)
            ];
        }

        return view("information.detail",
            ["article" => $information]
        );
    }

    public function image(Request $request, Information $information)
    {
        return response()
            ->file(storage_path("app/$information->image"));
    }

    public function thumbnail(Request $request, Information $information)
    {
        return response()
            ->file(storage_path("app/$information->thumbnail"));
    }

    public function delete(Request $request, Information $information)
    {
        Storage::delete($information->image);
        Storage::delete($information->thumbnail);
        $information->delete();
        return redirect()->back()->with("message-success", "Artikel tersebut telah berhasil dihapus.");
    }

    public function all(Request $request)
    {
        return view("information.all", [
            "articles" => Information::all()
        ]);
    }

    public function edit(Request $request, Information $information)
    {
        return view("information.edit", ["article" => $information]);
    }

    public function update(Request $request, Information $information)
    {
        $data = $request->all();
        Validator::make($data, [
            "title" => "required|min:6",
            "content" => "required",
            "image" => "sometimes|required|file|mimes:jpg,jpeg,png"
        ])->validate();

        if ($request->image) {
            Storage::delete($information->image);
            Storage::delete($information->thumbnail);

            $data["image"] = $request->file("image")->store("information/images");
            $data["thumbnail"] = $this->storeThumbnail($request->file("image"));
        }

        $information->update($data);
        return redirect()->back()->with("message-success", "Perubahan artikel telah berhasil dilakukan.");
    }

    public function save(Request $request)
    {
        $data = $request->all();
        Validator::make($request->all(), [
            "title" => "required|min:6",
            "content" => "required",
            "image" => "required|file|mimes:jpg,jpeg,png"
        ])->validate();

        $data["image"] = $request->file("image")->store("information/images");
        $data["thumbnail"] = $this->storeThumbnail($request->file("image"));
        
        Information::create($data);

        return redirect()->route("information.index")
            ->with("message-success", "Anda telah berhasil menambahkan artikel informasi baru!");
    }

    private function storeThumbnail($file)
    {
        $thumbnail = Image::make($file);
        $thumbnail = $thumbnail = $thumbnail->resize(700, null, function ($constraint){
            $constraint->aspectRatio();
        })->encode();

        $filename = $file->hashName();
        $path = "information/thumbnails/$filename";

        Storage::put($path, (string) $thumbnail);

        return $path;
    }
}