<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use Validator;

class ReportController extends Controller
{
    public function index()
    {
        return view("report.index", ["reports" => Report::all()]);
    }

    public function create()
    {
        return view("report.create");
    }

    public function save(Request $request)
    {
        $data = $request->all();
        Validator::make($data, [
            "title" => "required",
            "description" => "required",
            "location" => "required",
            "date" => "required",
            "image" => "required|file"
        ])->validate();

        $data["image"] = $request->file("image")->store("report_images");

        $newReport = new Report($data);
        $newReport->user_id = auth()->user()->id;
        $newReport->save();

        return redirect()->back()->with("message-success", "Laporan Anda telah berhasil diajukan!");
    }

    public function detail(Request $request, Report $report)
    {
        return response()->json([
            "title" => $report->title,
            "description" => $report->description,
            "imageUrl" => route('report.image', $report)
        ]);
    }

    public function image(Request $request, Report $report)
    {
        return response()->file(storage_path("app/$report->image"));
    }
}