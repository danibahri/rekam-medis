@extends('layouts.master')

@section('title', 'User')

@section('description', 'User - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Data User</h1>
            <div class="mt-10 flex flex-wrap items-center justify-between pb-4">
                <div class="flex gap-4">
                    <a type="button" href="{{ route('add.user') }}"
                        class="cursor-pointer rounded bg-amber-300 px-3 py-1.5 text-sm text-white hover:bg-amber-500 focus:ring-2 focus:ring-amber-300">+
                        Tambah User </a>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <table id="search-table" class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">No. Hp</th>
                            <th class="px-6 py-3">Alamat</th>
                            <th class="px-6 py-3">Role</th>
                            <th class="px-6 py-3">Dibuat</th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data_user->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="p-4 text-center">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @foreach ($data_user as $user)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th class="flex items-center whitespace-nowrap px-6 py-4">
                                        {{ $user->nama }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $user->nomor_hp }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->alamat }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->role }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $user->created_at->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('detail.user', $user->id) }}"
                                            class="font-medium text-blue-600 hover:underline">Lihat |</a>
                                        <a href="{{ route('edit.user', $user->id) }}"
                                            class="font-medium text-amber-600 hover:underline">Edit |</a>
                                        <form action="{{ route('delete.user', $user->id) }}" method="POST"
                                            class="delete-form inline">
                                            @csrf
                                            <button type="button"
                                                class="btn-delete cursor-pointer font-medium text-red-600 hover:underline"
                                                data-id="{{ $user->id }}">Delete</button>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendaftarkan event listener untuk delete buttons dengan delegasi event
            document.addEventListener('click', function(e) {
                const target = e.target;

                // Periksa apakah yang diklik adalah tombol delete
                if (target && target.classList.contains('btn-delete')) {
                    console.log('Delete button clicked');
                    const form = target.closest('form');

                    if (form) {
                        Swal.fire({
                            title: 'Apakah kamu yakin?',
                            text: "Data User akan dihapus secara permanen.",
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

            // Log untuk debugging
            console.log('Delete handler registered with event delegation');
        });
    </script>
@endpush
