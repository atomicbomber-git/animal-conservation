<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Law;
use App\Information;

class MainController extends Controller
{
	public function index()
	{
		return view("main", ["laws" => Law::select("id", "name")->get(), "articles" => Information::orderBy("created_at", "desc")->limit(3)->get()]);
	}
}
