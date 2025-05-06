@extends('layouts.master')

@section('title', 'Registrasi Data User')

@section('description', 'Registrasi Data User - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Registrasi User</h1>

            <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data"
                class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div class="grid grid-cols-2 gap-6">

                    <!-- Username -->
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username <span
                                class="text-red-700">*</span></label>
                        <input type="text" id="username" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role <span
                                class="text-red-700">*</span></label>
                        <select id="role" name="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            required>
                            <option value="">Pilih Role</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="dokter" {{ old('role') == 'dokter' ? 'selected' : '' }}>Dokter</option>
                            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                        </select>
                        @error('role')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nama -->
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap <span
                                class="text-red-700">*</span></label>
                        <input type="text" id="nama" name="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Nomor HP -->
                    <div>
                        <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900">Nomor HP</label>
                        <input type="tel" id="nomor_hp" name="nomor_hp"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Nomor HP" value="{{ old('nomor_hp') }}">
                        @error('nomor_hp')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password <span
                                class="text-red-700">*</span></label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Password" required>
                        @error('password')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi
                            Password <span class="text-red-700">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Konfirmasi Password" required>
                        @error('password_confirmation')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-2">
                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="Alamat lengkap">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Foto -->
                    <div>
                        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                        <input type="file" id="foto" name="foto" accept="image/*"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                        @error('foto')
                            <span class="text-red-400 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-span-2">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="status" value="1" class="sr-only peer" checked>
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-amber-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-400">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900">User Aktif</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-2 mt-6">
                    <button type="reset"
                        class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 cursor-pointer">
                        Reset
                    </button>
                    <button type="submit"
                        class="text-white bg-amber-400 hover:bg-amber-600 focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 cursor-pointer">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
