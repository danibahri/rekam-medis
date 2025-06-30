@extends('layouts.master')

@section('title', 'Edit User')

@section('description', 'Edit User - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Edit User</h1>
                <a href="{{ route('show.user') }}"
                    class="rounded-lg bg-gray-500 px-4 py-2 text-white transition-colors hover:bg-gray-600">
                    ← Kembali
                </a>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <form action="{{ route('update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Foto User -->
                        <div class="col-span-full">
                            <label class="mb-2 block text-sm font-medium text-gray-700">Foto Profil</label>
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    @if ($user->foto_path)
                                        <img id="preview" src="{{ Storage::url($user->foto_path) }}"
                                            alt="Foto {{ $user->nama }}"
                                            class="h-20 w-20 rounded-full border-2 border-gray-200 object-cover">
                                    @else
                                        <div id="preview"
                                            class="flex h-20 w-20 items-center justify-center rounded-full border-2 border-gray-200 bg-gray-200">
                                            <svg class="h-10 w-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" name="foto" accept="image/*"
                                        class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:bg-amber-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-amber-700 hover:file:bg-amber-100"
                                        onchange="previewImage(this)">
                                </label>
                            </div>
                            @error('foto')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div>
                            <label for="username" class="mb-1 block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username"
                                value="{{ old('username', $user->username) }}"
                                class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500"
                                required>
                            @error('username')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nama -->
                        <div>
                            <label for="nama" class="mb-1 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                                class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500"
                                required>
                            @error('nama')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div>
                            <label for="role" class="mb-1 block text-sm font-medium text-gray-700">Role</label>
                            <select name="role" id="role"
                                class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500"
                                required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="dokter" {{ old('role', $user->role) == 'dokter' ? 'selected' : '' }}>Dokter
                                </option>
                                <option value="petugas" {{ old('role', $user->role) == 'petugas' ? 'selected' : '' }}>
                                    Petugas</option>
                            </select>
                            @error('role')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div>
                            <label for="nomor_hp" class="mb-1 block text-sm font-medium text-gray-700">Nomor HP</label>
                            <input type="text" name="nomor_hp" id="nomor_hp"
                                value="{{ old('nomor_hp', $user->nomor_hp) }}"
                                class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500">
                            @error('nomor_hp')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="col-span-full">
                            <label for="alamat" class="mb-1 block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat" rows="3"
                                class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500">{{ old('alamat', $user->alamat) }}</textarea>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-span-full">
                            <div class="flex items-center">
                                <input type="checkbox" name="status" id="status" value="1"
                                    {{ old('status', $user->status) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                                <label for="status" class="ml-2 block text-sm text-gray-900">Status Aktif</label>
                            </div>
                            @error('status')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Section -->
                        <div class="col-span-full border-t pt-6">
                            <h3 class="mb-4 text-lg font-medium text-gray-900">Ubah Password (Opsional)</h3>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <!-- Password -->
                                <div>
                                    <label for="password" class="mb-1 block text-sm font-medium text-gray-700">Password
                                        Baru</label>
                                    <input type="password" name="password" id="password"
                                        class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500">
                                    <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                                    @error('password')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div>
                                    <label for="password_confirmation"
                                        class="mb-1 block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="w-full rounded-lg border border-gray-300 p-3 focus:border-amber-500 focus:ring-amber-500">
                                    @error('password_confirmation')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex justify-end space-x-3 border-t pt-6">
                        <a href="{{ route('show.user') }}"
                            class="rounded-lg bg-gray-500 px-6 py-2 text-white transition-colors hover:bg-gray-600">
                            Batal
                        </a>
                        <button type="submit"
                            class="rounded-lg bg-amber-500 px-6 py-2 text-white transition-colors hover:bg-amber-600">
                            <i class="fas fa-save mr-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML =
                        `<img src="${e.target.result}" alt="Preview" class="h-20 w-20 object-cover rounded-full border-2 border-gray-200">`;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
