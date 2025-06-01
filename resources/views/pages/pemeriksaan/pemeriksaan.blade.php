<!-- Clinical Examination Section -->
<div id="pemeriksaan" class="rounded-b-lg bg-white shadow" role="tabpanel" aria-labelledby="pemeriksaan-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Pemeriksaan Klinis</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    {{-- subjective --}}
    <div class="p-4">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Keluhan utama <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Diagnosa <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            ICD-10 <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                </div>
                <div class="mb-3 grid gap-3 lg:grid-cols-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Denyut Jantung <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Tekanan Darah <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Suhu Tubuh <span class="text-red-500">*</span>
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
                        Riwayat penyakit <span class="text-red-500">*</span>
                    </label>
                    <div class="flex">
                        <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- riwayat alergi --}}
    <div class="p-4">
        <div class="mb-3 flex items-center justify-between border-b">
            <h3 class="font-semibold">Riwayat Alergi</h3>
            <button class="text-amber-600 hover:text-amber-800">
                <i class="fas fa-circle-check"></i>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-3">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Obat <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Makanan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Udara <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        lain-lainnya <span class="text-red-500">*</span>
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
                    Riwayat pengobatan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Riwayat pengobatan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"></textarea>
                </div>
            </div>

            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="submit" class="rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
