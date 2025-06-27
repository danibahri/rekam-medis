@extends('layouts.master')
@section('title', 'Laporan Kunjungan')
@section('description', 'Laporan Kunjungan - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Laporan Kunjungan Pasien
            </h1>
            <div id="toast-warning" class="mt-5 flex w-full items-center rounded-lg bg-white p-4 text-gray-700 shadow-sm"
                role="alert">
                <div
                    class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-orange-100 text-orange-500">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z" />
                    </svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Laporan hanya menampilkan data kunjungan terakhir untuk setiap
                    pasien!</div>
                <button type="button"
                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300"
                    data-dismiss-target="#toast-warning" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>

            {{-- Filter Form --}}
            <div class="mb-6 p-4">
                <form method="GET" action="{{ route('laporan.kunjungan') }}" class="flex flex-wrap items-end gap-4"
                    id="filterForm">
                    <div class="min-w-[200px] flex-1">
                        <label for="tanggal_mulai" class="mb-2 block text-sm font-medium text-gray-700">Tanggal Mulai
                        </label>
                        <input type="date" id="tanggal_mulai" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
                            class="block w-full rounded border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                        <p id="error-tanggal-mulai" class="mt-1 hidden text-sm text-red-600">Tanggal mulai tidak boleh
                            melebihi tanggal selesai</p>
                    </div>
                    <div class="min-w-[200px] flex-1">
                        <label for="tanggal_selesai" class="mb-2 block text-sm font-medium text-gray-700">Tanggal Selesai
                        </label>
                        <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                            value="{{ request('tanggal_selesai') }}"
                            class="block w-full rounded border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500">
                        <p id="error-tanggal-selesai" class="mt-1 hidden text-sm text-red-600">Tanggal selesai tidak boleh
                            kurang dari tanggal mulai</p>
                    </div>
                    <div class="flex gap-2">
                        <button type="submit" id="filterButton"
                            class="rounded bg-blue-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                            Filter
                        </button>
                        <a href="{{ route('laporan.kunjungan') }}"
                            class="rounded border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            @if (Auth::user()->role != 'admin')
                <form method="GET" action="{{ route('laporan.export.csv') }}" class="mb-4" id="exportForm">
                    <input type="hidden" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}"
                        id="export-tanggal-mulai">
                    <input type="hidden" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}"
                        id="export-tanggal-selesai">
                    <button type="submit" id="exportButton"
                        class="inline-block rounded bg-amber-400 px-4 py-2 text-sm text-white hover:bg-amber-700">
                        Export ke CSV
                    </button>
                </form>
            @endif

            <div class="relative mt-5 overflow-x-auto">
                <table id="search-table"
                    class="w-full border-t-4 border-amber-300 text-left text-sm text-gray-700 shadow-md">
                    <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">No. Rekam Medis</th>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Tanggal Kunjungan</th>
                            <th class="px-6 py-3">Jenis Kelamin</th>
                            <th class="px-6 py-3">Diagnosa</th>
                            <th class="px-6 py-3">Kode ICD10</th>
                            <th class="px-6 py-3">Kode ICD9</th>
                            <th class="px-6 py-3">Jenis Pembayaran</th>
                            <th class="px-6 py-3">Total Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kunjungan->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="9" class="p-4 text-center">Tidak ada data kunjungan</td>
                            </tr>
                        @else
                            @foreach ($kunjungan as $item)
                                <tr class="bg-white hover:bg-gray-100">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $item->pasien->nomor_rekam_medis ?? '-' }}
                                    </th>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $item->pasien->nama_lengkap ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kunjungan ?? '-')->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pasien->jenisKelamin->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->assessment->diagnosa ?? '-' }}
                                    </td>
                                    <td class="w-20 max-w-[20ch] truncate px-6 py-4">
                                        {{ $item->assessment->kode_icd10 ?? '-' }}
                                    </td>
                                    <td class="max-w-[20ch] truncate px-6 py-4">
                                        {{ $item->tindakan->kode_icd9 ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pembayaran->caraPembayaran->nama ?? '-' }}
                                    </td>
                                    {{-- total kunjungan --}}
                                    <td class="px-6 py-4">
                                        @if (isset($kunjunganCounts))
                                            {{ $kunjunganCounts[$item->id_pasien] ?? 1 }}
                                        @else
                                            {{ $item->total_kunjungan ?? 1 }}
                                        @endif
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalMulai = document.getElementById('tanggal_mulai');
        const tanggalSelesai = document.getElementById('tanggal_selesai');
        const errorMulai = document.getElementById('error-tanggal-mulai');
        const errorSelesai = document.getElementById('error-tanggal-selesai');
        const filterButton = document.getElementById('filterButton');
        const exportButton = document.getElementById('exportButton');
        const filterForm = document.getElementById('filterForm');
        const exportForm = document.getElementById('exportForm');

        function validateDates() {
            const startDate = tanggalMulai.value;
            const endDate = tanggalSelesai.value;
            let isValid = true;

            // Reset error states
            errorMulai.classList.add('hidden');
            errorSelesai.classList.add('hidden');
            tanggalMulai.classList.remove('border-red-500');
            tanggalSelesai.classList.remove('border-red-500');

            if (startDate && endDate && startDate > endDate) {
                errorMulai.classList.remove('hidden');
                errorSelesai.classList.remove('hidden');
                tanggalMulai.classList.add('border-red-500');
                tanggalSelesai.classList.add('border-red-500');
                isValid = false;
            }

            // Enable/disable buttons based on validation
            filterButton.disabled = !isValid;
            exportButton.disabled = !isValid;

            if (!isValid) {
                filterButton.classList.add('opacity-50', 'cursor-not-allowed');
                exportButton.classList.add('opacity-50', 'cursor-not-allowed');
            } else {
                filterButton.classList.remove('opacity-50', 'cursor-not-allowed');
                exportButton.classList.remove('opacity-50', 'cursor-not-allowed');
                // Update export form hidden inputs
                document.getElementById('export-tanggal-mulai').value = startDate;
                document.getElementById('export-tanggal-selesai').value = endDate;
            }

            return isValid;
        }

        // Add event listeners
        tanggalMulai.addEventListener('change', validateDates);
        tanggalSelesai.addEventListener('change', validateDates);

        // Prevent form submission if validation fails
        filterForm.addEventListener('submit', function(e) {
            if (!validateDates()) {
                e.preventDefault();
            }
        });

        exportForm.addEventListener('submit', function(e) {
            if (!validateDates()) {
                e.preventDefault();
            }
        });

        // Initial validation
        validateDates();
    });
</script>
