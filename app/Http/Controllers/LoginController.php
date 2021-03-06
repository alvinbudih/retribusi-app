<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        $credentials["username"] = strtolower($credentials["username"]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("/dashboard");
        }

        return back()->with("loginError", "Gagal Login");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("login.auth");
    }
}
