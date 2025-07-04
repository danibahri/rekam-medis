@extends('layouts.master')
@section('title', 'Pemeriksaan Klinis')
@section('description', 'Pemeriksaan Klinis - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Pemeriksaan Klinis</h1>
            <div class="flex flex-col gap-4 lg:flex-row">
                {{-- daftar pasien --}}
                @include('pages.pemeriksaan.daftar-pasien')

                {{-- data diri pasien --}}
                <div class="w-full space-y-4">
                    <div class="rounded-lg bg-white shadow">
                        <div class="flex items-center justify-between rounded-t-lg bg-amber-400 p-3">
                            <h2 class="font-bold text-white">Data Diri Pasien</h2>
                            <div class="flex">
                                <button class="mx-1 text-gray-600 hover:text-white">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex flex-col md:flex-row">
                                {{-- foto pasien --}}
                                <div class="mb-4 flex flex-shrink-0 flex-col items-center md:mb-0 md:mr-6">
                                    <div class="flex h-24 w-24 items-center justify-center rounded-full bg-gray-200">
                                        @if (!empty($kunjungan->pasien->foto_pasien_path))
                                            <img src="{{ asset($kunjungan->pasien->foto_url) }}" alt="Foto Pasien"
                                                class="h-full w-full rounded-full object-cover">
                                        @else
                                            <div
                                                class="flex h-full w-full items-center justify-center rounded-full bg-amber-100">
                                                <span class="text-5xl font-semibold text-amber-700">
                                                    {{ strtoupper(substr($kunjungan->pasien->nama_lengkap ?? 'o', 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    @if (!empty($kunjungan))
                                        <a href="{{ route('profile.pasien', $kunjungan->pasien->id_pasien ?? '-') }}"
                                            class="mt-2 cursor-pointer rounded bg-amber-100 px-4 py-1 text-sm text-amber-800 hover:bg-amber-200">Lihat
                                            Profile</a>
                                    @endif
                                </div>
                                {{-- detail pasien --}}
                                <div class="flex-grow">
                                    <div class="mb-2 text-lg font-bold">{{ $kunjungan->pasien->nama_lengkap ?? '-' }}</div>
                                    <div class="grid grid-cols-1 gap-2 text-sm md:grid-cols-2">
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Jenis Kelamin</div>
                                            <div>: {{ $kunjungan->pasien->jenisKelamin->nama ?? '-' }}</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Jenis Pembayaran</div>
                                            <div>: {{ $kunjungan->pembayaran->caraPembayaran->nama ?? '-' }}</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Tgl Lahir</div>
                                            <div>:
                                                {{ \Carbon\Carbon::parse($kunjungan->pasien->tanggal_lahir ?? '00/00/0000')->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Billing Pasien</div>
                                            {{-- format Rp --}}
                                            <div>: Rp. {{ number_format($kunjungan->pembayaran->jumlah ?? 0, 0, ',', '.') }}
                                            </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Tgl Kunjungan</div>
                                            <div>:
                                                {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan ?? '00/00/0000')->format('d/m/Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse($kunjungan->waktu_kunjungan ?? '00:00')->format('H:i') }}
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="grid grid-cols-1 gap-2 text-sm md:grid-cols-2">
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">DPJP</div>
                                            <div>: {{ $kunjungan->dokter->nama_dokter ?? '-' }} </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Spesialis</div>
                                            <div>: {{ $kunjungan->dokter->spesialisasi ?? '-' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $activeTab = session('active_tab') ?? old('active_tab');
                    @endphp

                    @if (!empty($kunjungan))
                        {{-- tab navigation --}}
                        <div class="rounded-t-lg border-amber-200 bg-amber-400">
                            <ul class="flex flex-wrap text-center text-sm font-medium text-white" id="default-styled-tab"
                                data-tabs-active-classes="text-white bg-amber-600"
                                data-tabs-inactive-classes="text-white hover:bg-amber-600"
                                data-tabs-toggle="#default-styled-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block cursor-pointer rounded-t-lg border-transparent p-4 text-white"
                                        id="pemeriksaan-tab" data-tabs-target="#pemeriksaan" type="button" role="tab"
                                        aria-controls="pemeriksaan"
                                        aria-selected="{{ $activeTab == 'pemeriksaan' ? 'true' : 'false' }}">
                                        Pemeriksaan Klinis
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block cursor-pointer rounded-t-lg border-transparent p-4 text-white"
                                        id="informed-tab" data-tabs-target="#informed" type="button" role="tab"
                                        aria-controls="informed"
                                        aria-selected="{{ $activeTab == 'informed' ? 'true' : 'false' }}">
                                        Informed Klinis
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block cursor-pointer rounded-t-lg border-transparent p-4 text-white"
                                        id="terapi-tab" data-tabs-target="#terapi" type="button" role="tab"
                                        aria-controls="terapi"
                                        aria-selected="{{ $activeTab == 'terapi' ? 'true' : 'false' }}">
                                        Formulir Terapi
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block cursor-pointer rounded-t-lg border-transparent p-4 text-white"
                                        id="resep-tab" data-tabs-target="#resep" type="button" role="tab"
                                        aria-controls="resep"
                                        aria-selected="{{ $activeTab == 'resep' ? 'true' : 'false' }}">
                                        Resep Obat
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="inline-block cursor-pointer rounded-t-lg border-transparent p-4 text-white"
                                        id="pembayaran-tab" data-tabs-target="#pembayaran" type="button" role="tab"
                                        aria-controls="pembayaran"
                                        aria-selected="{{ $activeTab == 'pembayaran' ? 'true' : 'false' }}">
                                        Pembayaran Pasien
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content" class="-translate-y-5 transform">
                            {{-- formulir pemerikasaan klinis --}}
                            @include('pages.pemeriksaan.pemeriksaan')

                            {{-- formulir informed consent --}}
                            @include('pages.pemeriksaan.informed')

                            {{-- formulir informed consent --}}
                            @include('pages.pemeriksaan.formulir-terapi')

                            {{-- formulir resep obat --}}
                            @include('pages.pemeriksaan.resep')

                            {{-- formulir pembayaran --}}
                            @include('pages.pemeriksaan.pembayaran')
                        </div>
                    @else
                        <div class="text-center font-semibold text-gray-700">
                            Tidak ada pasien yang dipilih
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Pastikan script berjalan setelah semua elemen HTML dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen input pencarian
            const searchInput = document.getElementById('searchInput');

            // Ambil semua item pasien
            const patientItems = document.querySelectorAll('.patient-item');

            // Ambil elemen pesan "tidak ditemukan"
            const noResultsMessage = document.getElementById('noResultsMessage');

            // Tambahkan event listener yang akan aktif setiap kali user mengetik
            searchInput.addEventListener('input', function() {
                // Ambil teks yang diketik user, ubah ke huruf kecil dan hapus spasi di awal/akhir
                const searchTerm = searchInput.value.toLowerCase().trim();

                let visibleCount = 0;

                // Loop melalui setiap item pasien
                patientItems.forEach(function(item) {
                    // Ambil teks dari nama pasien dan nomor RM, ubah ke huruf kecil
                    const patientName = item.querySelector('.patient-name').textContent
                        .toLowerCase();
                    const patientRM = item.querySelector('.patient-rm').textContent.toLowerCase();

                    // Cek apakah nama atau RM mengandung teks yang dicari
                    if (patientName.includes(searchTerm) || patientRM.includes(searchTerm)) {
                        // Jika cocok, tampilkan item
                        item.style.display = 'block';
                        visibleCount++;
                    } else {
                        // Jika tidak cocok, sembunyikan item
                        item.style.display = 'none';
                    }
                });

                // Tampilkan atau sembunyikan pesan "tidak ditemukan"
                if (visibleCount === 0 && searchTerm !== '') {
                    noResultsMessage.style.display = 'block';
                } else {
                    noResultsMessage.style.display = 'none';
                }
            });
        });
    </script>
@endpush
