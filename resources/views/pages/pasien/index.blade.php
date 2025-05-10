@extends('layouts.master')

@section('title', 'Data Pasien')

@section('description', 'Data Pasien - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Data Pasien</h1>
            <div class="flex items-center justify-between mt-10 flex-wrap pb-4">
                <div class="flex gap-4">
                    <a type="button" href="{{ route('add.pasien') }}"
                        class="text-sm px-3 py-1.5 bg-amber-300 hover:bg-amber-500 focus:ring-amber-300 focus:ring-2 text-white rounded cursor-pointer">+
                        Registrasi
                        Pasien</a>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-700 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownAction"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Promote</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate account</a></li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete
                                User</a>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <label for="table-search-pasien" class="sr-only">Search</label>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-pasien"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-amber-400 focus:border-amber-400"
                        placeholder="Search for pasien...">
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-700 border-t-4 border-amber-300">
                    <thead class="text-xs text-gray-700 uppercase bg-white border-b-1">
                        <tr>
                            {{-- <th class="p-4">
                                <input type="checkbox"
                                    class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-400 focus:ring-2">
                            </th> --}}
                            <th scope="col" class="px-6 py-3">No. Rekam Medis</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Tempat Lahir</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Alamat</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_pasien->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="text-center p-4">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @foreach ($data_pasien as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    {{-- <td class="p-4">
                                    <input type="checkbox"
                                        class="w-4 h-4 text-amber-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-400 focus:ring-2">
                                </td> --}}
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ $item->nomor_rekam_medis }}
                                    </th>
                                    <th class="px-6 py-4">
                                        {{ $item->nama_lengkap }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->tempat_lahir }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->jenis_kelamin == 0)
                                            Tidak Diketahui
                                        @elseif($item->jenis_kelamin == 1)
                                            Laki-laki
                                        @elseif($item->jenis_kelamin == 2)
                                            Perempuan
                                        @elseif($item->jenis_kelamin == 3)
                                            Tidak dapat ditentukan
                                        @elseif($item->jenis_kelamin == 4)
                                            Tidak Mengisi
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->alamat_lengkap }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" class="font-medium text-blue-600 hover:underline">Lihat |</a>
                                        <a href="#" class="font-medium text-amber-600 hover:underline">Edit |</a>
                                        {{-- delete --}}
                                        <form action="{{ route('delete.pasien', $item->id_pasien) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            <button type="submit"
                                                class="font-medium text-red-600 hover:underline cursor-pointer">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
