@extends('layouts.master')
@section('title', 'Pemeriksaan - Klinik')
@section('description', 'Pemeriksaan - Klinik')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Pemeriksaan Klinis</h1>

            <div class="flex flex-col lg:flex-row gap-4">
                <!-- Left Column - Patient List -->
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

                <!-- Middle Column - Patient Data & Clinical Examination -->
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
                                <!-- Patient Avatar -->
                                <div class="flex-shrink-0 flex flex-col items-center mb-4 md:mb-0 md:mr-6">
                                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center">
                                        <i class="fas fa-user text-5xl text-gray-400"></i>
                                    </div>
                                    <button
                                        class="mt-2 bg-amber-100 hover:bg-amber-200 text-amber-800 px-4 py-1 rounded text-sm cursor-pointer">Lihat
                                        Profile</button>
                                </div>

                                <!-- Patient Details -->
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

                    <!-- Clinical Examination Section -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
                            <h2 class="font-bold text-white">Pemeriksaan Klinis</h2>
                            <div class="flex">
                                <button class="text-gray-600 hover:text-white mx-1">
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Subjective Section -->
                        <div class="p-4">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="grid">
                                    <div class="grid items-center mb-3 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Keluhan utama<span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex w-full">
                                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="grid items-center mb-3 w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Diagnosa<span class="text-red-500">*</span>
                                            </label>
                                            <div class="flex w-full">
                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="grid items-center mb-3 w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                ICD-10<span class="text-red-500">*</span>
                                            </label>
                                            <div class="flex w-full">
                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid lg:grid-cols-3 gap-3 mb-3">
                                        <div class="grid items-center mb-3 w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Denyut Jantung<span class="text-red-500">*</span>
                                            </label>
                                            <div class="flex w-full">
                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="grid items-center mb-3 w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Tekanan Darah<span class="text-red-500">*</span>
                                            </label>
                                            <div class="flex w-full">
                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                        <div class="grid items-center mb-3 w-full">
                                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                                Suhu Tubuh<span class="text-red-500">*</span>
                                            </label>
                                            <div class="flex w-full">
                                                <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                    placeholder="" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Riwayat penyakit <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex">
                                            <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- button --}}
                                <div class="flex justify-end mt-4">
                                    <button type="submit"
                                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Objective Section -->
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-3 border-b">
                                <h3 class="font-semibold">Riwayat Alergi</h3>
                                <button class="text-amber-600 hover:text-amber-800">
                                    <i class="fas fa-circle-check"></i>
                                </button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="grid items-center mb-3 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Obat <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex w-full">
                                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="grid items-center mb-3 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Makanan <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex w-full">
                                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="grid items-center mb-3 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Udara <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex w-full">
                                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="grid items-center mb-3 w-full">
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            lain-lainnya <span class="text-red-500">*</span>
                                        </label>
                                        <div class="flex w-full">
                                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                                placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Riwayat pengobatan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="flex">
                                        <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Riwayat pengobatan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="flex">
                                        <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                                    </div>
                                </div>
                                {{-- button --}}
                                <div class="flex justify-end mt-4">
                                    <button type="submit"
                                        class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                                        Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-10 w-1/3 bg-white rounded-lg shadow">
                <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
                    <h2 class="font-bold text-white">Daftar Histori Pasien</h2>
                    <div class="flex">
                        <button class="text-gray-600 hover:text-white mx-1">
                            <i class="fas fa-expand"></i>
                        </button>
                    </div>
                </div>

                <!-- History Tabs -->
                <div class="border-b flex">
                    <button class="py-2 px-4 font-medium text-gray-700 border-b-2 border-amber-400">Histori
                        Medis</button>
                </div>

                <!-- History List -->
                <div class="overflow-y-auto max-h-96">
                    <div class="p-3 border-b hover:bg-gray-50 cursor-pointer">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <div class="font-medium">dr. YASMITA RAHAJENG, Sp.PD.</div>
                                <div class="text-xs text-gray-600">PENYAKIT DALAM</div>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <div>36 th 8 bl 24 hr</div>
                                <div class="ml-2">19/07/2024 17:00</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 border-b hover:bg-gray-50 cursor-pointer">
                        <div class="flex justify-between">
                            <div class="flex-grow">
                                <div class="font-medium">dr. YASMITA RAHAJENG, Sp.PD.</div>
                                <div class="text-xs text-gray-600">PENYAKIT DALAM</div>
                            </div>
                            <div class="flex items-center text-xs text-gray-500">
                                <div>21 th 8 bl 17 hr</div>
                                <div class="ml-2">15/07/2024 15:45</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- History Pagination -->
                <div class="p-3 text-sm text-gray-600 border-t">
                    <div class="flex justify-between items-center">
                        <div>
                            <span>Hlm 1 dari 1</span>
                            <div>Total 2</div>
                        </div>
                        <div class="flex items-center">
                            <button class="mx-1 text-gray-400 cursor-not-allowed">← Previous</button>
                            <button class="mx-1 text-gray-400 cursor-not-allowed">Next →</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
