@extends('layouts.master')
@section('title', 'Profile Pasien')
@section('description', 'Profile Pasien - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Data Diri Pasien</h1>

            {{-- Patient Profile Content --}}
            <div class="rounded-lg bg-white p-6 shadow-lg">

                {{-- Header Section with Photo --}}
                <div class="mb-6 rounded-lg bg-amber-300 p-6">
                    <div class="flex flex-col items-center gap-6 md:flex-row">
                        <div class="h-32 w-32 overflow-hidden rounded-full border-4 border-white bg-amber-200 shadow-lg">
                            @if (!empty($pasien->foto_pasien_path))
                                <img src="{{ asset($pasien->foto_pasien_path) }}" alt="Foto Pasien"
                                    class="h-full w-full rounded-full object-cover">
                            @else
                                <div class="flex h-full w-full items-center justify-center rounded-full bg-amber-100">
                                    <span class="text-8xl font-semibold text-amber-700">
                                        {{ strtoupper(substr($pasien->nama_lengkap, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="text-left md:text-center">
                            <h2 class="mb-2 text-2xl font-bold text-gray-800">{{ $pasien->nama_lengkap ?? 'Nama Pasien' }}
                            </h2>
                            <p class="font-semibold text-gray-700">No. Rekam Medis: {{ $pasien->nomor_rekam_medis ?? '-' }}
                            </p>
                            <p class="text-gray-700">ID Pasien: {{ $pasien->id_pasien ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Informasi Identitas --}}
                <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="rounded-lg border border-amber-200 bg-amber-50 p-5">
                        <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                            <i class="fas fa-id-card mr-2"></i>Informasi Identitas
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">NIK:</span>
                                <span class="text-gray-800">{{ $pasien->nik ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">No. Identitas Lain:</span>
                                <span class="text-gray-800">{{ $pasien->nomor_identitas_lain ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Nama Ibu Kandung:</span>
                                <span class="text-gray-800">{{ $pasien->nama_ibu_kandung ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-amber-200 bg-amber-50 p-5">
                        <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                            <i class="fas fa-user mr-2"></i>Data Pribadi
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Tempat Lahir:</span>
                                <span class="text-gray-800">{{ $pasien->tempat_lahir ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Tanggal Lahir:</span>
                                <span class="text-gray-800">
                                    {{ $pasien->tanggal_lahir ? \Carbon\Carbon::parse($pasien->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Jenis Kelamin:</span>
                                <span class="text-gray-800">{{ $pasien->jenisKelamin->nama ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Agama:</span>
                                <span class="text-gray-800">{{ $pasien->Agama->nama ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Informasi Latar Belakang --}}
                <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <div class="rounded-lg border border-amber-200 bg-amber-50 p-5">
                        <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                            <i class="fas fa-globe mr-2"></i>Latar Belakang
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Suku:</span>
                                <span class="text-gray-800">{{ $pasien->suku ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Bahasa Dikuasai:</span>
                                <span class="text-gray-800">{{ $pasien->bahasa_dikuasai ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Pendidikan:</span>
                                <span class="text-gray-800">{{ $pasien->Pendidikan->nama ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Pekerjaan:</span>
                                <span class="text-gray-800">{{ $pasien->Pekerjaan->nama ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Status Pernikahan:</span>
                                <span class="text-gray-800">{{ $pasien->statusPernikahan->nama ?? '-' }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg border border-amber-200 bg-amber-50 p-5">
                        <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                            <i class="fas fa-phone mr-2"></i>Kontak
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Telepon Rumah:</span>
                                <span class="text-gray-800">{{ $pasien->telepon_rumah ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium text-gray-600">Telepon Seluler:</span>
                                <span class="text-gray-800">{{ $pasien->telepon_seluler ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Alamat KTP --}}
                <div class="mb-6 rounded-lg border border-amber-200 bg-amber-50 p-5">
                    <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                        <i class="fas fa-home mr-2"></i>Alamat Sesuai KTP
                    </h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Alamat Lengkap:</label>
                            <p class="text-gray-800">{{ $pasien->alamat_lengkap ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">RT/RW:</label>
                            <p class="text-gray-800">{{ ($pasien->rt ?? '-') . '/' . ($pasien->rw ?? '-') }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kelurahan/Desa:</label>
                            <p class="text-gray-800">{{ $pasien->kelurahan_desa ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kecamatan:</label>
                            <p class="text-gray-800">{{ $pasien->kecamatan ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kota/Kabupaten:</label>
                            <p class="text-gray-800">{{ $pasien->kota_kabupaten ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kode Pos:</label>
                            <p class="text-gray-800">{{ $pasien->kode_pos ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Provinsi:</label>
                            <p class="text-gray-800">{{ $pasien->provinsi ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Negara:</label>
                            <p class="text-gray-800">{{ $pasien->negara ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Alamat Domisili --}}
                <div class="mb-6 rounded-lg border border-amber-200 bg-amber-50 p-5">
                    <h3 class="mb-4 border-b border-amber-300 pb-2 text-lg font-semibold text-amber-800">
                        <i class="fas fa-map-marker-alt mr-2"></i>Alamat Domisili
                    </h3>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Alamat Domisili:</label>
                            <p class="text-gray-800">{{ $pasien->alamat_domisili ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">RT/RW:</label>
                            <p class="text-gray-800">
                                {{ ($pasien->domisili_rt ?? '-') . '/' . ($pasien->domisili_rw ?? '-') }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kelurahan/Desa:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_kelurahan_desa ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kecamatan:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_kecamatan ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kota/Kabupaten:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_kota_kabupaten ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kode Pos:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_kode_pos ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Provinsi:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_provinsi ?? '-' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Negara:</label>
                            <p class="text-gray-800">{{ $pasien->domisili_negara ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-wrap justify-end gap-3">
                    <a
                        class="rounded-lg bg-amber-300 px-4 py-2 font-semibold text-amber-800 shadow transition duration-200 hover:bg-amber-400">
                        <i class="fas fa-edit mr-2"></i>Edit Profile
                    </a>
                    <a
                        class="rounded-lg bg-amber-500 px-4 py-2 font-semibold text-white shadow transition duration-200 hover:bg-amber-600">
                        <i class="fas fa-print mr-2"></i>Cetak Profile
                    </a>
                    {{-- href kembali back() --}}
                    <a href="{{ url()->previous() }}"
                        class="rounded-lg bg-gray-300 px-4 py-2 font-semibold text-gray-700 shadow transition duration-200 hover:bg-gray-400">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
