@extends('layouts.master')

@section('title', 'Informed Consent')

@section('description', 'Informed Consent')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Informed Consent</h1>
            <div class="flex flex-col lg:flex-row gap-4">
                {{-- daftar pasien --}}
                <div class="lg:w-1/2 bg-white rounded-lg shadow">
                    <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
                        <h2 class="font-bold text-white">Daftar Pasien</h2>
                        <div class="flex">
                            <button class="text-gray-600 hover:text-white mx-1">
                                <i class="fas fa-th-list"></i>
                            </button>
                            <button class="text-gray-600 hover:text-white mx-1">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Search Section -->
                    <div class="p-3 border-b">
                        <div class="flex items-center">
                            <span class="text-sm text-gray-700">Cari Berdasarkan RM/Nama</span>
                            <button class="ml-2 text-gray-600 hover:text-white">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                        <div class="flex mt-2">
                            <input type="text" class="w-full p-2 border rounded" placeholder="Cari...">
                        </div>
                    </div>
                    <!-- Patient List -->
                    <div class="overflow-y-auto max-h-96">
                        <!-- Patient 1 -->
                        <div class="p-3 border-b bg-amber-100 hover:bg-amber-50 cursor-pointer">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">DV - 1</span>
                                <span class="bg-amber-300 px-2 rounded text-xs font-semibold flex items-center">UMUM</span>
                            </div>
                            <div class="mt-1">
                                <div class="font-bold">MOHAMMAD TABRANI</div>
                                <div class="text-xs text-gray-600">000000104 / 26/10/1987 / 36 th 8 bl 24 hr</div>
                                <div class="text-xs flex items-center">
                                    <span>Laki-laki / 19/07/2024 16:35</span>
                                    <span class="ml-1 text-green-600"><i class="fas fa-user-check"></i></span>
                                </div>
                                <div class="text-xs text-gray-600">dr. YASMITA RAHAJENG, Sp.PD.</div>
                            </div>
                        </div>
                        <!-- Patient 2 -->
                        <div class="p-3 border-b hover:bg-amber-50 cursor-pointer">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">YR - 1</span>
                                <span class="bg-amber-300 px-2 rounded text-xs font-semibold flex items-center">UMUM</span>
                            </div>
                            <div class="mt-1">
                                <div class="font-bold">KAMSIYAH, NY</div>
                                <div class="text-xs text-gray-600">000000001 / 01/01/1966 / 58 th 6 bl 16 hr</div>
                                <div class="text-xs flex items-center">
                                    <span>Perempuan / 17/07/2024 07:42</span>
                                </div>
                                <div class="text-xs text-gray-600">dr. DONNY VALIANDRA, Sp.PD.</div>
                            </div>
                        </div>
                        <!-- Patient 3 -->
                        <div class="p-3 border-b hover:bg-amber-50 cursor-pointer">
                            <div class="flex justify-between">
                                <span class="font-bold text-amber-800">LAB - 1</span>
                                <span class="bg-amber-300 px-2 rounded text-xs font-semibold flex items-center">UMUM</span>
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
                    <div class="bg-white rounded-lg shadow">
                        <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
                            <h2 class="font-bold text-white">Data Diri Pasien</h2>
                            <div class="flex">
                                <button class="text-gray-600 hover:text-white mx-1">
                                    <i class="fas fa-expand"></i>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex flex-col md:flex-row">
                                {{-- foto pasien --}}
                                <div class="flex-shrink-0 flex flex-col items-center mb-4 md:mb-0 md:mr-6">
                                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-5xl text-gray-400"></i>
                                    </div>
                                    <button
                                        class="mt-2 bg-amber-100 hover:bg-amber-200 text-amber-800 px-4 py-1 rounded text-sm cursor-pointer">Lihat
                                        Profile</button>
                                </div>
                                {{-- detail pasien --}}
                                <div class="flex-grow">
                                    <div class="text-lg font-bold mb-2">MOHAMMAD TABRANI #346</div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
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
                    <div class="border-amber-200 bg-amber-300 rounded-lg">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-white" id="default-tab"
                            data-tabs-toggle="#default-tab-content" role="tablist">
                            <li class="me-2" role="presentation">
                                <button
                                    class="text-white cursor-pointer inline-block p-4 border-b-2 rounded-t-lg border-transparent"
                                    style="color: white !important;" id="informed-tab" data-tabs-target="#informed"
                                    type="button" role="tab" aria-controls="informed" aria-selected="true">
                                    Informed Klinis
                                </button>
                            </li>
                            <li class="me-2" role="presentation">
                                <button
                                    class="text-white cursor-pointer inline-block p-4 border-b-2 rounded-t-lg border-transparent"
                                    style="color: white !important;" id="terapi-tab" data-tabs-target="#terapi"
                                    type="button" role="tab" aria-controls="terapi" aria-selected="false">
                                    Formulir Terapi
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div id="default-tab-content">
                        {{-- formulir informed consent --}}
                        @include('pages.informed.informed')

                        {{-- formulir informed consent --}}
                        @include('pages.informed.formulir-terapi')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
