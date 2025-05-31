{{-- modal --}}
<div id="modal-{{ $item->id_pasien }}" tabindex="-1" aria-hidden="true"
    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
    <div class="relative max-h-full w-full max-w-4xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900">
                    Tambahkan Pasien Ke Antrian
                </h3>
                <button type="button"
                    class="ms-auto inline-flex h-8 w-8 cursor-pointer items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
                    data-modal-toggle="modal-{{ $item->id_pasien }}">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nomor Rekam
                            Medis</label>
                        <input type="text" name="name" id="name" value="{{ $item->nomor_rekam_medis }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                            required readonly>
                    </div>
                    <div class="col-span-2">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nomor Induk
                            Keluarga</label>
                        <input type="text" name="name" id="name" value="{{ $item->nik }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                            required readonly>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nama Pasien</label>
                        <input type="text" name="name" id="name" value="{{ $item->nama_lengkap }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                            required readonly>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="mb-2 block text-sm font-medium text-gray-900">Jenis Kelamin</label>
                        <input type="text" name="price" id="price" value="{{ $item->jenis_kelamin }}"
                            class="hidden w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                            required readonly>
                        <input type="text" name="price" id="price" value="{{ $item->jenisKelamin->nama }}"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-600 focus:ring-amber-600"
                            required readonly>
                    </div>
                    <div class="col-span-2 mt-5">
                        @php
                            $kunjungan = App\Models\Kunjungan::where('id_pasien', $item->id_pasien)->get();
                        @endphp
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-900">History
                            Kunjungan</label>
                        <div class="relative overflow-x-auto">
                            <table class="border-t-1 w-full text-left text-sm text-gray-700 shadow-md">
                                <thead class="border-b-1 bg-white text-xs uppercase text-gray-700">
                                    <tr>
                                        <th class="px-6 py-3">Tanggal Kunjungan</th>
                                        <th class="px-6 py-3">Keluhan</th>
                                        <th class="px-6 py-3">Dokter</th>
                                        <th class="px-6 py-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($kunjungan) == 0)
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center">Tidak ada history kunjungan
                                                pasien</td>
                                        </tr>
                                    @else
                                        @foreach ($kunjungan as $kunjungan)
                                            <tr>
                                                <td class="px-6 py-4">
                                                    {{ \Carbon\Carbon::parse($kunjungan->tanggal_kunjungan)->translatedFormat('d F Y') }}
                                                </td>
                                                <td class="px-6 py-4">{{ $kunjungan->keluhan_utama }}</td>
                                                <td class="px-6 py-4">{{ $kunjungan->dokter->nama_dokter }}</td>
                                                <td class="px-6 py-4">
                                                    @if ($kunjungan->status == 'menunggu')
                                                        <span
                                                            class="rounded-xl bg-red-500 px-2 py-2 text-xs text-white">Menunggu</span>
                                                    @elseif($kunjungan->status == 'dalam_pemeriksaan')
                                                        <span
                                                            class="rounded-xl bg-amber-500 px-2 py-2 text-xs text-white">Dalam
                                                            Pemeriksaan</span>
                                                    @else
                                                        <span
                                                            class="rounded-xl bg-green-500 px-2 py-2 text-xs text-white">Selesai</span>
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
                <div class="flex w-full justify-end">
                    <button type="submit"
                        class="inline-flex cursor-pointer items-end rounded-lg bg-amber-500 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-amber-800 focus:outline-none focus:ring-4 focus:ring-amber-300">
                        <svg class="-ms-1 me-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Antrian
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
