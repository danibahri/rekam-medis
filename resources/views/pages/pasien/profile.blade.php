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
                                <img src="{{ $pasien->foto_url }}" alt="Foto Pasien"
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
                            <p class="text-gray-700">NIK Pasien: {{ $pasien->nik ?? '-' }}</p>
                            <div class="mt-4 flex flex-col gap-2 md:flex-row">
                                <div>
                                    <a href="{{ route('edit.pasien', $pasien->id_pasien) }}" data-tooltip-target="tooltip-1"
                                        data-tooltip-style="light"
                                        class="focus:ring-white-300 inline-flex items-center rounded-lg border-2 px-4 py-2 text-sm font-medium text-white hover:shadow-xl focus:outline-none focus:ring-4">
                                        <svg class="mr-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Z" />
                                        </svg>
                                        Edit Data Pasien
                                    </a>
                                    <div id="tooltip-1" role="tooltip"
                                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                        Edit data pasien
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                                <div>
                                    <a href="{{ route('persetujuan.pasien.pdf', $pasien->id_pasien) }}"
                                        data-tooltip-target="tooltip-2" data-tooltip-style="light" target="_blank"
                                        class="focus:ring-white-300 inline-flex items-center rounded-lg border-2 px-4 py-2 text-sm font-medium text-white hover:shadow-xl focus:outline-none focus:ring-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="mr-2 h-4 w-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        Persetujuan Pasien
                                    </a>
                                    <div id="tooltip-2" role="tooltip"
                                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                        Cetak surat persetujuan pasien
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </div>
                            </div>
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
                                <span class="font-medium text-gray-600">No ID:</span>
                                <span class="text-gray-800">{{ $pasien->id_pasien ?? '-' }}</span>
                            </div>
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
            </div>

            @if (Auth::user()->role != 'admin')
                {{-- kunjungan pasien dengan status selesai --}}
                <div class="mt-8 rounded-lg bg-white p-6 shadow-lg">
                    <h2 class="mb-4 text-2xl font-bold text-gray-800">Riwayat Kunjungan Pasien</h2>

                    {{-- Filter Form --}}
                    <div class="mb-6 rounded-lg border border-amber-200 bg-amber-50 p-4">

                        {{-- Quick Filter Buttons --}}
                        <div class="mb-4 flex flex-wrap gap-2">
                            <button type="button"
                                class="quick-filter rounded-lg bg-amber-100 px-3 py-1.5 text-sm text-amber-800 transition-colors hover:bg-amber-200"
                                data-filter="today">Hari Ini</button>
                            <button type="button"
                                class="quick-filter rounded-lg bg-amber-100 px-3 py-1.5 text-sm text-amber-800 transition-colors hover:bg-amber-200"
                                data-filter="week">Minggu Ini</button>
                            <button type="button"
                                class="quick-filter rounded-lg bg-amber-100 px-3 py-1.5 text-sm text-amber-800 transition-colors hover:bg-amber-200"
                                data-filter="month">Bulan Ini</button>
                            <button type="button"
                                class="quick-filter rounded-lg bg-amber-100 px-3 py-1.5 text-sm text-amber-800 transition-colors hover:bg-amber-200"
                                data-filter="year">Tahun Ini</button>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div>
                                <label for="start_date" class="mb-1 block text-sm font-medium text-gray-700">Tanggal
                                    Mulai</label>
                                <input type="date" id="start_date" name="start_date"
                                    class="w-full rounded-lg border border-gray-300 p-2.5 focus:border-amber-500 focus:ring-amber-500">
                            </div>
                            <div>
                                <label for="end_date" class="mb-1 block text-sm font-medium text-gray-700">Tanggal
                                    Akhir</label>
                                <input type="date" id="end_date" name="end_date"
                                    class="w-full rounded-lg border border-gray-300 p-2.5 focus:border-amber-500 focus:ring-amber-500">
                            </div>
                            <div class="flex items-end gap-2">
                                <button type="button" id="filter_btn"
                                    class="rounded-lg bg-amber-500 px-4 py-2.5 text-white transition-colors hover:bg-amber-600">
                                    <i class="fas fa-search mr-2"></i>Filter
                                </button>
                                <button type="button" id="reset_filter_btn"
                                    class="rounded-lg bg-gray-500 px-4 py-2.5 text-white transition-colors hover:bg-gray-600">
                                    <i class="fas fa-refresh mr-2"></i>Reset
                                </button>
                            </div>
                        </div>

                        {{-- Rows per page and Filter Result Info --}}
                        <div class="mt-3 flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                            <div class="flex items-center gap-2">
                                <label for="rows_per_page" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                                <select id="rows_per_page"
                                    class="rounded border border-gray-300 px-3 py-1 text-sm focus:border-amber-500 focus:ring-amber-500">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="all">Semua</option>
                                </select>
                                <span class="text-sm text-gray-700">data per halaman</span>
                            </div>

                            <div id="filter_info" class="hidden text-sm text-gray-600">
                                <i class="fas fa-info-circle mr-1"></i>
                                <span id="filter_count">0</span> dari <span
                                    id="total_count">{{ $kunjungan->count() }}</span>
                                kunjungan ditampilkan
                            </div>
                        </div>
                    </div>

                    @if ($kunjungan->isEmpty())
                        <p class="text-gray-600">Pasien belum pernah berkunjung.</p>
                    @else
                        <table id="kunjungan-table"
                            class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700">
                            <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                                <tr>
                                    <th class="px-6 py-3">ID Kunjungan</th>
                                    <th class="px-6 py-3">Tanggal Kunjungan</th>
                                    <th class="px-6 py-3">Waktu Kunjungan</th>
                                    <th class="px-6 py-3">Dokter</th>
                                    <th class="px-6 py-3">Status Pembayaran</th>
                                    <th class="px-6 py-3">Status Kunjungan</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="kunjungan-tbody">
                                @foreach ($kunjungan as $item)
                                    @php
                                        $count = $loop->index + 1;
                                    @endphp
                                    <tr class="kunjungan-row border-b hover:bg-gray-50"
                                        data-tanggal="{{ $item->tanggal_kunjungan }}">
                                        <td class="px-6 py-4">{{ $item->id_kunjungan ?? '-' }}</td>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d F Y') ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4">{{ $item->waktu_kunjungan ?? '-' }}</td>
                                        <td class="px-6 py-4">{{ $item->dokter->nama_dokter ?? '-' }}</td>
                                        <td class="px-6 py-4">
                                            @if (($item->pembayaran->status_pembayaran ?? '-') == 'belum_lunas')
                                                <span class="rounded-xl bg-red-500 px-2 py-2 text-xs text-white">Belum
                                                    Lunas</span>
                                            @elseif (($item->pembayaran->status_pembayaran ?? '-') == 'lunas')
                                                <span
                                                    class="rounded-xl bg-green-500 px-2 py-2 text-xs text-white">Lunas</span>
                                            @else
                                                <span c>-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($item->status == 'menunggu')
                                                <span
                                                    class="rounded-xl bg-red-500 px-2 py-2 text-xs text-white">Menunggu</span>
                                            @elseif($item->status == 'dalam_pemeriksaan')
                                                <span class="rounded-xl bg-amber-500 px-2 py-2 text-xs text-white">
                                                    Pemeriksaan</span>
                                            @else
                                                <span
                                                    class="rounded-xl bg-green-500 px-2 py-2 text-xs text-white">Selesai</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a data-modal-target="modal-{{ $item->id_kunjungan }}"
                                                data-modal-toggle="modal-{{ $item->id_kunjungan }}"
                                                class="cursor-pointer text-yellow-500"
                                                data-tooltip-target="tooltip-{{ $count }}-2"
                                                data-tooltip-style="light">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6 lg:size-7">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                                </svg>
                                            </a>
                                            <div id="tooltip-{{ $count }}-2" role="tooltip"
                                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                Bayar Sekarang
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- modal --}}
                                    <div id="modal-{{ $item->id_kunjungan }}" tabindex="-1" aria-hidden="true"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative max-h-full w-full max-w-4xl p-4">
                                            <!-- Modal content -->
                                            <div class="relative rounded-lg bg-white shadow-sm">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                                                    <h3 class="text-lg font-semibold text-gray-900">
                                                        Informasi Pembayaran Pasien
                                                    </h3>
                                                    <button type="button"
                                                        class="ms-auto inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                                                        data-modal-toggle="modal-{{ $item->id_kunjungan }}">
                                                        <svg class="h-3 w-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form method="POST"
                                                    action="{{ route('store.pembayaran.status', $item->id_kunjungan) }}"
                                                    enctype="multipart/form-data" class="p-4 md:p-5">
                                                    @csrf
                                                    <div class="mb-4 grid grid-cols-2 gap-4 p-4 md:p-5">
                                                        <input type="text" name="id_kunjungan" id="id_kunjungan"
                                                            value="{{ $item->id_kunjungan }}" hidden>
                                                        <div class="col-span-2">
                                                            <label for="id_pembayaran"
                                                                class="mb-2 block text-sm font-medium text-gray-900">Nomor
                                                                Pembayaran</label>
                                                            <input type="text" id="id_pembayaran"
                                                                value="{{ $item->pembayaran->id_pembayaran ?? '-' }}"
                                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                                                                required readonly>
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="tanggal_pembayaran"
                                                                class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                                                                Pembayaran</label>
                                                            <input type="text" id="tanggal_pembayaran"
                                                                value="@if (!empty($item->pembayaran) && !empty($item->pembayaran->tanggal_pembayaran)) {{ \Carbon\Carbon::parse($item->pembayaran->tanggal_pembayaran)->translatedFormat('d F Y H:i') }}
                                                                    @else - @endif"
                                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                                                                required readonly>
                                                        </div>
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="jumlah"
                                                                class="mb-2 block text-sm font-medium text-gray-900">Total
                                                                Tagihan</label>
                                                            <input type="text" id="jumlah"
                                                                value="{{ $item->pembayaran?->jumlah ? 'Rp. ' . number_format($item->pembayaran->jumlah, 0, ',', '.') : '-' }}"
                                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                                                                required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="flex w-full justify-end p-4 md:p-5">
                                                        <button type="submit"
                                                            class="inline-flex cursor-pointer items-end rounded-lg bg-amber-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300">
                                                            <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                            Bayar Sekarang
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination Controls --}}
                        <div id="pagination_controls"
                            class="mt-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span id="showing_start">1</span> - <span id="showing_end">10</span> dari
                                <span id="showing_total">{{ $kunjungan->count() }}</span> kunjungan
                            </div>

                            <div class="flex items-center gap-2">
                                <button id="prev_page"
                                    class="flex items-center rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                                    <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                                    </svg>
                                    Previous
                                </button>

                                <div id="page_numbers" class="flex gap-1">
                                    <!-- Page numbers will be generated by JavaScript -->
                                </div>

                                <button id="next_page"
                                    class="flex items-center rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                                    Next
                                    <svg class="ml-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterBtn = document.getElementById('filter_btn');
            const resetBtn = document.getElementById('reset_filter_btn');
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            const rows = document.querySelectorAll('.kunjungan-row');
            const quickFilterBtns = document.querySelectorAll('.quick-filter');
            const filterInfo = document.getElementById('filter_info');
            const filterCount = document.getElementById('filter_count');
            const totalCount = document.getElementById('total_count');

            // Pagination elements
            const rowsPerPageSelect = document.getElementById('rows_per_page');
            const prevPageBtn = document.getElementById('prev_page');
            const nextPageBtn = document.getElementById('next_page');
            const pageNumbersContainer = document.getElementById('page_numbers');
            const showingStart = document.getElementById('showing_start');
            const showingEnd = document.getElementById('showing_end');
            const showingTotal = document.getElementById('showing_total');
            const paginationControls = document.getElementById('pagination_controls');

            // Pagination state
            let currentPage = 1;
            let rowsPerPage = 10;
            let filteredRows = Array.from(rows);

            // Get today's date
            const today = new Date();
            const formatDate = (date) => date.toISOString().split('T')[0];

            // Quick filter functions
            const getDateRange = (filter) => {
                const today = new Date();
                let startDate, endDate;

                switch (filter) {
                    case 'today':
                        startDate = endDate = today;
                        break;
                    case 'week':
                        const startOfWeek = new Date(today);
                        startOfWeek.setDate(today.getDate() - today.getDay());
                        const endOfWeek = new Date(today);
                        endOfWeek.setDate(today.getDate() + (6 - today.getDay()));
                        startDate = startOfWeek;
                        endDate = endOfWeek;
                        break;
                    case 'month':
                        startDate = new Date(today.getFullYear(), today.getMonth(), 1);
                        endDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                        break;
                    case 'year':
                        startDate = new Date(today.getFullYear(), 0, 1);
                        endDate = new Date(today.getFullYear(), 11, 31);
                        break;
                    default:
                        return null;
                }

                return {
                    start: formatDate(startDate),
                    end: formatDate(endDate)
                };
            };

            // Filter function
            function filterRows() {
                const startDate = startDateInput.value;
                const endDate = endDateInput.value;
                filteredRows = [];

                rows.forEach(row => {
                    const rowDate = row.getAttribute('data-tanggal');
                    let showRow = true;

                    // Check start date filter
                    if (startDate && rowDate < startDate) {
                        showRow = false;
                    }

                    // Check end date filter
                    if (endDate && rowDate > endDate) {
                        showRow = false;
                    }

                    if (showRow) {
                        filteredRows.push(row);
                    }
                });

                // Reset to first page when filtering
                currentPage = 1;

                // Update display
                updateDisplay();
            }

            // Update display based on current page and rows per page
            function updateDisplay() {
                const totalRows = filteredRows.length;
                const totalPages = rowsPerPage === 'all' ? 1 : Math.ceil(totalRows / rowsPerPage);

                // Hide all rows first
                rows.forEach(row => {
                    row.style.display = 'none';
                });

                if (totalRows === 0) {
                    showNoDataMessage(true);
                    paginationControls.style.display = 'none';
                    return;
                }

                showNoDataMessage(false);

                // Show rows for current page
                if (rowsPerPage === 'all') {
                    filteredRows.forEach(row => {
                        row.style.display = '';
                    });
                } else {
                    const startIndex = (currentPage - 1) * rowsPerPage;
                    const endIndex = Math.min(startIndex + rowsPerPage, totalRows);

                    for (let i = startIndex; i < endIndex; i++) {
                        if (filteredRows[i]) {
                            filteredRows[i].style.display = '';
                        }
                    }
                }

                // Update pagination info
                updatePaginationInfo(totalRows, totalPages);
                updateFilterInfo(totalRows);
            }

            // Update pagination info
            function updatePaginationInfo(totalRows, totalPages) {
                if (rowsPerPage === 'all') {
                    showingStart.textContent = totalRows > 0 ? 1 : 0;
                    showingEnd.textContent = totalRows;
                    paginationControls.style.display = totalRows > 0 ? 'flex' : 'none';
                    prevPageBtn.style.display = 'none';
                    nextPageBtn.style.display = 'none';
                    pageNumbersContainer.style.display = 'none';
                } else {
                    const startIndex = totalRows > 0 ? (currentPage - 1) * rowsPerPage + 1 : 0;
                    const endIndex = Math.min(currentPage * rowsPerPage, totalRows);

                    showingStart.textContent = startIndex;
                    showingEnd.textContent = endIndex;

                    paginationControls.style.display = totalRows > 0 ? 'flex' : 'none';
                    prevPageBtn.style.display = 'flex';
                    nextPageBtn.style.display = 'flex';
                    pageNumbersContainer.style.display = 'flex';

                    // Update button states
                    prevPageBtn.disabled = currentPage === 1;
                    nextPageBtn.disabled = currentPage === totalPages;

                    // Generate page numbers
                    generatePageNumbers(totalPages);
                }

                showingTotal.textContent = totalRows;
            }

            // Generate page numbers
            function generatePageNumbers(totalPages) {
                pageNumbersContainer.innerHTML = '';

                if (totalPages <= 1) return;

                const maxVisiblePages = 5;
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                // Adjust start page if we're near the end
                if (endPage - startPage < maxVisiblePages - 1) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                // First page and ellipsis
                if (startPage > 1) {
                    addPageButton(1);
                    if (startPage > 2) {
                        addEllipsis();
                    }
                }

                // Page numbers
                for (let i = startPage; i <= endPage; i++) {
                    addPageButton(i);
                }

                // Ellipsis and last page
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        addEllipsis();
                    }
                    addPageButton(totalPages);
                }
            }

            // Add page button
            function addPageButton(pageNum) {
                const button = document.createElement('button');
                button.textContent = pageNum;
                button.className = `px-3 py-2 text-sm font-medium border rounded-lg ${
                    pageNum === currentPage 
                        ? 'bg-amber-500 text-white border-amber-500' 
                        : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-50 hover:text-gray-700'
                }`;
                button.addEventListener('click', () => goToPage(pageNum));
                pageNumbersContainer.appendChild(button);
            }

            // Add ellipsis
            function addEllipsis() {
                const span = document.createElement('span');
                span.textContent = '...';
                span.className = 'px-3 py-2 text-sm font-medium text-gray-500';
                pageNumbersContainer.appendChild(span);
            }

            // Go to specific page
            function goToPage(pageNum) {
                currentPage = pageNum;
                updateDisplay();
            }

            // Reset filter function
            function resetFilter() {
                startDateInput.value = '';
                endDateInput.value = '';

                filteredRows = Array.from(rows);
                currentPage = 1;

                // Reset quick filter button styles
                quickFilterBtns.forEach(btn => {
                    btn.classList.remove('bg-amber-500', 'text-white');
                    btn.classList.add('bg-amber-100', 'text-amber-800');
                });

                updateDisplay();
            }

            // Update filter info
            function updateFilterInfo(visibleCount) {
                filterCount.textContent = visibleCount;

                if (startDateInput.value || endDateInput.value) {
                    filterInfo.classList.remove('hidden');
                } else {
                    filterInfo.classList.add('hidden');
                }
            }

            // Show/hide no data message
            function showNoDataMessage(show) {
                let noDataRow = document.getElementById('no-data-row');

                if (show) {
                    if (!noDataRow) {
                        const tbody = document.getElementById('kunjungan-tbody');
                        noDataRow = document.createElement('tr');
                        noDataRow.id = 'no-data-row';
                        noDataRow.className = 'border-b hover:bg-gray-50';
                        noDataRow.innerHTML = `
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-search text-3xl mb-2 text-gray-400"></i>
                                    <p class="text-lg font-medium">Tidak ada data kunjungan</p>
                                    <p class="text-sm">yang sesuai dengan filter tanggal yang dipilih</p>
                                </div>
                            </td>
                        `;
                        tbody.appendChild(noDataRow);
                    }
                    noDataRow.style.display = '';
                } else {
                    if (noDataRow) {
                        noDataRow.style.display = 'none';
                    }
                }
            }

            // Event listeners
            filterBtn.addEventListener('click', filterRows);
            resetBtn.addEventListener('click', resetFilter);

            // Rows per page change
            rowsPerPageSelect.addEventListener('change', function() {
                rowsPerPage = this.value === 'all' ? 'all' : parseInt(this.value);
                currentPage = 1;
                updateDisplay();
            });

            // Pagination navigation
            prevPageBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            });

            nextPageBtn.addEventListener('click', function() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1);
                }
            });

            // Quick filter event listeners
            quickFilterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    const dateRange = getDateRange(filter);

                    if (dateRange) {
                        // Update input values
                        startDateInput.value = dateRange.start;
                        endDateInput.value = dateRange.end;

                        // Update button styles
                        quickFilterBtns.forEach(b => {
                            b.classList.remove('bg-amber-500', 'text-white');
                            b.classList.add('bg-amber-100', 'text-amber-800');
                        });

                        this.classList.remove('bg-amber-100', 'text-amber-800');
                        this.classList.add('bg-amber-500', 'text-white');

                        // Apply filter
                        filterRows();
                    }
                });
            });

            // Auto filter when date inputs change
            startDateInput.addEventListener('change', function() {
                if (startDateInput.value || endDateInput.value) {
                    filterRows();
                } else {
                    resetFilter();
                }
            });

            endDateInput.addEventListener('change', function() {
                if (startDateInput.value || endDateInput.value) {
                    filterRows();
                } else {
                    resetFilter();
                }
            });

            // Validate date range
            startDateInput.addEventListener('change', function() {
                if (endDateInput.value && startDateInput.value > endDateInput.value) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Tanggal mulai tidak boleh lebih besar dari tanggal akhir',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    startDateInput.value = '';
                }
            });

            endDateInput.addEventListener('change', function() {
                if (startDateInput.value && endDateInput.value < startDateInput.value) {
                    Swal.fire({
                        title: 'Peringatan!',
                        text: 'Tanggal akhir tidak boleh lebih kecil dari tanggal mulai',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                    endDateInput.value = '';
                }
            });

            // Initialize
            filteredRows = Array.from(rows);
            updateDisplay();
        });
    </script>
@endpush
