@extends('layouts.master')
@section('title', 'Pelepasan Informasi')
@section('description', 'Pelepasan Informasi - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Pelepasan Informasi</h1>
            <div class="relative mt-5 overflow-x-auto">
                <table id="search-table" class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700 shadow-md">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">No. Rekam Medis</th>
                            <th class="px-6 py-3">Nama Pasien</th>
                            <th class="px-6 py-3">Tanggal Kunjungan</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Keluhan</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($pasien->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="p-4 text-center">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($pasien as $item)
                                @php
                                    $kunjungan = App\Models\Kunjungan::where('id_pasien', $item->id_pasien)->first();
                                @endphp
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $item->nomor_rekam_medis ?? '-' }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama_lengkap ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $kunjungan ? $kunjungan->tanggal_kunjungan->format('d F Y') : '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->jenisKelamin->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $kunjungan->keluhan_utama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <a href="{{ route('pelepasan.informasi.pdf', $item->id_pasien) }}"
                                                target="_blank" data-modal-target="modal-{{ $item->id_pasien }}"
                                                data-modal-toggle="modal-{{ $item->id_pasien }}"
                                                class="cursor-pointer text-yellow-500"
                                                data-tooltip-target="tooltip-{{ $count }}-2"
                                                data-tooltip-style="light">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                                                </svg>
                                            </a>
                                            <div id="tooltip-{{ $count }}-2" role="tooltip"
                                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                Cetak surat keterangan sakit
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
