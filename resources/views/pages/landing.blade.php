@extends('layouts.app')
@section('title', 'Sistem Rekam Medis Digital')

@section('description', 'Sistem Rekam Medis Digital - Aplikasi untuk mengelola data rekam medis pasien di rumah sakit.')

@section('content')
    <div class="max-w-7xl bg-gradient-to-b m-auto from-amber-50 to-white">
        <div class="container mx-auto px-4 py-16">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h1 class="text-4xl md:text-6xl font-bold text-gray-800 mb-4 animate-fade-in-up opacity-0">
                        Sistem Rekam Medis
                        <span
                            class="text-amber-300 animate-text-gradient bg-gradient-to-r from-amber-400 via-amber-500 to-amber-600 bg-clip-text">Digital</span>
                    </h1>
                    <p class="text-lg text-gray-600 mb-6 animate-fade-in-up opacity-0 animation-delay-100">
                        Manajemen data medis terintegrasi untuk pelayanan kesehatan yang lebih baik
                    </p>
                    <a href="{{ route('login') }}"
                        class="inline-block bg-amber-300 hover:bg-amber-400 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 animate-fade-in-up opacity-0 animation-delay-200">
                        Masuk ke Sistem
                    </a>
                </div>
                <div class="md:w-1/2 relative">
                    <div
                        class="absolute -inset-8 bg-gradient-to-r from-amber-300 to-amber-400 rounded-xl blur-2xl opacity-30 animate-pulse-slow">
                    </div>
                    <img src="{{ asset('icon/icon.png') }}" alt="Medical Record"
                        class="rounded-lg drop-shadow-2xl relative animate-float">
                </div>
            </div>
        </div>

        <!-- Features Section with Staggered Animations -->
        <div class="bg-white py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12 animate-slide-in-left opacity-0">
                    Akses Sesuai Peran Anda
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Admin Card -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 animate-card-pop opacity-0">
                        <div
                            class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mb-4 animate-icon-bounce">
                            👨💻
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Administrator</h3>
                        <p class="text-gray-600">
                            Mengelola sistem secara keseluruhan, manajemen pengguna, dan kontrol akses
                        </p>
                    </div>

                    <!-- Staff Card -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 animate-card-pop opacity-0 animation-delay-100">
                        <div
                            class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mb-4 animate-icon-bounce animation-delay-150">
                            📋
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Petugas Administrasi</h3>
                        <p class="text-gray-600">
                            Menginput data pasien, mengelola jadwal, dan administrasi rekam medis
                        </p>
                    </div>

                    <!-- Doctor Card -->
                    <div
                        class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-2 animate-card-pop opacity-0 animation-delay-200">
                        <div
                            class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center mb-4 animate-icon-bounce animation-delay-300">
                            👩⚕️
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Dokter</h3>
                        <p class="text-gray-600">
                            Mengakses riwayat pasien, mencatat diagnosis, dan memberikan resep digital
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated CTA Section -->
        <div class="py-16 animate-fade-in-up opacity-0 animation-delay-300">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">
                    Siap Menggunakan Sistem?
                </h2>
                <p class="text-gray-600 mb-8">
                    Pilih peran Anda dan mulai kelola rekam medis dengan lebih efisien
                </p>
                <a href="{{ route('login') }}"
                    class="bg-amber-300 hover:bg-amber-400 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-amber-200">
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

        /* Animation Classes */
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
