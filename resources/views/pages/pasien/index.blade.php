@extends('layouts.master')
@section('title', 'Data Pasien')
@section('description', 'Data Pasien - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Data Pasien</h1>
            <div class="mt-10 flex flex-wrap items-center justify-between pb-4">
                <div class="flex gap-4">
                    @if (Auth::user()->role == 'petugas')
                        <a type="button" href="{{ route('add.pasien') }}"
                            class="cursor-pointer rounded bg-amber-400 px-3 py-1.5 text-sm font-bold text-white hover:bg-amber-800 focus:ring-2 focus:ring-amber-300">+
                            Registrasi
                            Pasien</a>
                    @endif
                </div>
            </div>
            <div class="relative">
                <table id="search-table"
                    class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700 shadow-md">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
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
                                <td colspan="5" class="p-4 text-center">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($data_pasien as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row"
                                        class="flex items-center whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $item->nomor_rekam_medis }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama_lengkap }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tempat_lahir }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->jenisKelamin->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->alamat_lengkap }}
                                    </td>
                                    <td class="flex gap-3 px-6 py-4">
                                        <div>
                                            <a href="{{ route('profile.pasien', $item->id_pasien) }}"
                                                data-tooltip-target="tooltip-{{ $count }}-1"
                                                data-tooltip-style="light"><svg xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor" class="size-6 text-blue-500 lg:size-7">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </a>
                                            <div id="tooltip-{{ $count }}-1" role="tooltip"
                                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                Lihat Profile Pasien
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role != 'admin')
                                            <div>
                                                <a href="{{ route('edit.pasien', $item->id_pasien) }}"
                                                    data-tooltip-target="tooltip-{{ $count }}-1-edit"
                                                    data-tooltip-style="light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6 text-green-500 lg:size-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                    </svg>
                                                </a>
                                                <div id="tooltip-{{ $count }}-1-edit" role="tooltip"
                                                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                    Edit Data Pasien
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                            <div>
                                                <a data-modal-target="modal-{{ $item->id_pasien }}"
                                                    data-modal-toggle="modal-{{ $item->id_pasien }}"
                                                    class="cursor-pointer text-yellow-500"
                                                    data-tooltip-target="tooltip-{{ $count }}-2"
                                                    data-tooltip-style="light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="size-6 lg:size-7">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                                    </svg>
                                                </a>
                                                <div id="tooltip-{{ $count }}-2" role="tooltip"
                                                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                    Tambahkan Pasien ke antrian
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                            <div>
                                                <form action="{{ route('delete.pasien', $item->id_pasien) }}"
                                                    method="POST" class="delete-form inline">
                                                    @csrf
                                                    <button type="button"
                                                        data-tooltip-target="tooltip-{{ $count }}-3"
                                                        data-tooltip-style="light"
                                                        class="btn-delete cursor-pointer font-medium text-red-600 lg:text-lg"
                                                        data-id="{{ $item->id_pasien }}">
                                                        ❌
                                                    </button>
                                                    <div id="tooltip-{{ $count }}-3" role="tooltip"
                                                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 opacity-0">
                                                        Hapus Data Pasien
                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $count++;
                                @endphp
                            @endforeach
                        @endif
                    </tbody>
                </table>

                {{-- modal --}}
                @foreach ($data_pasien as $item)
                    @include('pages.pasien.modal-antrian')
                @endforeach
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                const target = e.target;

                // Periksa apakah yang diklik adalah tombol delete
                if (target && target.classList.contains('btn-delete')) {
                    console.log('Delete button clicked');
                    const form = target.closest('form');

                    if (form) {
                        Swal.fire({
                            title: 'Apakah kamu yakin?',
                            text: "Data Pasien akan dihapus secara permanen.",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, hapus!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    }
                }
            });

            console.log('Delete handler registered with event delegation');
        });
    </script>
@endpush
