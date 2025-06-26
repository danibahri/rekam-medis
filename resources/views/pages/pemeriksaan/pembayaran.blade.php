{{-- Formulir Pembayaran --}}
<div id="pembayaran" class="rounded-b-lg bg-white shadow" role="tabpanel" aria-labelledby="pembayaran-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Formulir Pembayaran Pasien</h2>
        {{-- Tombol ini bisa Anda fungsikan nanti, misal untuk melihat riwayat pembayaran --}}
        <button class="mx-1 text-white hover:text-gray-200">
            <i class="fas fa-history"></i>
        </button>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="pembayaran" hidden>
        <div class="p-4">
            <div class="mb-3 grid w-full gap-4 lg:grid-cols-2">
                <div>
                    <label for="tanggal_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Tanggal Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_pembayaran" name="tanggal_pembayaran"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ $kunjungan->pembayaran->tanggal_pembayaran ?? date('Y-m-d') }}">
                </div>
                <div>
                    <label for="waktu_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="time" id="waktu_pembayaran" name="waktu_pembayaran"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ $kunjungan->pembayaran->waktu_pembayaran ?? '' }}">
                </div>
            </div>

            <div class="mb-3 grid w-full gap-4 lg:grid-cols-2">
                <div>
                    <label for="jumlah" class="mb-1 block text-sm font-medium text-gray-700">
                        Jumlah Pembayaran (Rp) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="jumlah" name="jumlah" min="0"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ $kunjungan->pembayaran->jumlah ?? '' }}">
                </div>
                <div>
                    <label for="cara_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Cara Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <select id="cara_pembayaran" name="cara_pembayaran"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400">
                        <option value="" disabled selected>Pilih cara pembayaran...</option>
                        @foreach ($caraPembayaran as $pembayaran)
                            <option value="{{ $pembayaran->id }}"
                                {{ isset($kunjungan->pembayaran) && $kunjungan->pembayaran->caraPembayaran->id == $pembayaran->id ? 'selected' : '' }}>
                                {{ $pembayaran->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3 grid w-full">
                <div>
                    <label for="status_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Status Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="status_pembayaran" name="status_pembayaran"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ ($kunjungan->pembayaran->status_pembayaran ?? 'belum_lunas') == 'belum_lunas' ? 'Belum Lunas' : 'Lunas' }}"
                        readonly>
                </div>
            </div>
        </div>

        <div class="flex justify-end border-t p-4">
            <button type="reset"
                class="mr-2 cursor-pointer rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400">
                Batal
            </button>
            <button type="submit"
                class="cursor-pointer rounded bg-amber-500 px-4 py-2 font-bold text-white hover:bg-amber-600">
                @isset($kunjungan->pembayaran)
                    Update Pembayaran
                @else
                    Simpan Pembayaran
                @endisset
            </button>
        </div>
    </form>
</div>
