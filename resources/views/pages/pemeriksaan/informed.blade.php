{{-- informed-consent --}}
<div class="rounded-lg bg-white shadow" id="informed" role="tabpanel" aria-labelledby="informed-tab">
    <div class="flex items-center justify-between rounded-t-lg bg-amber-400 p-3">
        <h2 class="font-bold text-white">Informed Klinis</h2>
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
            </div>
        </form>
    </div>

    <!-- Objective Section -->
    <div class="p-4">
        <div class="mb-3 flex items-center justify-between border-b">
            <h3 class="font-semibold">Yang membuat pernyataan</h3>
            <button class="text-amber-600 hover:text-amber-800">
                <i class="fas fa-circle-check"></i>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Nama Penanggung Jawab<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>

                <div class="mb-3 grid w-full items-center">
                    <label for="jenis_kelamin" class="mb-1 block text-sm font-medium text-gray-900">Jenis
                        Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        <option value="0" {{ old('jenis_kelamin') == '0' ? 'selected' : '' }}>
                            Tdak diketahui jenis kelamin pasien</option>
                        <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="2" {{ old('jenis_kelamin') == '2' ? 'selected' : '' }}>
                            Perempuan</option>
                        <option value="3" {{ old('jenis_kelamin') == '3' ? 'selected' : '' }}>
                            Tidak dapat ditentukan</option>
                        <option value="4" {{ old('jenis_kelamin') == '4' ? 'selected' : '' }}>
                            Tidak mengisi</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Hubungan dengan pasien<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        No. HP<span class="text-red-500">*</span>
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
                <h1 class="border-b pb-2">Persetujuan</h1>
                <div class="mt-4 flex flex-col gap-4 md:flex-row">
                    <div class="flex w-full cursor-pointer items-center rounded-sm border border-gray-200 ps-4">
                        <input id="persetujuan-1" type="radio" value="ya" name="persetujuan"
                            class="h-4 w-4 rounded-sm border-gray-300 bg-gray-100 text-amber-400 focus:ring-amber-400">
                        <label for="persetujuan-1"
                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900">Setuju</label>
                    </div>
                    <div class="flex w-full cursor-pointer items-center rounded-sm border border-gray-200 ps-4">
                        <input id="persetujuan-2" type="radio" value="tidak" name="persetujuan"
                            class="h-4 w-4 rounded-sm border-gray-300 bg-gray-100 text-amber-400 focus:ring-amber-400">
                        <label for="persetujuan-2" class="ms-2 w-full py-4 text-sm font-medium text-gray-900">Tidak
                            Setuju</label>
                    </div>
                </div>
                @error('persetujuan')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-3">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Saksi<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Penanggung Jawab<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        DPJP<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
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
