<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {   
        $data_user = User::all();
        return view('pages.user.index', compact('data_user'));
    }

    public function delete_user($id)
    {   
        $user = User::find($id);
        if ($user) {
            $user->delete();
            Alert::success('Berhasil', 'Data User Berhasil Dihapus');
            return redirect()->route('show.user')->with('success', 'User deleted successfully');
        }
        Alert::error('Gagal', 'Data Pasien Gagal Dihapus');
        return redirect()->route('show.user')->with('error', 'User not found');
    }

    // public function create()
    // {
    //     return view('pages.user.create');
    // }

    // public function edit($id)
    // {
    //     return view('pages.user.edit', compact('id'));
    // }
}
