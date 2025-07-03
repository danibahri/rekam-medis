@extends('layouts.master')
@section('title', 'Edit Data Pasien')
@section('description', 'Edit Data Pasien - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Edit Data Pasien</h1>
            <div class="rounded-lg bg-white p-6 shadow">
                <form action="{{ route('update.pasien', $pasien->id_pasien) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Data Identitas Utama -->
                    <div class="mb-6">
                        <h2 class="mb-4 border-b pb-2 text-xl font-semibold text-gray-800">Data Identitas Utama</h2>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label for="nomor_rekam_medis" class="mb-2 block text-sm font-medium text-gray-900">Nomor
                                    Rekam Medis</label>
                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Nomor Rekam Medis"
                                    value="{{ old('nomor_rekam_medis', $pasien->nomor_rekam_medis) }}">
                                @error('nomor_rekam_medis')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Data Pribadi -->
                    <div class="mb-6">
                        <h2 class="mb-4 border-b pb-2 text-xl font-semibold text-gray-800">Data Pribadi</h2>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label for="nik" class="mb-2 block text-sm font-medium text-gray-900">NIK</label>
                                <input type="text" id="nik" name="nik"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Nomor Induk Kependudukan" value="{{ old('nik', $pasien->nik) }}">
                                @error('nik')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nomor_identitas_lain" class="mb-2 block text-sm font-medium text-gray-900">Nomor
                                    Identitas Lain</label>
                                <input type="text" id="nomor_identitas_lain" name="nomor_identitas_lain"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Nomor Identitas Lain"
                                    value="{{ old('nomor_identitas_lain', $pasien->nomor_identitas_lain) }}">
                                @error('nomor_identitas_lain')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_lengkap" class="mb-2 block text-sm font-medium text-gray-900">Nama
                                    Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $pasien->nama_lengkap) }}"
                                    required>
                                @error('nama_lengkap')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="nama_ibu_kandung" class="mb-2 block text-sm font-medium text-gray-900">Nama Ibu
                                    Kandung</label>
                                <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Nama Ibu Kandung"
                                    value="{{ old('nama_ibu_kandung', $pasien->nama_ibu_kandung) }}">
                                @error('nama_ibu_kandung')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="tempat_lahir" class="mb-2 block text-sm font-medium text-gray-900">Tempat
                                    Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Tempat Lahir" value="{{ old('tempat_lahir', $pasien->tempat_lahir) }}">
                                @error('tempat_lahir')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="tanggal_lahir" class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                                    Lahir</label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-4 w-4 text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_lahir"
                                        name="tanggal_lahir"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                        placeholder="Pilih tanggal"
                                        value="{{ old('tanggal_lahir', $pasien->tanggal_lahir ? $pasien->tanggal_lahir->format('Y-m-d') : '') }}">
                                </div>
                                @error('tanggal_lahir')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="jenis_kelamin" class="mb-2 block text-sm font-medium text-gray-900">Jenis
                                    Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    @foreach ($master_jenisKelamin as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('jenis_kelamin', $pasien->jenis_kelamin) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_kelamin')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="agama" class="mb-2 block text-sm font-medium text-gray-900">Agama</label>
                                <select id="agama" name="agama"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Agama</option>
                                    @foreach ($master_agama as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('agama', $pasien->agama) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="suku" class="mb-2 block text-sm font-medium text-gray-900">Suku</label>
                                <input type="text" id="suku" name="suku"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Suku" value="{{ old('suku', $pasien->suku) }}">
                                @error('suku')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="bahasa_dikuasai" class="mb-2 block text-sm font-medium text-gray-900">Bahasa
                                    yang Dikuasai</label>
                                <input type="text" id="bahasa_dikuasai" name="bahasa_dikuasai"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Bahasa yang Dikuasai"
                                    value="{{ old('bahasa_dikuasai', $pasien->bahasa_dikuasai) }}">
                                @error('bahasa_dikuasai')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat KTP -->
                    <div class="mb-6">
                        <h2 class="mb-4 border-b pb-2 text-xl font-semibold text-gray-800">Alamat KTP</h2>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label for="alamat_lengkap" class="mb-2 block text-sm font-medium text-gray-900">Alamat
                                    Lengkap</label>
                                <textarea id="alamat_lengkap" name="alamat_lengkap" rows="3"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Alamat Lengkap">{{ old('alamat_lengkap', $pasien->alamat_lengkap) }}</textarea>
                                @error('alamat_lengkap')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="rt" class="mb-2 block text-sm font-medium text-gray-900">RT</label>
                                <input type="text" id="rt" name="rt"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="RT" value="{{ old('rt', $pasien->rt) }}">
                                @error('rt')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="rw" class="mb-2 block text-sm font-medium text-gray-900">RW</label>
                                <input type="text" id="rw" name="rw"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="RW" value="{{ old('rw', $pasien->rw) }}">
                                @error('rw')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kelurahan_desa"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kelurahan/Desa</label>
                                <input type="text" id="kelurahan_desa" name="kelurahan_desa"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kelurahan/Desa"
                                    value="{{ old('kelurahan_desa', $pasien->kelurahan_desa) }}">
                                @error('kelurahan_desa')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kecamatan"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kecamatan</label>
                                <input type="text" id="kecamatan" name="kecamatan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kecamatan" value="{{ old('kecamatan', $pasien->kecamatan) }}">
                                @error('kecamatan')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kota_kabupaten"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kota/Kabupaten</label>
                                <input type="text" id="kota_kabupaten" name="kota_kabupaten"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kota/Kabupaten"
                                    value="{{ old('kota_kabupaten', $pasien->kota_kabupaten) }}">
                                @error('kota_kabupaten')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="kode_pos" class="mb-2 block text-sm font-medium text-gray-900">Kode
                                    Pos</label>
                                <input type="text" id="kode_pos" name="kode_pos"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kode Pos" value="{{ old('kode_pos', $pasien->kode_pos) }}">
                                @error('kode_pos')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="provinsi"
                                    class="mb-2 block text-sm font-medium text-gray-900">Provinsi</label>
                                <input type="text" id="provinsi" name="provinsi"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Provinsi" value="{{ old('provinsi', $pasien->provinsi) }}">
                                @error('provinsi')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="negara" class="mb-2 block text-sm font-medium text-gray-900">Negara</label>
                                <input type="text" id="negara" name="negara"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Negara" value="{{ old('negara', $pasien->negara) ?? 'Indonesia' }}">
                                @error('negara')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Domisili -->
                    <div class="mb-6">
                        <div class="mb-4 flex items-center justify-between">
                            <h2 class="border-b pb-2 text-xl font-semibold text-gray-800">Alamat Domisili</h2>
                            <div class="flex items-center">
                                <input id="same_as_ktp" type="checkbox" value=""
                                    class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-amber-600 focus:ring-2 focus:ring-amber-500">
                                <label for="same_as_ktp" class="ml-2 text-sm font-medium text-gray-900">Sama dengan alamat
                                    KTP</label>
                            </div>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label for="alamat_domisili" class="mb-2 block text-sm font-medium text-gray-900">Alamat
                                    Domisili</label>
                                <textarea id="alamat_domisili" name="alamat_domisili" rows="3"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Alamat Domisili">{{ old('alamat_domisili', $pasien->alamat_domisili) }}</textarea>
                                @error('alamat_domisili')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_rt" class="mb-2 block text-sm font-medium text-gray-900">RT</label>
                                <input type="text" id="domisili_rt" name="domisili_rt"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="RT" value="{{ old('domisili_rt', $pasien->domisili_rt) }}">
                                @error('domisili_rt')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_rw" class="mb-2 block text-sm font-medium text-gray-900">RW</label>
                                <input type="text" id="domisili_rw" name="domisili_rw"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="RW" value="{{ old('domisili_rw', $pasien->domisili_rw) }}">
                                @error('domisili_rw')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kelurahan_desa"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kelurahan/Desa</label>
                                <input type="text" id="domisili_kelurahan_desa" name="domisili_kelurahan_desa"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kelurahan/Desa"
                                    value="{{ old('domisili_kelurahan_desa', $pasien->domisili_kelurahan_desa) }}">
                                @error('domisili_kelurahan_desa')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kecamatan"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kecamatan</label>
                                <input type="text" id="domisili_kecamatan" name="domisili_kecamatan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kecamatan"
                                    value="{{ old('domisili_kecamatan', $pasien->domisili_kecamatan) }}">
                                @error('domisili_kecamatan')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kota_kabupaten"
                                    class="mb-2 block text-sm font-medium text-gray-900">Kota/Kabupaten</label>
                                <input type="text" id="domisili_kota_kabupaten" name="domisili_kota_kabupaten"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kota/Kabupaten"
                                    value="{{ old('domisili_kota_kabupaten', $pasien->domisili_kota_kabupaten) }}">
                                @error('domisili_kota_kabupaten')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_kode_pos" class="mb-2 block text-sm font-medium text-gray-900">Kode
                                    Pos</label>
                                <input type="text" id="domisili_kode_pos" name="domisili_kode_pos"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Kode Pos"
                                    value="{{ old('domisili_kode_pos', $pasien->domisili_kode_pos) }}">
                                @error('domisili_kode_pos')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_provinsi"
                                    class="mb-2 block text-sm font-medium text-gray-900">Provinsi</label>
                                <input type="text" id="domisili_provinsi" name="domisili_provinsi"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Provinsi"
                                    value="{{ old('domisili_provinsi', $pasien->domisili_provinsi) }}">
                                @error('domisili_provinsi')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="domisili_negara"
                                    class="mb-2 block text-sm font-medium text-gray-900">Negara</label>
                                <input type="text" id="domisili_negara" name="domisili_negara"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Negara"
                                    value="{{ old('domisili_negara', $pasien->domisili_negara) ?? 'Indonesia' }}">
                                @error('domisili_negara')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Kontak dan Data Lainnya -->
                    <div class="mb-6">
                        <h2 class="mb-4 border-b pb-2 text-xl font-semibold text-gray-800">Informasi Kontak & Data Lainnya
                        </h2>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <label for="telepon_rumah" class="mb-2 block text-sm font-medium text-gray-900">Telepon
                                    Rumah</label>
                                <input type="text" id="telepon_rumah" name="telepon_rumah"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Telepon Rumah"
                                    value="{{ old('telepon_rumah', $pasien->telepon_rumah) }}">
                                @error('telepon_rumah')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="telepon_seluler" class="mb-2 block text-sm font-medium text-gray-900">Telepon
                                    Seluler</label>
                                <input type="text" id="telepon_seluler" name="telepon_seluler"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                    placeholder="Telepon Seluler"
                                    value="{{ old('telepon_seluler', $pasien->telepon_seluler) }}">
                                @error('telepon_seluler')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="pendidikan"
                                    class="mb-2 block text-sm font-medium text-gray-900">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Pendidikan</option>
                                    @foreach ($master_pendidikan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pendidikan', $pasien->pendidikan) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pendidikan')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="pekerjaan"
                                    class="mb-2 block text-sm font-medium text-gray-900">Pekerjaan</label>
                                <select id="pekerjaan" name="pekerjaan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Pekerjaan</option>
                                    @foreach ($master_pekerjaan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('pekerjaan', $pasien->pekerjaan) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('pekerjaan')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="status_pernikahan" class="mb-2 block text-sm font-medium text-gray-900">Status
                                    Pernikahan</label>
                                <select id="status_pernikahan" name="status_pernikahan"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Status Pernikahan</option>
                                    @foreach ($master_pernikahan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('status_pernikahan', $pasien->status_pernikahan) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('status_pernikahan')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div>
                                <label for="cara_pembayaran" class="mb-2 block text-sm font-medium text-gray-900">Cara
                                    Pembayaran</label>
                                <select id="cara_pembayaran" name="cara_pembayaran"
                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                                    <option value="" selected disabled>Pilih Cara Pembayaran</option>
                                    @foreach ($master_pembayaran as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('cara_pembayaran', $pasien->cara_pembayaran) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('cara_pembayaran')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                            </div> --}}
                        </div>
                    </div>

                    <!-- Dokumen Pendukung -->
                    <div class="mb-6">
                        <h2 class="mb-4 border-b pb-2 text-xl font-semibold text-gray-800">Foto Pasien</h2>
                        <div class="grid gap-6 md:grid-cols-2">
                            <div>
                                <div id="image-preview"
                                    class="mx-auto mb-4 w-full cursor-pointer items-center rounded-lg border-2 border-dashed border-gray-400 bg-gray-100 p-6 text-center">
                                    <input id="foto_pasien_path" name="foto_pasien_path" type="file" class="hidden"
                                        accept="image/*" />
                                    <label for="foto_pasien_path" class="cursor-pointer">
                                        <div id="preview-content">
                                            @if ($pasien->foto_pasien_path)
                                                <img src="{{ $pasien->foto_url }}" class="mx-auto max-h-48 rounded-lg"
                                                    alt="Foto Pasien Saat Ini" />
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="mx-auto mb-4 h-8 w-8 text-gray-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                                </svg>
                                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Unggah Foto
                                                    Pasien
                                                </h5>
                                                <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size
                                                    should
                                                    be
                                                    less than <b class="text-gray-600">2mb</b></p>
                                                <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b
                                                        class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                            @endif
                                        </div>
                                        <span id="filename" class="z-50 bg-gray-200 text-gray-500"></span>
                                    </label>
                                </div>
                                <div class="flex items-center justify-center">
                                    <div class="w-full">
                                        <label for="foto_pasien_path"
                                            class="mb-2 mr-2 flex w-full cursor-pointer items-center justify-center rounded-lg bg-[#050708] px-5 py-2.5 text-sm font-medium text-white hover:bg-[#050708]/90 focus:outline-none focus:ring-4 focus:ring-[#050708]/50">
                                            <span
                                                class="ml-2 text-center">{{ $pasien->foto_pasien_path ? 'Ganti Foto' : 'Upload Foto' }}</span>
                                        </label>
                                    </div>
                                </div>
                                @error('foto_pasien_path')
                                    <span class="text-xs text-red-400">{{ $message }}</span>
                                @enderror
                                @if ($pasien->foto_pasien_path)
                                    <p class="mt-2 text-xs text-gray-500">Foto saat ini akan diganti jika Anda upload foto
                                        baru</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit dan Reset -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('profile.pasien', $pasien->id_pasien) }}"
                            class="cursor-pointer rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                            Kembali
                        </a>
                        <button type="submit"
                            class="cursor-pointer rounded-lg bg-amber-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-600 focus:ring-4 focus:ring-amber-300">
                            Update Data Pasien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const uploadInput = document.getElementById('foto_pasien_path');
        const filenameLabel = document.getElementById('filename');
        const imagePreview = document.getElementById('image-preview');
        const previewContent = document.getElementById('preview-content');

        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {
                filenameLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (e) => {
                    // Hanya ubah konten preview, bukan seluruh innerHTML
                    previewContent.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
                };
                reader.readAsDataURL(file);
            } else {
                filenameLabel.textContent = '';
                // Reset ke foto saat ini atau state default
                @if ($pasien->foto_pasien_path)
                    previewContent.innerHTML =
                        `<img src="{{ $pasien->foto_url }}" class="max-h-48 rounded-lg mx-auto" alt="Foto Pasien Saat Ini" />`;
                @else
                    previewContent.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="mx-auto mb-4 h-8 w-8 text-gray-700">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Unggah Foto Pasien</h5>
                    <p class="text-sm font-normal text-gray-400 md:px-6">Choose photo size should be less than <b class="text-gray-600">2mb</b></p>
                    <p class="text-sm font-normal text-gray-400 md:px-6">and should be in <b class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                `;
                @endif
                imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');
            }
        });

        // Event listener untuk klik pada area preview
        imagePreview.addEventListener('click', (event) => {
            // Pastikan klik tidak berasal dari input itu sendiri
            if (event.target !== uploadInput) {
                uploadInput.click();
            }
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
