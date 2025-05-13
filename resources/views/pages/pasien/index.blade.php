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
                </div>
            </div>

            <div class="relative overflow-x-auto">
                <table id="search-table"
                    class="w-full text-sm text-left text-gray-700 border-t-4 border-amber-300 shadow-md">
                    <thead class="text-xs text-gray-700 uppercase bg-white border-b-1">
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
                                <td colspan="5" class="text-center p-4">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @foreach ($data_pasien as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row"
                                        class="flex items-center px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        {{ $item->nomor_rekam_medis }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->nama_lengkap }}
                                    </td>
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
                                        <a href="#" class="font-medium text-amber-600 hover:underline">Edit |</a>
                                        <form action="{{ route('delete.pasien', $item->id_pasien) }}" method="POST"
                                            class="inline delete-form">
                                            @csrf
                                            <button type="button"
                                                class="font-medium text-red-600 hover:underline cursor-pointer btn-delete"
                                                data-id="{{ $item->id_pasien }}">Delete |</button>
                                        </form>
                                        <a href="{{ route('show.general', $item->id_pasien) }}"
                                            class="font-medium text-blue-600 hover:underline">General-Consent
                                        </a>
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
