@extends('layouts.master')

@section('title', 'Registrasi Data Pasien')

@section('description', 'Registrasi Data Pasien - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Registrasi Pasien</h1>

            <div class="bg-white rounded-lg shadow p-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Data Identitas Utama -->
                    {{-- <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Data Identitas Utama</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="id_pasien" class="block mb-2 text-sm font-medium text-gray-900">ID
                                    Pasien</label>
                                <input type="text" id="id_pasien" name="id_pasien"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="ID Pasien" value="{{ old('id_pasien') }}">
                                @error('id_pasien')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nomor_rekam_medis" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                    Rekam Medis</label>
                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Nomor Rekam Medis" value="{{ old('nomor_rekam_medis') }}">
                                @error('nomor_rekam_medis')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div> --}}
                    <!-- Data Pribadi -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Data Pribadi</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                                <input type="text" id="nik" name="nik"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}">
                                @error('nik')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nomor_identitas_lain" class="block mb-2 text-sm font-medium text-gray-900">Nomor
                                    Identitas Lain</label>
                                <input type="text" id="nomor_identitas_lain" name="nomor_identitas_lain"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Nomor Identitas Lain" value="{{ old('nomor_identitas_lain') }}">
                                @error('nomor_identitas_lain')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}" required>
                                @error('nama_lengkap')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_ibu_kandung" class="block mb-2 text-sm font-medium text-gray-900">Nama Ibu
                                    Kandung</label>
                                <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Nama Ibu Kandung" value="{{ old('nama_ibu_kandung') }}">
                                @error('nama_ibu_kandung')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Tempat Lahir" value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                    Lahir</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_lahir"
                                        name="tanggal_lahir"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full pl-10 p-2.5"
                                        placeholder="Pilih tanggal" value="{{ old('tanggal_lahir') }}">
                                </div>
                                @error('tanggal_lahir')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                        Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="agama" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                                <select id="agama" name="agama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen
                                    </option>
                                    <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik
                                    </option>
                                    <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                    <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha
                                    </option>
                                    <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                    </option>
                                    <option value="Lainnya" {{ old('agama') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                    </option>
                                </select>
                                @error('agama')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="suku" class="block mb-2 text-sm font-medium text-gray-900">Suku</label>
                                <input type="text" id="suku" name="suku"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Suku" value="{{ old('suku') }}">
                                @error('suku')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="bahasa_dikuasai" class="block mb-2 text-sm font-medium text-gray-900">Bahasa
                                    yang Dikuasai</label>
                                <input type="text" id="bahasa_dikuasai" name="bahasa_dikuasai"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Bahasa yang Dikuasai" value="{{ old('bahasa_dikuasai') }}">
                                @error('bahasa_dikuasai')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat KTP -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Alamat KTP</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="alamat_lengkap" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                                    Lengkap</label>
                                <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Alamat Lengkap">{{ old('alamat_lengkap') }}</textarea>
                                @error('alamat_lengkap')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                                <input type="text" id="rt" name="rt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="RT" value="{{ old('rt') }}">
                                @error('rt')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="rw" class="block mb-2 text-sm font-medium text-gray-900">RW</label>
                                <input type="text" id="rw" name="rw"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="RW" value="{{ old('rw') }}">
                                @error('rw')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kelurahan_desa"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kelurahan/Desa</label>
                                <input type="text" id="kelurahan_desa" name="kelurahan_desa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kelurahan/Desa" value="{{ old('kelurahan_desa') }}">
                                @error('kelurahan_desa')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kecamatan"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kecamatan" value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kota_kabupaten"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kota/Kabupaten</label>
                                <input type="text" id="kota_kabupaten" name="kota_kabupaten"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kota/Kabupaten" value="{{ old('kota_kabupaten') }}">
                                @error('kota_kabupaten')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_pos" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                    Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kode Pos" value="{{ old('kode_pos') }}">
                                @error('kode_pos')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="provinsi"
                                    class="block mb-2 text-sm font-medium text-gray-900">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Provinsi" value="{{ old('provinsi') }}">
                                @error('provinsi')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="negara" class="block mb-2 text-sm font-medium text-gray-900">Negara</label>
                                <input type="text" id="negara" name="negara"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Negara" value="{{ old('negara', 'Indonesia') }}">
                                @error('negara')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Domisili -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-gray-800 border-b pb-2">Alamat Domisili</h2>
                            <div class="flex items-center">
                                <input id="same_as_ktp" type="checkbox"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 rounded focus:ring-amber-400">
                                <label for="same_as_ktp" class="ml-2 text-sm font-medium text-gray-900">Sama dengan alamat
                                    KTP</label>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="alamat_domisili" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                                    Domisili</label>
                                <textarea id="alamat_domisili" name="alamat_domisili" rows="3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Alamat Domisili">{{ old('alamat_domisili') }}</textarea>
                                @error('alamat_domisili')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_rt" class="block mb-2 text-sm font-medium text-gray-900">RT</label>
                                <input type="text" id="domisili_rt" name="domisili_rt"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="RT" value="{{ old('domisili_rt') }}">
                                @error('domisili_rt')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_rw" class="block mb-2 text-sm font-medium text-gray-900">RW</label>
                                <input type="text" id="domisili_rw" name="domisili_rw"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="RW" value="{{ old('domisili_rw') }}">
                                @error('domisili_rw')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kelurahan_desa"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kelurahan/Desa</label>
                                <input type="text" id="domisili_kelurahan_desa" name="domisili_kelurahan_desa"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kelurahan/Desa" value="{{ old('domisili_kelurahan_desa') }}">
                                @error('domisili_kelurahan_desa')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kecamatan"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kecamatan</label>
                                <input type="text" id="domisili_kecamatan" name="domisili_kecamatan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kecamatan" value="{{ old('domisili_kecamatan') }}">
                                @error('domisili_kecamatan')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kota_kabupaten"
                                    class="block mb-2 text-sm font-medium text-gray-900">Kota/Kabupaten</label>
                                <input type="text" id="domisili_kota_kabupaten" name="domisili_kota_kabupaten"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kota/Kabupaten" value="{{ old('domisili_kota_kabupaten') }}">
                                @error('domisili_kota_kabupaten')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kode_pos" class="block mb-2 text-sm font-medium text-gray-900">Kode
                                    Pos</label>
                                <input type="text" id="domisili_kode_pos" name="domisili_kode_pos"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Kode Pos" value="{{ old('domisili_kode_pos') }}">
                                @error('domisili_kode_pos')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_provinsi"
                                    class="block mb-2 text-sm font-medium text-gray-900">Provinsi</label>
                                <input type="text" id="domisili_provinsi" name="domisili_provinsi"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Provinsi" value="{{ old('domisili_provinsi') }}">
                                @error('domisili_provinsi')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_negara"
                                    class="block mb-2 text-sm font-medium text-gray-900">Negara</label>
                                <input type="text" id="domisili_negara" name="domisili_negara"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Negara" value="{{ old('domisili_negara', 'Indonesia') }}">
                                @error('domisili_negara')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Kontak dan Data Lainnya -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Informasi Kontak & Data Lainnya
                        </h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="telepon_rumah" class="block mb-2 text-sm font-medium text-gray-900">Telepon
                                    Rumah</label>
                                <input type="text" id="telepon_rumah" name="telepon_rumah"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Telepon Rumah" value="{{ old('telepon_rumah') }}">
                                @error('telepon_rumah')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="telepon_seluler" class="block mb-2 text-sm font-medium text-gray-900">Telepon
                                    Seluler</label>
                                <input type="text" id="telepon_seluler" name="telepon_seluler"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Telepon Seluler" value="{{ old('telepon_seluler') }}">
                                @error('telepon_seluler')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="pendidikan"
                                    class="block mb-2 text-sm font-medium text-gray-900">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Pendidikan</option>
                                    <option value="Tidak Sekolah"
                                        {{ old('pendidikan') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                                    <option value="SD" {{ old('pendidikan') == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('pendidikan') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA/SMK" {{ old('pendidikan') == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK
                                    </option>
                                    <option value="D1" {{ old('pendidikan') == 'D1' ? 'selected' : '' }}>D1</option>
                                    <option value="D2" {{ old('pendidikan') == 'D2' ? 'selected' : '' }}>D2</option>
                                    <option value="D3" {{ old('pendidikan') == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="D4/S1" {{ old('pendidikan') == 'D4/S1' ? 'selected' : '' }}>D4/S1
                                    </option>
                                    <option value="S2" {{ old('pendidikan') == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="S3" {{ old('pendidikan') == 'S3' ? 'selected' : '' }}>S3</option>
                                </select>
                                @error('pendidikan')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="pekerjaan"
                                    class="block mb-2 text-sm font-medium text-gray-900">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                    placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
                                @error('pekerjaan')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="status_pernikahan" class="block mb-2 text-sm font-medium text-gray-900">Status
                                    Pernikahan</label>
                                <select id="status_pernikahan" name="status_pernikahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Status Pernikahan</option>
                                    <option value="Belum Menikah"
                                        {{ old('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah
                                    </option>
                                    <option value="Menikah" {{ old('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>
                                        Menikah</option>
                                    <option value="Cerai Hidup"
                                        {{ old('status_pernikahan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup
                                    </option>
                                    <option value="Cerai Mati"
                                        {{ old('status_pernikahan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati
                                    </option>
                                </select>
                                @error('status_pernikahan')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="cara_pembayaran" class="block mb-2 text-sm font-medium text-gray-900">Cara
                                    Pembayaran</label>
                                <select id="cara_pembayaran" name="cara_pembayaran"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
                                    <option value="" selected disabled>Pilih Cara Pembayaran</option>
                                    <option value="Umum" {{ old('cara_pembayaran') == 'Umum' ? 'selected' : '' }}>Umum
                                    </option>
                                    <option value="BPJS" {{ old('cara_pembayaran') == 'BPJS' ? 'selected' : '' }}>BPJS
                                    </option>
                                    <option value="Asuransi" {{ old('cara_pembayaran') == 'Asuransi' ? 'selected' : '' }}>
                                        Asuransi</option>
                                    <option value="Perusahaan"
                                        {{ old('cara_pembayaran') == 'Perusahaan' ? 'selected' : '' }}>Perusahaan</option>
                                </select>
                                @error('cara_pembayaran')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Dokumen Pendukung -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Dokumen Pendukung</h2>
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <div id="image-preview"
                                    class="w-full p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                    <input id="foto_pasien_path" type="file" class="hidden" accept="image/*" />
                                    <label for="foto_pasien_path" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be
                                            less than <b class="text-gray-600">2mb</b></p>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b
                                                class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                        <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                    </label>
                                </div>
                                <div class="flex items-center justify-center">
                                    <div class="w-full">
                                        <label
                                            class="w-full text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                                            <span class="text-center ml-2">Upload</span>
                                        </label>
                                    </div>
                                </div>
                                @error('foto_pasien_path')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <div id="image-preview"
                                    class="w-full p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                    <input id="tanda_tangan_pasien_path" type="file" class="hidden"
                                        accept="image/*" />
                                    <label for="tanda_tangan_pasien_path" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be
                                            less than <b class="text-gray-600">2mb</b></p>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b
                                                class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                        <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                    </label>
                                </div>
                                <div class="flex items-center justify-center">
                                    <div class="w-full">
                                        <label
                                            class="w-full text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                                            <span class="text-center ml-2">Upload</span>
                                        </label>
                                    </div>
                                </div>
                                @error('tanda_tangan_pasien_path')
                                    <span class="text-red-400 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit dan Reset -->
                    <div class="flex justify-end space-x-4">
                        <button type="reset"
                            class="px-5 py-2.5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                            Reset
                        </button>
                        <button type="submit"
                            class="text-white bg-amber-400 hover:bg-amber-600 cursor-pointer focus:ring-4 focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Simpan Data Pasien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const uploadInput = document.getElementById('upload');
        const filenameLabel = document.getElementById('filename');
        const imagePreview = document.getElementById('image-preview');

        // Check if the event listener has been added before
        let isEventListenerAdded = false;

        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {
                filenameLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

                    // Add event listener for image preview only once
                    if (!isEventListenerAdded) {
                        imagePreview.addEventListener('click', () => {
                            uploadInput.click();
                        });

                        isEventListenerAdded = true;
                    }
                };
                reader.readAsDataURL(file);
            } else {
                filenameLabel.textContent = '';
                imagePreview.innerHTML =
                    `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
                imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

                // Remove the event listener when there's no image
                imagePreview.removeEventListener('click', () => {
                    uploadInput.click();
                });

                isEventListenerAdded = false;
            }
        });

        uploadInput.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    </script>
@endpush

@push('scripts')
    <script>
        // Script untuk menangani checkbox 'sama dengan alamat KTP'
        document.addEventListener('DOMContentLoaded', function() {
            const sameAsKtpCheckbox = document.getElementById('same_as_ktp');

            sameAsKtpCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // Salin nilai dari alamat KTP ke alamat domisili
                    document.getElementById('alamat_domisili').value = document.getElementById(
                        'alamat_lengkap').value;
                    document.getElementById('domisili_rt').value = document.getElementById('rt').value;
                    document.getElementById('domisili_rw').value = document.getElementById('rw').value;
                    document.getElementById('domisili_kelurahan_desa').value = document.getElementById(
                        'kelurahan_desa').value;
                    document.getElementById('domisili_kecamatan').value = document.getElementById(
                        'kecamatan').value;
                    document.getElementById('domisili_kota_kabupaten').value = document.getElementById(
                        'kota_kabupaten').value;
                    document.getElementById('domisili_kode_pos').value = document.getElementById('kode_pos')
                        .value;
                    document.getElementById('domisili_provinsi').value = document.getElementById('provinsi')
                        .value;
                    document.getElementById('domisili_negara').value = document.getElementById('negara')
                        .value;
                } else {
                    // Kosongkan field alamat domisili
                    document.getElementById('alamat_domisili').value = '';
                    document.getElementById('domisili_rt').value = '';
                    document.getElementById('domisili_rw').value = '';
                    document.getElementById('domisili_kelurahan_desa').value = '';
                    document.getElementById('domisili_kecamatan').value = '';
                    document.getElementById('domisili_kota_kabupaten').value = '';
                    document.getElementById('domisili_kode_pos').value = '';
                    document.getElementById('domisili_provinsi').value = '';
                    document.getElementById('domisili_negara').value = 'Indonesia';
                }
            });
        });
    </script>
@endpush
