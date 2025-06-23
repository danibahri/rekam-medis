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

    <form {{-- action="{{ isset($kunjungan->assessment) ? route('update.pemeriksaan', $kunjungan->id_kunjungan) : route('store.pemeriksaan', $kunjungan->id_kunjungan) }}" --}} action="{{ route('store.pemeriksaan', $kunjungan->id_kunjungan) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="pemeriksaan" hidden>
        <div class="p-4">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Anamnesa <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="anamnesa" name="anamnesa"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->assessment->anamnesa ?? '' }}">
                    </div>
                    @error('anamnesa')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Diagnosa <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="diagnosa" name="diagnosa"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->assessment->diagnosa ?? '' }}">
                        </div>
                        <span class="text-sm text-gray-500">contoh: Batuk, Pilek</span>
                        @error('diagnosa')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            ICD-10 <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="icd_10" name="icd_10"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->assessment->kode_icd10 ?? '' }}">
                        </div>
                        <span class="text-sm text-gray-500">contoh: A00-B99, Penyakit Jantung</span>
                        @error('icd_10')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 grid gap-3 lg:grid-cols-3">
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Denyut Jantung
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="denyut_jantung" name="denyut_jantung"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->assessment->denyut_jantung ?? '' }}">
                        </div>
                        @error('denyut_jantung')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Tekanan Darah
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="tekanan_darah" name="tekanan_darah"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->assessment->tekanan_darah ?? '' }}">
                        </div>
                        @error('tekanan_darah')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Suhu Tubuh
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="suhu_tubuh" name="suhu_tubuh"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                value="{{ $kunjungan->assessment->suhu_tubuh ?? '' }}">
                        </div>
                        @error('suhu_tubuh')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Riwayat penyakit
                    </label>
                    <div class="flex">
                        <textarea name="riwayat_penyakit" class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400"
                            rows="2">{{ $kunjungan->assessment->riwayat_penyakit ?? '' }}</textarea>
                    </div>
                    @error('riwayat_penyakit')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- riwayat alergi --}}
        <div class="p-4">
            <div class="mb-3 flex items-center justify-between border-b">
                <h3 class="font-semibold">Riwayat Alergi</h3>
                <button class="text-amber-600 hover:text-amber-800">
                    <i class="fas fa-circle-check"></i>
                </button>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Alergi terhadap?
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="riwayat_alergi" name="riwayat_alergi"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->assessment->riwayat_alergi ?? '' }}">
                    </div>
                    @error('riwayat_alergi')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Detail alergi
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="detail_alergi" name="detail_alergi"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="{{ $kunjungan->assessment->detail_alergi ?? '' }}">
                    </div>
                    @error('detail_alergi')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Riwayat pengobatan
                </label>
                <div class="flex">
                    <textarea name="riwayat_pengobatan" class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400"
                        rows="2">{{ $kunjungan->assessment->riwayat_pengobatan ?? '' }}</textarea>
                </div>
                @error('riwayat_pengobatan')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Bagian tubuh yang sakit <span class="text-red-500">*</span>
                </label>
                <div class="flex w-full">
                    <select id="bagian_tubuh_sakit" name="bagian_tubuh_sakit"
                        onchange="showBodyPartImage(this.value)"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                        <option value="" disabled
                            {{ empty($kunjungan->assessment->bagian_tubuh_sakit) ? 'selected' : '' }}>Pilih bagian
                            tubuh</option>
                        <option value="telinga"
                            {{ ($kunjungan->assessment->bagian_tubuh_sakit ?? '') == 'telinga' ? 'selected' : '' }}>
                            Telinga
                        </option>
                        <option value="mata"
                            {{ ($kunjungan->assessment->bagian_tubuh_sakit ?? '') == 'mata' ? 'selected' : '' }}>Mata
                        </option>
                        <option value="tenggorokan"
                            {{ ($kunjungan->assessment->bagian_tubuh_sakit ?? '') == 'tenggorokan' ? 'selected' : '' }}>
                            Tenggorokan</option>
                    </select>
                </div>
                @error('bagian_tubuh_sakit')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Image Display Area -->
            <div id="body-part-image" class="mb-3 hidden">
                <div class="flex justify-center">
                    <img id="body-image" src="" alt=""
                        class="w-full rounded-lg border object-contain">
                </div>
            </div>

            <!-- Detail Input Area -->
            <div id="detail-area" class="mb-3 hidden">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Detail keluhan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea name="detail_keluhan" id="detail_keluhan"
                        class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="3"
                        placeholder="Jelaskan detail keluhan pada bagian yang dipilih...">{{ $kunjungan->assessment->detail_bagian_sakit ?? '' }}</textarea>
                </div>
                @error('detail_keluhan')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="reset"
                    class="cursor-pointer rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">
                    Batal
                </button>
                <button type="submit"
                    class="ml-2 cursor-pointer rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    @isset($kunjungan->assessment)
                        Update Pemeriksaan
                    @else
                        Simpan Pemeriksaan
                    @endisset
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show the image and detail area based on the selected body part
        const selectedBodyPart = document.getElementById('bagian_tubuh_sakit').value;
        showBodyPartImage(selectedBodyPart);
    });

    function showBodyPartImage(bodyPart) {
        const imageArea = document.getElementById('body-part-image');
        const detailArea = document.getElementById('detail-area');
        const bodyImage = document.getElementById('body-image');

        if (bodyPart === '') {
            imageArea.classList.add('hidden');
            detailArea.classList.add('hidden');
            return;
        }

        // Image paths - adjust these paths according to your actual image locations
        const imagePaths = {
            'telinga': '/images/body-parts/telinga.jpg',
            'mata': '/images/body-parts/mata.jpg',
            'tenggorokan': '/images/body-parts/tenggorokan.jpg'
        };

        bodyImage.src = imagePaths[bodyPart];
        bodyImage.alt = bodyPart;

        imageArea.classList.remove('hidden');
        detailArea.classList.remove('hidden');
    }
</script>
