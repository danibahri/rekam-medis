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

    <form action="" method="POST" enctype="multipart/form-data">
        {{-- subjective --}}
        <div class="p-4">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Anamnesa <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="keluhan_utama" name="keluhan_utama"
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
                            <input type="text" id="diagnosa" name="diagnosa"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            ICD-10 <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="icd_10" name="icd_10"
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
                            <input type="text" id="denyut_jantung" name="denyut_jantung"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Tekanan Darah <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="tekanan_darah" name="tekanan_darah"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                                placeholder="" value="">
                        </div>
                    </div>
                    <div class="mb-3 grid w-full items-center">
                        <label class="mb-1 block text-sm font-medium text-gray-700">
                            Suhu Tubuh <span class="text-red-500">*</span>
                        </label>
                        <div class="flex w-full">
                            <input type="text" id="suhu_tubuh" name="suhu_tubuh"
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
                        <textarea name="riwayat_penyakit" class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400"
                            rows="2"></textarea>
                    </div>
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
                        Obat <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="alergi_obat" name="alergi_obat"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Makanan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="alergi_makanan" name="alergi_makanan"
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
                        <input type="text" id="alergi_udara" name="alergi_udara"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="" value="">
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        lain-lainnya <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="alergi_lainnya" name="alergi_lainnya"
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
                    <textarea name="riwayat_pengobatan" class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400"
                        rows="2"></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Bagian tubuh yang sakit <span class="text-red-500">*</span>
                </label>
                <div class="flex w-full">
                    <select id="bagian_tubuh_sakit" name="bagian_tubuh_sakit"
                        onchange="showBodyPartImage(this.value)"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                        <option value="">Pilih bagian tubuh</option>
                        <option value="telinga">Telinga</option>
                        <option value="mata">Mata</option>
                        <option value="tenggorokan">Tenggorokan</option>
                    </select>
                </div>
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
                        placeholder="Jelaskan detail keluhan pada bagian yang dipilih..."></textarea>
                </div>
            </div>

            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="submit" class="rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</div>

<script>
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
