<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        $unverifiedCount = User::where("is_verified", 0)->count();
        $reportCount = \App\Report::count();
        $permitRequestCount = \App\Permit::count();
        $plantPermitRequestCount = \App\PlantPermit::count();
        $articleCount = \App\Information::count();
        $locationCount = \App\Location::count();

        return view("administrator.dashboard",
            [
                "unverifiedCount" => $unverifiedCount,
                "reportCount" => $reportCount,
                "permitRequestCount" => $permitRequestCount,
                "plantPermitRequestCount" => $plantPermitRequestCount,
                "articleCount" => $articleCount,
                "locationCount" => $locationCount
            ]
        );
    }
}
