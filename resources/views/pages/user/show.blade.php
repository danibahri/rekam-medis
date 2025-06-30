@extends('layouts.master')

@section('title', 'Detail User')

@section('description', 'Detail User - Rekam Medis')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="rounded bg-white px-3 py-5 text-3xl font-bold text-gray-700 shadow">Detail User</h1>
                <a href="{{ route('show.user') }}"
                    class="rounded-lg bg-gray-500 px-4 py-2 text-white transition-colors hover:bg-gray-600">
                    ← Kembali
                </a>
            </div>

            <div class="rounded-lg bg-white p-6 shadow-md">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Foto User -->
                    <div class="col-span-full mb-6 flex justify-center">
                        @if ($user->foto_path)
                            <img src="{{ Storage::url($user->foto_path) }}" alt="Foto {{ $user->nama }}"
                                class="h-32 w-32 rounded-full border-4 border-gray-200 object-cover">
                        @else
                            <div
                                class="flex h-32 w-32 items-center justify-center rounded-full border-4 border-gray-200 bg-gray-200">
                                <svg class="h-16 w-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Informasi User -->
                    <div class="space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">ID User</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">{{ $user->id }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Username</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">{{ $user->username }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">{{ $user->nama }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Role</label>
                            <span
                                class="{{ $user->role == 'admin'
                                    ? 'bg-red-100 text-red-800'
                                    : ($user->role == 'dokter'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-green-100 text-green-800') }} inline-flex rounded-full px-2 py-1 text-xs font-semibold">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Nomor HP</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">{{ $user->nomor_hp ?? '-' }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Alamat</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">{{ $user->alamat ?? '-' }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Status</label>
                            <span
                                class="{{ $user->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} inline-flex rounded-full px-2 py-1 text-xs font-semibold">
                                {{ $user->status ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Terakhir Login</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">
                                {{ $user->last_login ? $user->last_login->translatedFormat('d F Y H:i') : 'Belum pernah login' }}
                            </p>
                        </div>
                    </div>

                    <div class="col-span-full space-y-4">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Dibuat</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">
                                {{ $user->created_at->translatedFormat('d F Y H:i') }}</p>
                        </div>

                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Terakhir Diupdate</label>
                            <p class="rounded bg-gray-50 p-2 text-gray-900">
                                {{ $user->updated_at->translatedFormat('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-end space-x-3 border-t pt-6">
                    <a href="{{ route('edit.user', $user->id) }}"
                        class="rounded-lg bg-amber-500 px-4 py-2 text-white transition-colors hover:bg-amber-600">
                        <i class="fas fa-edit mr-2"></i>Edit User
                    </a>
                    <form action="{{ route('delete.user', $user->id) }}" method="POST" class="delete-form inline">
                        @csrf
                        <button type="button"
                            class="btn-delete rounded-lg bg-red-500 px-4 py-2 text-white transition-colors hover:bg-red-600"
                            data-id="{{ $user->id }}">
                            <i class="fas fa-trash mr-2"></i>Hapus User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk delete button
            document.addEventListener('click', function(e) {
                const target = e.target;

                if (target && target.classList.contains('btn-delete')) {
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
        });
    </script>
@endpush
