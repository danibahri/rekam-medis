{{-- formulir terapi --}}
<div id="terapi" class="rounded-lg bg-white shadow" role="tabpanel" aria-labelledby="terapi-tab">
    <div class="flex items-center justify-between rounded-t-lg bg-amber-400 p-3">
        <h2 class="font-bold text-white">Formulir Terapi</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    <!-- Subjective Section -->
    <div class="border-gray-200 p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Diagnosa<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="items mb-3 grid w-full grid-cols-2 gap-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Tindakan yang dilakukan<span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            ICD9<span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Objective Section -->
    <div class="p-4">
        <div class="mb-3 flex items-center justify-between border-b">
            <h3 class="font-semibold">Tindakan</h3>
            <button class="text-amber-600 hover:text-amber-800">
                <i class="fas fa-circle-check"></i>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="items mb-3 grid w-full gap-3 lg:grid-cols-3">
                <div class="mb-3 grid w-full items-center">
                    <label for="tanggal_lahir" class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                        Pelaksanaan <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_lahir"
                            name="tanggal_lahir"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="Pilih tanggal" value="{{ old('tanggal_lahir') }}">
                    </div>
                    @error('tanggal_lahir')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu mulai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu selesai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
            </div>
            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Alat medis yang digunakan<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        BMPH<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Konsekuensi dari tindakan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
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
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Aturan pakai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
                    </div>
                </div>
            </div>

            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="submit" class="rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    Simpan
                </button>
                <button type="reset"
                    class="ml-2 rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
