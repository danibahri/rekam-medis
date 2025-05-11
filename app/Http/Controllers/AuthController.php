<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use SweetAlert2\Laravel\Swal;
use Illuminate\Support\Facades\DB;




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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->put('user', [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]);
            Auth::login($user);
            Swal::toast([
                'icon' => 'success',
                'title' => 'Login berhasil',
                'position' => 'top-end',
                'timer' => 3000,
                'showConfirmButton' => false,
                'showLoading' => true,
            ]);
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } 
        return redirect('/login')->withErrors(['Email dan password tidak sesuai']);
    }

    public function logout(Request $request)
    {
        // Update last login time tanpa save()
        $user = Auth::user();
        if ($user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update(['last_login' => Carbon::now()]);
        }

        $request->session()->flush();
        Auth::logout();
        Swal::toast([
                'icon' => 'success',
                'title' => 'Logout berhasil',
                'position' => 'top-end',
                'timer' => 3000,
                'showConfirmButton' => false,
                'showLoading' => true,
            ]);
        return redirect('/login');
    }
}
