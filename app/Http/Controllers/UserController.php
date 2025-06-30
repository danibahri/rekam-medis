<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use SweetAlert2\Laravel\Swal;
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
        $user = User::find($id);

        try {
            if ($user) {
                $user->delete();
                Swal::success([
                    'title' => 'Success',
                    'text' => 'User berhasil dihapus',
                    'icon' => 'success',
                    'timer' => 3000,
                ]);
                return redirect()->route('show.user')->with('success', 'User deleted successfully');
            }
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Tidak dapat menghapus user atau user sedang digunakan ditempat lain',
            ]);
            return redirect()->route('show.user')->with('error', 'Failed to delete user');
        }
        return redirect()->route('show.user')->with('error', 'User not found');
    }

    public function store_user(Request $request)
    {
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
            $id = 'USR' . rand(1000, 9999);

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
            Swal::success([
                'title' => 'Success',
                'text' => 'User berhasil dibuat',
                'icon' => 'success',
                'timer' => 3000,
            ]);
            return redirect()->route('show.user');
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal membuat user ',
                'icon' => 'error',
                'timer' => 3000,
            ]);

            // \Log::error('User Creation Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->withInput();
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|in:admin,dokter,petugas',
            'nama' => 'required|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'nomor_hp' => 'nullable|string|max:15',
            'status' => 'nullable|boolean',
            'foto' => 'nullable|image|max:2048',
        ]);

        try {
            $userData = [
                'username' => $validated['username'],
                'role' => $validated['role'],
                'nama' => $validated['nama'],
                'alamat' => $validated['alamat'] ?? null,
                'nomor_hp' => $validated['nomor_hp'] ?? null,
                'status' => $request->has('status'),
            ];

            // Update password only if provided
            if (!empty($validated['password'])) {
                $userData['password'] = bcrypt($validated['password']);
            }

            // Handle foto upload if present
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($user->foto_path && Storage::disk('public')->exists($user->foto_path)) {
                    Storage::disk('public')->delete($user->foto_path);
                }

                $foto = $request->file('foto');
                $userData['foto_path'] = $foto->store('users/foto', 'public');
            }

            // Update user with prepared data
            $user->update($userData);

            Swal::success([
                'title' => 'Success',
                'text' => 'User berhasil diupdate',
                'icon' => 'success',
                'timer' => 3000,
            ]);

            return redirect()->route('show.user');
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal mengupdate user',
                'icon' => 'error',
                'timer' => 3000,
            ]);

            return redirect()
                ->back()
                ->withInput();
        }
    }
}
