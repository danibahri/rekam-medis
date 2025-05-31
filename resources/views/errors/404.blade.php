@extends('layouts.master')
@section('title', 'Data Pasien')
@section('description', 'Data Pasien - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <section class="bg-white">
                <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
                    <div class="mx-auto max-w-screen-sm text-center">
                        <h1 class="text-primary-600 mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl">
                            404</h1>
                        <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 md:text-4xl">
                            Halaman Tidak Tersedia</p>
                        <p class="mb-4 text-lg font-light text-gray-500">Upsss... Halaman yang anda cari tidak tersedia</p>
                        <a href="{{ route('dashboard') }}"
                            class="hover:bg-primary-800 focus:ring-primary-300 my-4 inline-flex rounded-lg bg-blue-500 px-5 py-2.5 text-center text-sm font-medium text-white focus:outline-none focus:ring-4">Kembali
                            ke dashboard</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
