@extends('layouts.master')
@section('title', 'Master Data Cara Pembayaran')
@section('description', 'Master Data Cara Pembayaran - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Master Data Cara Pembayaran
            </h1>
            <div class="mt-10 flex flex-wrap items-center justify-between pb-4">
                <div class="flex gap-4">
                    <a type="button" href="{{ route('master.cara-pembayaran.create') }}"
                        class="cursor-pointer rounded bg-amber-400 px-3 py-1.5 text-sm font-bold text-white hover:bg-amber-800 focus:ring-2 focus:ring-amber-300">+
                        Tambah Cara Pembayaran</a>
                </div>
            </div>

            <div class="relative overflow-x-auto">
                <table id="search-table"
                    class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700 shadow-md">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th class="px-6 py-3">Nama Cara Pembayaran</th>
                            <th class="px-6 py-3">Dibuat</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="4" class="p-4 text-center">Tidak ada data cara pembayaran</td>
                            </tr>
                        @else
                            @foreach ($data as $index => $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="flex gap-3 px-6 py-4">
                                        <div>
                                            <a href="{{ route('master.cara-pembayaran.edit', $item->id) }}"
                                                class="cursor-pointer rounded bg-blue-500 px-2 py-1 text-xs font-bold text-white hover:bg-blue-700">
                                                Edit
                                            </a>
                                        </div>
                                        <div>
                                            <form action="{{ route('master.cara-pembayaran.destroy', $item->id) }}"
                                                method="POST" class="inline-block"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="cursor-pointer rounded bg-red-500 px-2 py-1 text-xs font-bold text-white hover:bg-red-700">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
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
