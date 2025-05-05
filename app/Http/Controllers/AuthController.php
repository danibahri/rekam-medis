<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Check if the credentials are valid
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user', [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]);
            Auth::login($user);
            Alert::success('Login berhasil', 'Selamat datang ' . $user->username);
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } 
        return redirect('/login')->withErrors(['Email dan password tidak sesuai']);
    }

    public function logout(Request $request)
    {
        // Update last login time
        $user = Auth::user();
        if ($user) {
            $user->last_login =  Carbon::now();
            $user->save();
        }

        // logout
        $request->session()->flush();
        Auth::logout();
        Alert::success('Logout berhasil', 'Anda telah keluar dari sistem');
        return redirect('/login');
    }
}
