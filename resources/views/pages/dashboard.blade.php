@extends('layouts.master')
@section('title', 'Dashboard')
@section('description', 'Dashboard - Rekam Medis')
@section('content')
    <!-- Content -->
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Dashboard -
                {{ Auth::user()->username }}</h1>
            <div class="mb-6 grid grid-cols-1 lg:mt-40">
                <div
                    class="flex items-center justify-between rounded-lg border border-gray-200 bg-white p-6 shadow transition-shadow duration-300 hover:shadow-md lg:relative">
                    <div>
                        <h2 class="text-4xl font-semibold text-gray-800">Hi, Dr. Indah Yuliarini, Sp. THT-KL</h2>
                        <p class="mt-1 text-xl text-gray-500">Ready to start your day?</p>
                    </div>
                    <div class="bottom-0 right-0 rounded-full p-3 text-indigo-600 lg:absolute lg:right-0">
                        <img src="{{ asset('icon/dokter.png') }}" alt="dokter" class="w-64">
                    </div>
                </div>
            </div>

            <div class="mb-6 grid grid-cols-1 gap-6 sm:grid-cols-3">
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow transition-shadow duration-300 hover:shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="rounded-full bg-blue-100 p-3 text-blue-600">
                            <!-- Icon -->
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 11V5h2v6H9zm0 2h2v2H9v-2z" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm text-gray-500">Rata-rata Kunjungan</p>
                            <p class="text-xl font-semibold text-gray-800">{{ $rata_rata_kunjungan_per_hari }} /Hari</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Jumlah Pasien Baru -->
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow transition-shadow duration-300 hover:shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="rounded-full bg-green-100 p-3 text-green-600">
                            <!-- Icon -->
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a6 6 0 016 6v1a6 6 0 01-6 6 6 6 0 01-6-6V8a6 6 0 016-6zm0 14c3.314 0 6-2.686 6-6H4c0 3.314 2.686 6 6 6z" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm text-gray-500">Pasien Baru</p>
                            <p class="text-xl font-semibold text-gray-800">{{ $pasien_baru }} orang</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Statistik per Bulan -->
                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow transition-shadow duration-300 hover:shadow-md">
                    <div class="flex items-center space-x-4">
                        <div class="rounded-full bg-yellow-100 p-3 text-yellow-600">
                            <!-- Icon -->
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 3a1 1 0 000 2h1v11a1 1 0 001 1h10a1 1 0 001-1V5h1a1 1 0 100-2H3zm3 4h2v7H6V7zm4 3h2v4h-2v-4z" />
                            </svg>
                        </div>
                        <div class="overflow-hidden">
                            <p class="text-sm text-gray-500">Total Kunjungan/Bulan</p>
                            <p class="text-xl font-semibold text-gray-800">{{ $total_kunjungan_per_bulan }} kunjungan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
