@extends('layouts.master')

@section('title', 'Dashboard')

@section('description', 'Dashboard - Rekam Medis')

@section('content')
    <!-- Content -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow">Dashboard</h1>
            <div class="grid grid-cols-1 mb-6 mt-40">
                <div
                    class="flex lg:relative items-center justify-between p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div>
                        <h2 class="text-4xl font-semibold text-gray-800">Hi, Dr. Indah Yuliarini, Sp. THT-KL</h2>
                        <p class="mt-1 text-xl text-gray-500">Ready to start your day?</p>
                    </div>
                    <div class="lg:absolute p-3 right-0 lg:right-0 bottom-0 text-indigo-600 rounded-full">
                        <img src="{{ asset('icon/dokter.png') }}" alt="dokter" class="w-64">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
                <!-- Card 1: Rata-rata Kunjungan -->
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-100 text-blue-600 rounded-full">
                            <!-- Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM9 11V5h2v6H9zm0 2h2v2H9v-2z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Rata-rata Kunjungan</p>
                            <p class="text-xl font-semibold text-gray-800">150/hari</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Jumlah Pasien Baru -->
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-green-100 text-green-600 rounded-full">
                            <!-- Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a6 6 0 016 6v1a6 6 0 01-6 6 6 6 0 01-6-6V8a6 6 0 016-6zm0 14c3.314 0 6-2.686 6-6H4c0 3.314 2.686 6 6 6z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Pasien Baru</p>
                            <p class="text-xl font-semibold text-gray-800">45 orang</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3: Statistik per Bulan -->
                <div
                    class="p-6 bg-white border border-gray-200 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-yellow-100 text-yellow-600 rounded-full">
                            <!-- Icon -->
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M3 3a1 1 0 000 2h1v11a1 1 0 001 1h10a1 1 0 001-1V5h1a1 1 0 100-2H3zm3 4h2v7H6V7zm4 3h2v4h-2v-4z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Kunjungan/Bulan</p>
                            <p class="text-xl font-semibold text-gray-800">1.200 kunjungan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
