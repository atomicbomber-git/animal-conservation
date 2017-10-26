<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Law;

class LawController extends Controller
{
    public function index()
    {
        return view("law.index", ["laws" => Law::all()]);
    }

    public function create()
    {

    }

    public function save()
    {

    }

    public function download()
    {

    }
}
