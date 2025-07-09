{{-- Formulir Pembayaran --}}
<div id="pembayaran" class="rounded-b-lg bg-white shadow" role="tabpanel" aria-labelledby="pembayaran-tab">
    <div class="flex items-center justify-between bg-amber-600 p-3 pt-6">
        <h2 class="font-bold text-white">Formulir Pembayaran Pasien</h2>
        {{-- Tombol ini bisa Anda fungsikan nanti, misal untuk melihat riwayat pembayaran --}}
        <button class="mx-1 text-white hover:text-gray-200">
            <i class="fas fa-history"></i>
        </button>
    </div>

    <form action="{{ route('store.pembayaran', $kunjungan->id_kunjungan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="active_tab" value="pembayaran" hidden>
        <div class="p-4">
            <div class="mb-3 grid w-full gap-4 lg:grid-cols-2">
                <div class="mb-3 grid w-full items-center">
                    <label for="tanggal_pembayaran" class="mb-2 block text-sm font-medium text-gray-900">Tanggal
                        Pembayaran <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-4 w-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-format="yyyy-mm-dd" type="text" id="tanggal_pembayaran"
                            name="tanggal_pembayaran"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pl-10 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                            placeholder="Pilih tanggal pembayaran"
                            value="{{ $kunjungan->pembayaran->tanggal_pembayaran ?? date('Y-m-d') }}">
                    </div>
                    @error('tanggal_pembayaran')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="waktu_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Waktu Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="time" id="waktu_pembayaran" name="waktu_pembayaran"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ $kunjungan?->pembayaran?->waktu_pembayaran?->format('H:i') ?? date('H:i') }}">
                    @error('waktu_pembayaran')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
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
                    @error('jumlah')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
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
                    @error('cara_pembayaran')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-3 grid w-full">
                <div>
                    <label for="status_pembayaran" class="mb-1 block text-sm font-medium text-gray-700">
                        Status Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-amber-400 focus:ring-amber-400"
                        value="{{ ($kunjungan->pembayaran->status_pembayaran ?? 'belum_lunas') == 'belum_lunas' ? 'Belum Lunas' : 'Lunas' }}"
                        readonly>
                    <input type="text" name="status_pembayaran" id="status_pembayaran"
                        value="{{ $kunjungan->pembayaran->status_pembayaran ?? 'belum_lunas' }}" hidden>
                    @error('status_pembayaran')
                        <span class="text-xs text-red-400">{{ $message }}</span>
                    @enderror
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
