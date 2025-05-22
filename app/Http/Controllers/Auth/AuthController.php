<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function cekLogin(Request $request)
    {
        // dd($request);
        $kredensial = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd($kredensial);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $request->session()->put('id_user', $user->id);

            return redirect()->intended('rumah-sakit');
        }

        return redirect()->back()->with(['error' => 'Username atau Password Salah']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Berhasil Logout');
    }
}