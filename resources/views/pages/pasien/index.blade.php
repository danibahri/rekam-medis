@extends('layouts.master')
@section('title', 'Data Pasien')
@section('description', 'Data Pasien - Rekam Medis')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg border-2 border-dashed border-gray-200 p-4">
            <h1 class="mb-4 rounded bg-white py-5 pl-3 text-3xl font-bold text-gray-700 shadow">Data Pasien</h1>
            {{-- Add Patient Button --}}
            @if (Auth::user()->role == 'petugas')
                <a type="button" href="{{ route('add.pasien') }}"
                    class="cursor-pointer rounded bg-amber-400 px-4 py-2.5 text-sm font-bold text-white transition-colors hover:bg-amber-600 focus:ring-2 focus:ring-amber-300">
                    <i class="fas fa-plus mr-2"></i>Registrasi Pasien
                </a>
            @endif
            {{-- Search and Controls Section --}}
            <div class="mb-6 mt-5 rounded-lg border border-amber-200 bg-amber-50 p-4">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    {{-- Search Box --}}
                    <div class="max-w-md flex-1">
                        <label for="search_input" class="mb-2 block text-sm font-medium text-gray-700">
                            <i class="fas fa-search mr-2"></i>Cari Pasien
                        </label>
                        <input type="text" id="search_input"
                            placeholder="Cari berdasarkan nama, rekam medis, atau alamat..."
                            class="w-full rounded-lg border border-gray-300 p-2.5 focus:border-amber-500 focus:ring-amber-500">
                    </div>

                    {{-- Rows per page --}}
                    <div class="flex items-center gap-2">
                        <label for="rows_per_page" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                        <select id="rows_per_page"
                            class="rounded border border-gray-300 px-3 py-2 text-sm focus:border-amber-500 focus:ring-amber-500">
                            <option value="5">5</option>
                            <option value="10" selected>10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="all">Semua</option>
                        </select>
                        <span class="text-sm text-gray-700">data per halaman</span>
                    </div>
                </div>

                {{-- Search Results Info --}}
                <div id="search_info" class="mt-3 hidden text-sm text-gray-600">
                    <i class="fas fa-info-circle mr-1"></i>
                    Menampilkan <span id="search_count">0</span> dari <span
                        id="total_count">{{ $data_pasien->count() }}</span> pasien
                </div>
            </div>
            <div class="relative">
                <table id="pasien_table"
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
                    <tbody id="pasien_tbody">
                        @if ($data_pasien->isEmpty())
                            <tr class="bg-white hover:bg-gray-100">
                                <td colspan="5" class="p-4 text-center">Tidak ada data pasien</td>
                            </tr>
                        @else
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($data_pasien as $item)
                                <tr class="pasien-row bg-white hover:bg-gray-100"
                                    data-nama="{{ strtolower($item->nama_lengkap) }}"
                                    data-rekam-medis="{{ strtolower($item->nomor_rekam_medis) }}"
                                    data-tempat-lahir="{{ strtolower($item->tempat_lahir ?? '') }}"
                                    data-alamat="{{ strtolower($item->alamat_lengkap ?? '') }}">
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
                                                <a data-modal-target="modal-{{ $item->nomor_rekam_medis }}"
                                                    data-modal-toggle="modal-{{ $item->nomor_rekam_medis }}"
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

                {{-- Pagination Controls --}}
                <div id="pagination_controls"
                    class="mt-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div class="text-sm text-gray-700">
                        Menampilkan <span id="showing_start">1</span> - <span id="showing_end">10</span> dari <span
                            id="showing_total">{{ $data_pasien->count() }}</span> pasien
                    </div>

                    <div class="flex items-center gap-2">
                        <button id="prev_page"
                            class="flex items-center rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                            <svg class="mr-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            Previous
                        </button>

                        <div id="page_numbers" class="flex gap-1">
                            <!-- Page numbers will be generated by JavaScript -->
                        </div>

                        <button id="next_page"
                            class="flex items-center rounded-lg border border-gray-300 px-3 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-700 disabled:cursor-not-allowed disabled:opacity-50">
                            Next
                            <svg class="ml-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- modal --}}
                @include('pages.pasien.modal-antrian')
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const searchInput = document.getElementById('search_input');
            const rowsPerPageSelect = document.getElementById('rows_per_page');
            const rows = document.querySelectorAll('.pasien-row');
            const searchInfo = document.getElementById('search_info');
            const searchCount = document.getElementById('search_count');
            const totalCount = document.getElementById('total_count');

            // Pagination elements
            const prevPageBtn = document.getElementById('prev_page');
            const nextPageBtn = document.getElementById('next_page');
            const pageNumbersContainer = document.getElementById('page_numbers');
            const showingStart = document.getElementById('showing_start');
            const showingEnd = document.getElementById('showing_end');
            const showingTotal = document.getElementById('showing_total');
            const paginationControls = document.getElementById('pagination_controls');

            // State
            let currentPage = 1;
            let rowsPerPage = 10;
            let filteredRows = Array.from(rows);

            // Search function
            function searchRows() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                filteredRows = [];

                rows.forEach(row => {
                    const nama = row.getAttribute('data-nama') || '';
                    const rekamMedis = row.getAttribute('data-rekam-medis') || '';
                    const tempatLahir = row.getAttribute('data-tempat-lahir') || '';
                    const alamat = row.getAttribute('data-alamat') || '';

                    const searchableText = `${nama} ${rekamMedis} ${tempatLahir} ${alamat}`;

                    if (searchableText.includes(searchTerm)) {
                        filteredRows.push(row);
                    }
                });

                // Reset to first page when searching
                currentPage = 1;

                // Update display
                updateDisplay();
            }

            // Update display based on current page and rows per page
            function updateDisplay() {
                const totalRows = filteredRows.length;
                const totalPages = rowsPerPage === 'all' ? 1 : Math.ceil(totalRows / rowsPerPage);

                // Hide all rows first
                rows.forEach(row => {
                    row.style.display = 'none';
                });

                if (totalRows === 0) {
                    showNoDataMessage(true);
                    paginationControls.style.display = 'none';
                    updateSearchInfo(0);
                    return;
                }

                showNoDataMessage(false);

                // Show rows for current page
                if (rowsPerPage === 'all') {
                    filteredRows.forEach(row => {
                        row.style.display = '';
                    });
                } else {
                    const startIndex = (currentPage - 1) * rowsPerPage;
                    const endIndex = Math.min(startIndex + rowsPerPage, totalRows);

                    for (let i = startIndex; i < endIndex; i++) {
                        if (filteredRows[i]) {
                            filteredRows[i].style.display = '';
                        }
                    }
                }

                // Update pagination info
                updatePaginationInfo(totalRows, totalPages);
                updateSearchInfo(totalRows);
            }

            // Update pagination info
            function updatePaginationInfo(totalRows, totalPages) {
                if (rowsPerPage === 'all') {
                    showingStart.textContent = totalRows > 0 ? 1 : 0;
                    showingEnd.textContent = totalRows;
                    paginationControls.style.display = totalRows > 0 ? 'flex' : 'none';
                    prevPageBtn.style.display = 'none';
                    nextPageBtn.style.display = 'none';
                    pageNumbersContainer.style.display = 'none';
                } else {
                    const startIndex = totalRows > 0 ? (currentPage - 1) * rowsPerPage + 1 : 0;
                    const endIndex = Math.min(currentPage * rowsPerPage, totalRows);

                    showingStart.textContent = startIndex;
                    showingEnd.textContent = endIndex;

                    paginationControls.style.display = totalRows > 0 ? 'flex' : 'none';
                    prevPageBtn.style.display = 'flex';
                    nextPageBtn.style.display = 'flex';
                    pageNumbersContainer.style.display = 'flex';

                    // Update button states
                    prevPageBtn.disabled = currentPage === 1;
                    nextPageBtn.disabled = currentPage === totalPages;

                    // Generate page numbers
                    generatePageNumbers(totalPages);
                }

                showingTotal.textContent = totalRows;
            }

            // Generate page numbers
            function generatePageNumbers(totalPages) {
                pageNumbersContainer.innerHTML = '';

                if (totalPages <= 1) return;

                const maxVisiblePages = 5;
                let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
                let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

                // Adjust start page if we're near the end
                if (endPage - startPage < maxVisiblePages - 1) {
                    startPage = Math.max(1, endPage - maxVisiblePages + 1);
                }

                // First page and ellipsis
                if (startPage > 1) {
                    addPageButton(1);
                    if (startPage > 2) {
                        addEllipsis();
                    }
                }

                // Page numbers
                for (let i = startPage; i <= endPage; i++) {
                    addPageButton(i);
                }

                // Ellipsis and last page
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        addEllipsis();
                    }
                    addPageButton(totalPages);
                }
            }

            // Add page button
            function addPageButton(pageNum) {
                const button = document.createElement('button');
                button.textContent = pageNum;
                button.className = `px-3 py-2 text-sm font-medium border rounded-lg ${
                    pageNum === currentPage 
                        ? 'bg-amber-500 text-white border-amber-500' 
                        : 'text-gray-500 bg-white border-gray-300 hover:bg-gray-50 hover:text-gray-700'
                }`;
                button.addEventListener('click', () => goToPage(pageNum));
                pageNumbersContainer.appendChild(button);
            }

            // Add ellipsis
            function addEllipsis() {
                const span = document.createElement('span');
                span.textContent = '...';
                span.className = 'px-3 py-2 text-sm font-medium text-gray-500';
                pageNumbersContainer.appendChild(span);
            }

            // Go to specific page
            function goToPage(pageNum) {
                currentPage = pageNum;
                updateDisplay();
            }

            // Update search info
            function updateSearchInfo(visibleCount) {
                searchCount.textContent = visibleCount;

                if (searchInput.value.trim()) {
                    searchInfo.classList.remove('hidden');
                } else {
                    searchInfo.classList.add('hidden');
                }
            }

            // Show/hide no data message
            function showNoDataMessage(show) {
                let noDataRow = document.getElementById('no-data-row');

                if (show) {
                    if (!noDataRow) {
                        const tbody = document.getElementById('pasien_tbody');
                        noDataRow = document.createElement('tr');
                        noDataRow.id = 'no-data-row';
                        noDataRow.className = 'bg-white hover:bg-gray-100';
                        noDataRow.innerHTML = `
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex flex-col items-center">
                                    <i class="fas fa-search text-3xl mb-2 text-gray-400"></i>
                                    <p class="text-lg font-medium">Tidak ada data pasien</p>
                                    <p class="text-sm">${searchInput.value.trim() ? 'yang sesuai dengan pencarian "' + searchInput.value + '"' : 'yang tersedia'}</p>
                                </div>
                            </td>
                        `;
                        tbody.appendChild(noDataRow);
                    } else {
                        // Update message based on search
                        const messageP = noDataRow.querySelector('p:last-child');
                        messageP.textContent = searchInput.value.trim() ?
                            'yang sesuai dengan pencarian "' + searchInput.value + '"' :
                            'yang tersedia';
                    }
                    noDataRow.style.display = '';
                } else {
                    if (noDataRow) {
                        noDataRow.style.display = 'none';
                    }
                }
            }

            // Event listeners

            // Search input with debounce
            let searchTimeout;
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    searchRows();
                }, 300);
            });

            // Rows per page change
            rowsPerPageSelect.addEventListener('change', function() {
                rowsPerPage = this.value === 'all' ? 'all' : parseInt(this.value);
                currentPage = 1;
                updateDisplay();
            });

            // Pagination navigation
            prevPageBtn.addEventListener('click', function() {
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            });

            nextPageBtn.addEventListener('click', function() {
                const totalPages = Math.ceil(filteredRows.length / rowsPerPage);
                if (currentPage < totalPages) {
                    goToPage(currentPage + 1);
                }
            });

            // Delete functionality
            document.addEventListener('click', function(e) {
                const target = e.target;

                // Check if delete button is clicked
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

            // Initialize
            filteredRows = Array.from(rows);
            updateDisplay();

            console.log('Pagination, search, and delete handlers initialized');
        });
    </script>
@endpush
