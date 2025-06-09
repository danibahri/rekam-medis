@extends('layouts.master')
@section('title', 'Edit Data Obat')
@section('description', 'Edit Data Obat - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Edit Data Obat</h1>
            <div class="rounded-lg bg-white p-6 shadow">
                <form action="{{ route('master.obat.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="nama_obat" class="mb-2 block text-sm font-medium text-gray-900">Nama Obat <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="nama_obat" name="nama_obat"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="Masukkan nama obat" value="{{ old('nama_obat', $data->nama_obat) }}" required>
                            @error('nama_obat')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="bentuk_sediaan" class="mb-2 block text-sm font-medium text-gray-900">Bentuk Sediaan
                                <span class="text-red-700">*</span></label>
                            <input type="text" id="bentuk_sediaan" name="bentuk_sediaan"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="Masukkan bentuk sediaan"
                                value="{{ old('bentuk_sediaan', $data->bentuk_sediaan) }}" required>
                            @error('bentuk_sediaan')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="kekuatan" class="mb-2 block text-sm font-medium text-gray-900">Kekuatan <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="kekuatan" name="kekuatan"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="Masukkan kekuatan" value="{{ old('kekuatan', $data->kekuatan) }}" required>
                            @error('kekuatan')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="satuan" class="mb-2 block text-sm font-medium text-gray-900">Satuan <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="satuan" name="satuan"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="Masukkan satuan" value="{{ old('satuan', $data->satuan) }}" required>
                            @error('satuan')
                                <span class="text-xs text-red-400">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <a href="{{ route('master.obat') }}"
                            class="cursor-pointer rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                            Batal
                        </a>
                        <button type="submit"
                            class="cursor-pointer rounded-lg bg-amber-400 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-600 focus:ring-4 focus:ring-amber-300">
                            Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
