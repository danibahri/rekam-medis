<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {   
        $data_user = User::all();
        return view('pages.user.index', compact('data_user'));
    }

    public function add_user()
    {
        return view('pages.user.create');
    }

    public function delete_user($id)
    {   
        Alert::question('Yakin?', 'Data akan dihapus!')
            ->showConfirmButton('Ya, hapus!', '#3085d6')
            ->showCancelButton('Batal', '#aaa')
            ->reverseButtons();
        $user = User::find($id);
        if ($user) {
            $user->delete();
            // Alert::success('Berhasil', 'Data User Berhasil Dihapus');
            return redirect()->route('show.user')->with('success', 'User deleted successfully');
        }
        Alert::error('Gagal', 'Data Pasien Gagal Dihapus');
        return redirect()->route('show.user')->with('error', 'User not found');
    }

    public function store_user(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,dokter,petugas',
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'nomor_hp' => 'nullable|string|max:15',
            'status' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        try {
            // Generate ID with date for better uniqueness
            $id = 'USR' . rand(1000, 9999);

            // Prepare data array explicitly
            $userData = [
                'id' => $id,
                'username' => $validated['username'],
                'password' => bcrypt($validated['password']),
                'role' => $validated['role'],
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'] ?? null,
                'nomor_hp' => $validated['nomor_hp'] ?? null,
                'status' => $request->has('status'),
                'last_login' => null,
            ];

            // Handle foto upload if present
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $userData['foto_path'] = $foto->store('users/foto', 'public');
            }

            // Create user with prepared data
            $user = User::create($userData);

            if (!$user) {
                throw new \Exception('Failed to create user record');
            }

            Alert::success('Berhasil', 'Data User berhasil dibuat');
            return redirect()->route('show.user');

        } catch (\Exception $e) {
            \Log::error('User Creation Error: ' . $e->getMessage());
            Alert::error('Gagal', 'Data User gagal dibuat: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput();
        }
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
