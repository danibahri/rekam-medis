@extends('layouts.master')
@section('title', 'Laporan Kunjungan')
@section('description', 'Laporan Kunjungan - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Laporan Kunjungan Pasien</h1>
            <a href="{{ route('laporan.export.csv') }}"
                class="mb-4 inline-block rounded bg-amber-400 px-4 py-2 text-sm text-white hover:bg-amber-700">
                Export ke CSV
            </a>
            <div class="relative mt-5 overflow-x-auto">
                <table id="search-table" class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700 shadow-md">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">No. Rekam Medis</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Tanggal Kunjungan</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Diagnosa</th>
                            <th class="px-6 py-3">Kode ICD10</th>
                            <th class="px-6 py-3">Tindakan</th>
                            <th class="px-6 py-3">Kode ICD9</th>
                            <th class="px-6 py-3">Jenis Pembayaran</th>
                            <th class="px-6 py-3">Total Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kunjungan->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="p-4 text-center">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @foreach ($kunjungan as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $item->pasien->nomor_rekam_medis ?? '-' }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->pasien->nama_lengkap ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kunjungan ?? '-')->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pasien->jenisKelamin->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->carapembayaran->nama ?? '-' }}
                                    </td>
                                    {{-- total kunjungan --}}
                                    <td class="px-6 py-4">
                                        {{ $item->total_kunjungan ?? '-' }}
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
