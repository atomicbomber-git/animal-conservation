<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function create()
    {
        return view("report");
    }

    public function save()
    {
        return "Dumbass";
    }
}
