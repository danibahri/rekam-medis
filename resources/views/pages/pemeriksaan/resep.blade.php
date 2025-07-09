{{-- formulir resep --}}
<div id="resep" class="rounded-b-lg bg-white shadow" role="tabpanel" aria-labelledby="resep-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Formulir Resep Obat</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    <!-- Subjective Section -->
    <form action="{{ route('store.resep', $kunjungan->id_kunjungan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="resep" hidden>
        <div class="border-gray-200 p-4">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Diagnosa <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="diagnosa" name="diagnosa"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->assessment->diagnosa ?? '' }}" readonly>
                    </div>
                </div>
                {{-- kolom 2 baris --}}
                <div class="items mb-3 grid w-full gap-3 lg:grid-cols-2">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Nama Obat <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nama_obat" name="nama_obat"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->resep->nama_obat ?? '' }}">
                        </div>
                        @error('nama_obat')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Bentuk Sediaan <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="bentuk_sediaan" name="bentuk_sediaan"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->resep->bentuk_sediaan ?? '' }}">
                        </div>
                        @error('bentuk_sediaan')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="items mb-3 grid w-full gap-3 lg:grid-cols-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Jumlah <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="jumlah_obat" name="jumlah_obat"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->resep->jumlah_obat ?? '' }}">
                        </div>
                        @error('jumlah_obat')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label for="tanggal" class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                            Pelaksanaan <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal"
                                name="tanggal"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="Pilih tanggal"
                                value="{{ $kunjungan->resep->tanggal_resep ?? date('Y-m-d') }}">
                        </div>
                        @error('tanggal')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Jam <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="time" id="waktu_resep" name="waktu_resep"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan?->resep?->waktu_resep?->format('H:i') ?? date('H:i') }}">
                        </div>
                        @error('waktu_resep')
                            <span class="text-xs text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- Objective Section -->
        <div class="p-4">
            <div class="mb-3 flex items-center justify-between border-b">
                <h3 class="font-semibold">Metode atau rute yang diberikan</h3>
                <button class="text-amber-600 hover:text-amber-800">
                    <i class="fas fa-circle-check"></i>
                </button>
            </div>
            <div class="items mb-3 grid w-full gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Dosis Obat yang diberikan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="dosis_obat" name="dosis_obat"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->resep->dosis_obat_diberikan ?? '' }}">
                    </div>
                    @error('dosis_obat')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Frekuensi Interval <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="frekuensi_interval" name="frekuensi_interval"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->resep->frekuensi_interval ?? '' }}">
                    </div>
                    @error('frekuensi_interval')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3 grid w-full items-center gap-3">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Aturan tambahan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="aturan_tambahan" name="aturan_tambahan"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->resep->aturan_tambahan ?? '' }}">
                    </div>
                    @error('aturan_tambahan')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Catatan Resep <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"
                            name="catatan_resep">{{ $kunjungan->resep->catatan_resep ?? '' }}</textarea>
                    </div>
                    @error('catatan_resep')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="reset"
                    class="mr-2 cursor-pointer rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">
                    Batal
                </button>
                <button type="submit"
                    class="cursor-pointer rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    @isset($kunjungan->resep) Update Resep
                    @else
                        Simpan Resep @endif
                    </button>
                </div>
            </div>
        </form>
    </div>
