{{-- informed-consent --}}
<div class="rounded-b-lg bg-white shadow" id="informed" role="tabpanel" aria-labelledby="informed-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Informed Klinis</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-plus-circle"></i>
            </button>
        </div>
    </div>

    {{-- subjective --}}
    <form action="{{ route('store.informed', $kunjungan->id_kunjungan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="informed" hidden>
        <div class="p-4">
            <div class="grid">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Diagnosa <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->assessment->diagnosa ?? '' }}" readonly>
                    </div>
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Tindakan yang dilakukan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="tindakan_dilakukan" name="tindakan_dilakukan"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->tindakan_dilakukan ?? '' }}">
                    </div>
                    @error('tindakan_dilakukan')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Pernyataan --}}
        <div class="p-4">
            <div class="mb-3 flex items-center justify-between border-b">
                <h3 class="font-semibold">Yang membuat pernyataan</h3>
                <button class="text-amber-600 hover:text-amber-800">
                    <i class="fas fa-circle-check"></i>
                </button>
            </div>
            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Nama Penanggung Jawab <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="penanggung_jawab" name="penanggung_jawab"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->nama_penanggung_jawab ?? '' }}">
                    </div>
                    @error('penanggung_jawab')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 grid w-full items-center">
                    <label for="jenis_kelamin" class="mb-1 block text-sm font-medium text-gray-900">Jenis
                        Kelamin <span class="text-red-500">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                        @foreach ($master_jeniskelamin as $item)
                            <option value="{{ $item->id }}"
                                {{ ($kunjungan->informedConsent->jenis_kelamin_penanggung_jawab ?? '') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 grid w-full items-center gap-3 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Hubungan dengan pasien <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="hubungan_dengan_pasien" name="hubungan_dengan_pasien"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->hubungan_dengan_pasien ?? '' }}">
                    </div>
                    @error('hubungan_dengan_pasien')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        No. HP
                    </label>
                    <div class="flex w-full">
                        <input type="number" id="nomor_hp_penanggung_jawab" name="nomor_hp_penanggung_jawab"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->nomor_hp_penanggung_jawab ?? '' }}">
                    </div>
                    @error('nomor_hp_penanggung_jawab')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="mb-1 block text-sm font-medium text-gray-700">
                    Konsekuensi dari tindakan <span class="text-red-500">*</span>
                </label>
                <div class="flex">
                    <textarea class="flex-grow rounded border p-2 focus:border-amber-400 focus:ring-amber-400" rows="2"
                        name="konsekuensi_tindakan">{{ $kunjungan->informedConsent->konsekuensi_tindakan ?? '' }}</textarea>
                </div>
                @error('konsekuensi_tindakan')
                    <span class="text-xs text-red-400">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- persetujuan --}}
        <div class="p-4">
            <div class="mb-3 flex items-center justify-between border-b">
                <h3 class="font-semibold">Persetujuan <span class="text-red-500">*</span></h3>
                <button class="text-amber-600 hover:text-amber-800">
                    <i class="fas fa-circle-check"></i>
                </button>
            </div>

            <div class="mb-4 mt-4">
                <div class="mt-4 flex flex-col gap-4 md:flex-row">
                    {{-- radio aktif yang ada di informed consent --}}
                    <div class="flex w-full cursor-pointer items-center rounded-sm border border-gray-200 ps-4">
                        <input id="persetujuan-1" type="radio" value="ya" name="persetujuan"
                            {{ ($kunjungan->informedConsent->persetujuan_tindakan ?? '') == 'ya' ? 'checked' : '' }}
                            class="h-4 w-4 rounded-sm border-gray-300 bg-gray-100 text-amber-400 focus:ring-amber-400">
                        <label for="persetujuan-1"
                            class="ms-2 w-full py-4 text-sm font-medium text-gray-900">Setuju</label>
                    </div>
                    <div class="flex w-full cursor-pointer items-center rounded-sm border border-gray-200 ps-4">
                        <input id="persetujuan-2" type="radio" value="tidak" name="persetujuan"
                            {{ ($kunjungan->informedConsent->persetujuan_tindakan ?? '') == 'tidak' ? 'checked' : '' }}
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
                        Saksi <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="nama_saksi" name="nama_saksi"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->nama_saksi ?? '' }}">
                    </div>
                    @error('nama_saksi')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        Penanggung Jawab <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="penanggung_jawab_saksi" name="penanggung_jawab_saksi"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $kunjungan->informedConsent->penanggung_jawab_saksi ?? '' }}">
                    </div>
                    @error('penanggung_jawab_saksi')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3 grid w-full items-center">
                    <label class="mb-1 block text-sm font-medium text-gray-700">
                        DPJP <span class="text-red-500">*</span>
                    </label>
                    <div class="flex w-full">
                        <input type="text" id="dpjp" name="dpjp"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            value="{{ $dokter->nama_dokter ?? '' }}" readonly>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between">
                {{-- button pdf --}}
                @if (!empty($kunjungan->informedConsent))
                    <div class="mt-4 flex justify-end">
                        <a href="{{ route('surat.tindakan', $kunjungan->pasien->id_pasien) }}" target="_blank"
                            class="rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                            <i class="fas fa-file-pdf"></i> Cetak Surat Tindakan Medis
                        </a>
                @endif
            </div>
            {{-- button --}}
            <div class="mt-4 flex justify-end">
                <button type="reset"
                    class="cursor-pointer rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">
                    Batal
                </button>
                <button type="submit"
                    class="ml-2 cursor-pointer rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                    @isset($kunjungan->informedConsent)
                        Update Informed
                    @else
                        Simpan Informed
                    @endisset
                </button>
            </div>
        </div>
</div>
</form>
</div>
