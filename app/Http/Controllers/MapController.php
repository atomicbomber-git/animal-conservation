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

    public function positions()
    {
        $positions = Location::select("id", "latitude", "longitude")->get();

        $positions = $positions->each(function($position) {
            $position["detailUrl"] = route("map.location.detail", $position->id);
        });

        return $positions;
    }

    public function detail(Request $request, Location $location)
    {
        return $location;
    }

    public function addLocation(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "name" => "required|string",
            "description" => "required|string",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric",
            "image" => "sometimes|required|file|mimes:jpg,jpeg,png"
        ])->validate();

        if (file_exists($request->image)) {
            $data["image"] = $request->file("image")->store("locations/images");
        }

        Location::create($data);

        return $request;
    }

    public function test() {
        Location::create([
            "name" => rand(),
            "description" => rand(),
            "latitude" => rand(),
            "longitude" => rand()
        ]);
    }
}
