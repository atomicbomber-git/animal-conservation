<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\User;
use Validator;
use Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy("created_at", "desc")->get();
        $verified_users = $users->filter(function ($user) {
            return !$user->is_verified;
        });
        return view("user.index", ["users" => $users, "verified_users" => $verified_users]);
    }

    public function edit(Request $request, User $user)
    {
        if ($user->is_administrator)
            return view("user.admin-edit");

        return view("user.edit");
    }

    public function update(Request $request, User $user)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'string', 'email' , 'max:255', Rule::unique('users')->ignore($user->id)],
            'identity_code' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'phone' => 'required|string'
        ])->validate();

        $user->update($request->all());
        return redirect()->back()->with("message-success", "Selamat, data akun Anda telah berhasil diperbaharui.");
    }

    public function updatePassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $validator->after(function ($validator) use($request, $user) {
            if ( ! Hash::check($request->old_password, $user->password) ) {
                $validator->errors()->add("old_password", __("auth.failed"));
            }
        });

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update([
            "password" => bcrypt($request->password)
        ]);
        return redirect()->back()->with("message-success", "Selamat, kata sandi akun Anda telah berhasil diperbaharui.");
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
