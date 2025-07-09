{{-- formulir terapi --}}
<div id="terapi" class="rounded-b-lg bg-white shadow" role="tabpanel" aria-labelledby="terapi-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Formulir Terapi</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    <!-- Subjective Section -->
    <form action="{{ route('store.terapi', $kunjungan->id_kunjungan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="terapi" hidden>
        <div class="p-4">
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
                <div class="items mb-3 grid w-full grid-cols-2 gap-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Tindakan yang dilakukan <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nama_tindakan" name="nama_tindakan"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->tindakan->nama_tindakan ?? '' }}">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            ICD9 <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="kode_icd9" name="kode_icd9"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->tindakan->kode_icd9 ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Objective Section -->
        <div class="p-4">
            <div class="mb-3 flex items-center justify-between border-b">
                <h3 class="font-semibold">Tindakan</h3>
                <button class="text-amber-600 hover:text-amber-800">
                    <i class="fas fa-circle-check"></i>
                </button>
            </div>
            <div class="items mb-3 grid w-full gap-3 lg:grid-cols-3">
                <div class="mb-3 grid w-full items-center">
                    <label for="tanggal_tindakan" class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                        Pelaksanaan <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_tindakan"
                            name="tanggal_tindakan"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="Pilih tanggal"
                            value="{{ $kunjungan->tindakan->tanggal_tindakan ?? date('Y-m-d') }}">
                    </div>
                    @error('tanggal_tindakan')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label for="waktu_mulai" class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu mulai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="time" id="waktu_mulai" name="waktu_mulai"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ !empty($kunjungan->tindakan->waktu_mulai) ? \Carbon\Carbon::parse($kunjungan->tindakan->waktu_mulai)->format('H:i') : date('H:i') }}">
                    </div>
                </div>

                <div class="mb-3 grid w-full items-center">
                    <label for="waktu_selesai" class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu selesai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="time" id="waktu_selesai" name="waktu_selesai"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ !empty($kunjungan->tindakan->waktu_selesai) ? \Carbon\Carbon::parse($kunjungan->tindakan->waktu_selesai)->format('H:i') : '' }}">
                    </div>
                </div>
            </div>
            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Alat medis yang digunakan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="alat_medis" name="alat_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->tindakan->alat_medis_digunakan ?? '' }}">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        BMHP <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="bmhp" name="bmhp"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->tindakan->bmhp ?? '' }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Konsekuensi dari tindakan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"
                        name="konsekuensi_tindakan">{{ $kunjungan->tindakan->konsekuensi_tindakan ?? '' }}</textarea>
                </div>
            </div>

            <div class="mb-4">
                <h1 class="border-b pb-2">Obat</h1>
            </div>
            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Obat yang dipakai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"
                            name="obat_digunakan">{{ $kunjungan->tindakan->obat_digunakan ?? '' }}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Aturan pakai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"
                            name="aturan_penggunaan_obat">{{ $kunjungan->tindakan->aturan_penggunaan_obat ?? '' }}</textarea>
                    </div>
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
                    @isset($kunjungan->tindakan)
                        Update Terapi
                    @else
                        Simpan Terapi
                    @endisset
                </button>
            </div>
        </div>
    </form>
</div>
