<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdministratorController extends Controller
{
    public function dashboard()
    {
        $unverifiedCount = User::where("is_verified", 0)->count();
        return view("administrator.dashboard", ["unverifiedCount" => $unverifiedCount]);
    }
}
