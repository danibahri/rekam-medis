@extends('layouts.master')
@section('title', 'Pemeriksaan Klinis')
@section('description', 'Pemeriksaan Klinis - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Informed Consent</h1>
            <div class="flex flex-col gap-4 lg:flex-row">
                {{-- daftar pasien --}}
                <div class="rounded-lg bg-white shadow lg:w-1/2">
                    <div class="flex items-center justify-between rounded-t-lg bg-amber-400 p-3">
                        <h2 class="font-bold text-white">Daftar Pasien</h2>
                        <div class="flex">
                            <button class="mx-1 text-gray-600 hover:text-white">
                                <i class="fas fa-th-list"></i>
                            </button>
                            <button class="mx-1 text-gray-600 hover:text-white">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Search Section -->
                    <div class="border-b p-3">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-700">Cari Berdasarkan RM/Nama</span>
                            <button class="ml-2 text-gray-600 hover:text-white">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                        <div class="mt-2 flex">
                            <input type="text" class="w-full rounded border p-2" placeholder="Cari...">
                        </div>
                    </div>
                    <!-- Patient List -->
                    <div class="max-h-96 overflow-y-auto">
                        <!-- Patient 1 -->
                        <div class="cursor-pointer border-b bg-amber-100 p-3 hover:bg-amber-50">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">DV - 1</span>
                                <span class="flex items-center rounded bg-amber-400 px-2 text-xs font-semibold">UMUM</span>
                            </div>
                            <div class="mt-1">
                                <div class="font-bold">MOHAMMAD TABRANI</div>
                                <div class="text-xs text-gray-600">000000104 / 26/10/1987 / 36 th 8 bl 24 hr</div>
                                <div class="flex items-center text-xs">
                                    <span>Laki-laki / 19/07/2024 16:35</span>
                                    <span class="ml-1 text-green-600"><i class="fas fa-user-check"></i></span>
                                </div>
                                <div class="text-xs text-gray-600">dr. YASMITA RAHAJENG, Sp.PD.</div>
                            </div>
                        </div>
                        <!-- Patient 2 -->
                        <div class="cursor-pointer border-b p-3 hover:bg-amber-50">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">YR - 1</span>
                                <span class="flex items-center rounded bg-amber-400 px-2 text-xs font-semibold">UMUM</span>
                            </div>
                            <div class="mt-1">
                                <div class="font-bold">KAMSIYAH, NY</div>
                                <div class="text-xs text-gray-600">000000001 / 01/01/1966 / 58 th 6 bl 16 hr</div>
                                <div class="flex items-center text-xs">
                                    <span>Perempuan / 17/07/2024 07:42</span>
                                </div>
                                <div class="text-xs text-gray-600">dr. DONNY VALIANDRA, Sp.PD.</div>
                            </div>
                        </div>
                        <!-- Patient 3 -->
                        <div class="cursor-pointer border-b p-3 hover:bg-amber-50">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">LAB - 1</span>
                                <span class="flex items-center rounded bg-amber-400 px-2 text-xs font-semibold">UMUM</span>
                            </div>
                            <div class="mt-1">
                                <div class="font-bold">EKA RIYANTI PUTRI</div>
                                <div class="text-xs text-green-600"><i class="fas fa-check-circle"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

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
                                        <i class="fas fa-user text-5xl text-gray-400"></i>
                                    </div>
                                    <button
                                        class="mt-2 cursor-pointer rounded bg-amber-100 px-4 py-1 text-sm text-amber-800 hover:bg-amber-200">Lihat
                                        Profile</button>
                                </div>
                                {{-- detail pasien --}}
                                <div class="flex-grow">
                                    <div class="mb-2 text-lg font-bold">MOHAMMAD TABRANI #346</div>
                                    <div class="grid grid-cols-1 gap-2 text-sm md:grid-cols-2">
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">DPJP</div>
                                            <div>: dr. YASMITA </div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Jenis Kelamin</div>
                                            <div>: Laki-Laki</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Spesialis</div>
                                            <div>: PENYAKIT DALAM</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Asuransi</div>
                                            <div>: UMUM / NON KELAS</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Tgl Lahir</div>
                                            <div>: 26/10/1987</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Perusahaan</div>
                                            <div>: UMUM</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Tgl Masuk</div>
                                            <div>: 19/07/2024 16:35</div>
                                        </div>
                                        <div class="flex">
                                            <div class="w-32 text-gray-600">Billing Pasien</div>
                                            <div>: 0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- tab-navigation --}}
                    <div class="rounded-lg border-amber-200 bg-amber-400">
                        <ul class="-mb-px flex flex-wrap text-center text-sm font-medium text-white" id="default-styled-tab"
                            data-tabs-active-classes="text-black" data-tabs-inactive-classes="text-white hover:text-black"
                            data-tabs-toggle="#default-styled-tab-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block cursor-pointer rounded-t-lg border-b-2 border-transparent p-4 text-white"
                                    id="pemeriksaan-tab" data-tabs-target="#pemeriksaan" type="button" role="tab"
                                    aria-controls="pemeriksaan" aria-selected="true">
                                    Pemeriksaan Klinis
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block cursor-pointer rounded-t-lg border-b-2 border-transparent p-4 text-white"
                                    id="informed-tab" data-tabs-target="#informed" type="button" role="tab"
                                    aria-controls="informed" aria-selected="false">
                                    Informed Klinis
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="inline-block cursor-pointer rounded-t-lg border-b-2 border-transparent p-4 text-white"
                                    id="terapi-tab" data-tabs-target="#terapi" type="button" role="tab"
                                    aria-controls="terapi" aria-selected="false">
                                    Formulir Terapi
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content">
                        {{-- formulir pemerikasaan klinis --}}
                        @include('pages.pemeriksaan.pemeriksaan')

                        {{-- formulir informed consent --}}
                        @include('pages.pemeriksaan.informed')

                        {{-- formulir informed consent --}}
                        @include('pages.pemeriksaan.formulir-terapi')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
