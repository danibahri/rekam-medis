@extends('layouts.master')

@section('title', 'Laporan Kunjungan')

@section('description', 'Laporan Kunjungan - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">Laporan Kunjungan Pasien</h1>
            <a href="{{ route('laporan.export.csv') }}"
                class="bg-amber-300 text-white px-4 py-2 rounded hover:bg-amber-700 mb-4 inline-block">
                Export ke CSV
            </a>
            <div class="relative overflow-x-auto mt-5">
                <table id="search-table" class="w-full text-sm text-left text-gray-700 border-t-4 border-amber-300 shadow-md">
                    <thead class="text-xs text-gray-700 uppercase bg-white border-b-1">
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
                            <th class="px-6 py-3">Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($laporan->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="text-center p-4">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @foreach ($laporan as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row" class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ $item->pasien->nomor_rekam_medis }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->pasien->nama_lengkap }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->pasien->jenis_kelamin == 0)
                                            Tidak Diketahui
                                        @elseif($item->pasien->jenis_kelamin == 1)
                                            Laki-laki
                                        @elseif($item->pasien->jenis_kelamin == 2)
                                            Perempuan
                                        @elseif($item->pasien->jenis_kelamin == 3)
                                            Tidak dapat ditentukan
                                        @elseif($item->pasien->jenis_kelamin == 4)
                                            Tidak mengisi
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->diagnosa }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->kode_icd10 ? $item->kode_icd10 : '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $tindakan = \App\Models\Tindakan::where(
                                                'id_pasien',
                                                $item->pasien->id_pasien,
                                            )->get();
                                        @endphp
                                        @foreach ($tindakan as $t)
                                            {{ $t->nama_tindakan }}
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->kode_icd9 ? $item->kode_icd9 : '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->kunjungan->cara_pembayaran == 1)
                                            Umum/Tunai
                                        @elseif($item->kunjungan->cara_pembayaran == 2)
                                            BPJS Kesehatan
                                        @elseif($item->kunjungan->cara_pembayaran == 3)
                                            JKN
                                        @elseif($item->kunjungan->cara_pembayaran == 4)
                                            Asuransi Lainnya
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->biaya }}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
