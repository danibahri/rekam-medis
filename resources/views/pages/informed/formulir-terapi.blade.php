{{-- formulir terapi --}}
<div id="terapi" class="bg-white rounded-lg shadow" role="tabpanel" aria-labelledby="terapi-tab">
    <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
        <h2 class="font-bold text-white">Formulir Terapi</h2>
        <div class="flex">
            <button class="text-gray-600 hover:text-white mx-1">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    <!-- Subjective Section -->
    <div class="p-4 border-gray-200">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid">
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Diagnosa<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items grid-cols-2 gap-3 mb-3 w-full">
                    <div class="grid items-center mb-3 w-full">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Tindakan yang dilakukan<span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="grid items-center mb-3 w-full">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            ICD9<span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="" value="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Objective Section -->
    <div class="p-4">
        <div class="flex justify-between items-center mb-3 border-b">
            <h3 class="font-semibold">Tindakan</h3>
            <button class="text-amber-600 hover:text-amber-800">
                <i class="fas fa-circle-check"></i>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid items lg:grid-cols-3 gap-3 mb-3 w-full">
                <div class="grid items-center mb-3 w-full">
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                        Pelaksanaan <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_lahir"
                            name="tanggal_lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full pl-10 p-2.5"
                            placeholder="Pilih tanggal" value="{{ old('tanggal_lahir') }}">
                    </div>
                    @error('tanggal_lahir')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Waktu mulai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Waktu selesai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
            </div>
            <div class="grid lg:grid-cols-2 gap-3 items-center mb-3 w-full">
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Alat medis yang digunakan<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        BMPH<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Konsekuensi dari tindakan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                </div>
            </div>

            <div class="mb-4">
                <h1 class="border-b pb-2">Obat</h1>
            </div>
            <div class="grid lg:grid-cols-2 gap-3 items-center mb-3 w-full">
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Obat yang dipakai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Aturan pakai <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow p-2 border rounded focus:ring-amber-400 focus:border-amber-400" rows="2"></textarea>
                    </div>
                </div>
            </div>

            {{-- button --}}
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-white font-bold py-2 px-4 rounded">
                    Simpan
                </button>
                <button type="reset"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>
