{{-- informed-consent --}}
<div class="bg-white rounded-lg shadow" id="informed" role="tabpanel" aria-labelledby="informed-tab">
    <div class="flex justify-between items-center p-3 bg-amber-300 rounded-t-lg">
        <h2 class="font-bold text-white">Informed Klinis</h2>
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
            </div>
        </form>
    </div>

    <!-- Objective Section -->
    <div class="p-4">
        <div class="flex justify-between items-center mb-3 border-b">
            <h3 class="font-semibold">Yang membuat pernyataan</h3>
            <button class="text-amber-600 hover:text-amber-800">
                <i class="fas fa-circle-check"></i>
            </button>
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="grid lg:grid-cols-2 gap-3 items-center mb-3 w-full">
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Penanggung Jawab<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>

                <div class="grid items-center mb-3 w-full">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-900 mb-1">Jenis
                        Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5">
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
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-3 items-center mb-3 w-full">
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Hubungan dengan pasien<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        No. HP<span class="text-red-500">*</span>
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
                <h1 class="border-b pb-2">Persetujuan</h1>
                <div class="flex flex-col md:flex-row gap-4 mt-4">
                    <div class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                        <input id="persetujuan-1" type="radio" value="ya" name="persetujuan"
                            class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                        <label for="persetujuan-1"
                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Setuju</label>
                    </div>
                    <div class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                        <input id="persetujuan-2" type="radio" value="tidak" name="persetujuan"
                            class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                        <label for="persetujuan-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Tidak
                            Setuju</label>
                    </div>
                </div>
                @error('persetujuan')
                    <span class="text-red-400 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="grid lg:grid-cols-3 gap-3 items-center mb-3 w-full">
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Saksi<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Penanggung Jawab<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="grid items-center mb-3 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        DPJP<span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                            placeholder="" value="">
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
