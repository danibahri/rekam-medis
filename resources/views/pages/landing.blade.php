@extends('layouts.app')
@section('title', 'Sistem Rekam Medis Digital')
@section('description', 'Sistem Rekam Medis Digital - Aplikasi untuk mengelola data rekam medis pasien di rumah sakit.')
@section('content')
    <div class="m-auto max-w-7xl bg-gradient-to-b from-amber-50 to-white">
        <div class="container mx-auto px-4 py-16">
            <div class="flex flex-col items-center justify-between md:flex-row">
                <div class="mb-8 md:mb-0 md:w-1/2">
                    <h1 class="animate-fade-in-up mb-4 text-4xl font-bold text-gray-800 opacity-0 md:text-6xl">
                        Sistem Rekam Medis
                        <span
                            class="animate-text-gradient bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 bg-clip-text text-amber-300">Digital</span>
                    </h1>
                    <p class="animate-fade-in-up animation-delay-100 mb-6 text-lg text-gray-600 opacity-0">
                        Manajemen data medis terintegrasi untuk pelayanan kesehatan yang lebih baik
                    </p>
                    <a href="{{ route('login') }}"
                        class="animate-fade-in-up animation-delay-200 inline-block transform rounded-lg bg-amber-300 px-8 py-3 font-bold text-white opacity-0 transition-all duration-300 hover:scale-105 hover:bg-amber-400">
                        Masuk ke Sistem
                    </a>
                </div>
                <div class="relative md:w-1/2">
                    <div
                        class="animate-pulse-slow absolute -inset-8 rounded-xl bg-gradient-to-r from-amber-300 to-amber-400 opacity-30 blur-2xl">
                    </div>
                    <img src="{{ asset('icon/icon.png') }}" alt="Medical Record"
                        class="animate-float relative rounded-lg drop-shadow-2xl">
                </div>
            </div>
        </div>

        <!-- Features Section with Staggered Animations -->
        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="animate-slide-in-left mb-12 text-center text-3xl font-bold text-gray-800 opacity-0">
                    Akses Sesuai Peran Anda
                </h2>
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <!-- Admin Card -->
                    <div
                        class="animate-card-pop transform rounded-xl bg-white p-6 opacity-0 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div
                            class="animate-icon-bounce mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-amber-100">
                            👨💻
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Administrator</h3>
                        <p class="text-gray-600">
                            Mengelola sistem secara keseluruhan, manajemen pengguna, dan kontrol akses
                        </p>
                    </div>

                    <!-- Staff Card -->
                    <div
                        class="animate-card-pop animation-delay-100 transform rounded-xl bg-white p-6 opacity-0 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div
                            class="animate-icon-bounce animation-delay-150 mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-amber-100">
                            📋
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Petugas Administrasi</h3>
                        <p class="text-gray-600">
                            Menginput data pasien, mengelola jadwal, dan administrasi rekam medis
                        </p>
                    </div>

                    <!-- Doctor Card -->
                    <div
                        class="animate-card-pop animation-delay-200 transform rounded-xl bg-white p-6 opacity-0 shadow-md transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div
                            class="animate-icon-bounce animation-delay-300 mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-amber-100">
                            👩⚕️
                        </div>
                        <h3 class="mb-2 text-xl font-semibold">Dokter</h3>
                        <p class="text-gray-600">
                            Mengakses riwayat pasien, mencatat diagnosis, dan memberikan resep digital
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated CTA Section -->
        <div class="animate-fade-in-up animation-delay-300 py-16 opacity-0">
            <div class="container mx-auto px-4 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">
                    Siap Menggunakan Sistem?
                </h2>
                <p class="mb-8 text-gray-600">
                    Pilih peran Anda dan mulai kelola rekam medis dengan lebih efisien
                </p>
                <a href="{{ route('login') }}"
                    class="transform rounded-lg bg-amber-300 px-8 py-3 font-bold text-white shadow-lg transition-all duration-300 hover:scale-105 hover:bg-amber-400 hover:shadow-amber-200">
                    Masuk Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes cardPop {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes iconBounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-card-pop {
            animation: cardPop 0.6s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.6s ease-out forwards;
        }

        .animate-icon-bounce {
            animation: iconBounce 1.2s ease-in-out infinite;
        }

        .animate-pulse-slow {
            animation: pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-text-gradient {
            background-size: 300% 300%;
            animation: gradient-shift 8s ease infinite;
        }

        @keyframes gradient-shift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .animation-delay-100 {
            animation-delay: 100ms;
        }

        .animation-delay-150 {
            animation-delay: 150ms;
        }

        .animation-delay-200 {
            animation-delay: 200ms;
        }

        .animation-delay-300 {
            animation-delay: 300ms;
        }
    </style>
@endpush
