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
        $articleCount = \App\Information::count();
        $locationCount = \App\Location::count();

        return view("administrator.dashboard",
            [
                "unverifiedCount" => $unverifiedCount,
                "reportCount" => $reportCount,
                "permitRequestCount" => $permitRequestCount,
                "articleCount" => $articleCount,
                "locationCount" => $locationCount
            ]
        );
    }
}
