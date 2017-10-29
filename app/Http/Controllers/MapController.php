<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Storage;
use App\Location;

class MapController extends Controller
{
    public function admin()
    {
        return view("map.admin", ["locations" => Location::all()]);
    }

    public function index()
    {
        return view("map.index", ["locations" => Location::all()]);
    }

    public function locations()
    {
        $locations = Location::select("id", "latitude", "longitude")->get();

        $locations = $locations->each(function($position) {
            $position["detailUrl"] = route("map.location.detail", $position->id);
        });

        return $locations;
    }

    public function detail(Request $request, Location $location)
    {
        $location["imageUrl"] = route("map.location.image", $location->id);
        return $location;
    }

    public function locationImage(Request $request, Location $location)
    {
        return response()->file(storage_path("app/$location->image"));
    }

    public function editLocation(Request $request, Location $location)
    {
        return view("map.edit-location", ["location" => $location]);
    }

    public function updateLocation(Request $request, Location $location)
    {
        $data = $request->all();
        Validator::make($data, [
            "name" => "required|string",
            "description" => "required|string",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
            "address" => "required|string",
            "image" => "sometimes|required|file|mimes:jpg,jpeg,png"
        ])->validate();

        if (file_exists($request->image)) {
            Storage::delete($location->image);
             $data["image"] = $request->file("image")->store("locations/images");
        }

        $location->update($data);

        return redirect()->back()->with("message-success", "Lokasi telah berhasil diperbaharui.");
    }

    public function addLocation(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "name" => "required|string",
            "description" => "required|string",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
            "address" => "required|string",
            "image" => "sometimes|required|file|mimes:jpg,jpeg,png"
        ])->validate();

        if (file_exists($request->image)) {
            $data["image"] = $request->file("image")->store("locations/images");
        }

        Location::create($data);

        return redirect()->back()->with("message-success", "Lokasi baru telah berhasil ditambahkan.");
    }

    public function test() {
        Location::create([
            "name" => rand(),
            "description" => rand(),
            "latitude" => rand(),
            "longitude" => rand()
        ]);
    }

    public function deleteLocation(Request $request, Location $location)
    {
        Storage::delete($location->image);
        $location->delete();
        return redirect()->back()->with("message-success", "Lokasi telah berhasil dihapus.");
    }
}
