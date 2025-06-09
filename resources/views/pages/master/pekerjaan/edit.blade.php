@extends('layouts.master')
@section('title', 'Edit Data Pekerjaan')
@section('description', 'Edit Data Pekerjaan - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Edit Data Pekerjaan</h1>
            <div class="rounded-lg bg-white p-6 shadow">
                <form action="{{ route('master.pekerjaan.update', $data->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="nama" class="mb-2 block text-sm font-medium text-gray-900">Nama Pekerjaan <span
                                class="text-red-700">*</span></label>
                        <input type="text" id="nama" name="nama"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="Masukkan nama pekerjaan" value="{{ old('nama', $data->nama) }}" required>
                        @error('nama')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end space-x-2">
                        <a href="{{ route('master.pekerjaan') }}"
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
