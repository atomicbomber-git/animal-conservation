<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $verified_users = $users->filter(function ($user) {
            return !$user->is_verified;
        });
        return view("user.index", ["users" => $users, "verified_users" => $verified_users]);
    }

    public function identityCard(Request $request, User $user)
    {
        return response()->file(storage_path("app/$user->scanned_identity_card"));
    }

    public function verify(Request $request, User $user)
    {
        $user->is_verified = !$user->is_verified;
        $user->save();
        return redirect()->back();
    }
}
