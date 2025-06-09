{{-- daftar pasien --}}
<div class="max-h-fit rounded-lg bg-white shadow lg:w-1/2">
    <div class="flex items-center justify-between rounded-t-lg bg-amber-400 p-3">
        <h2 class="font-bold text-white">Daftar Pasien</h2>
        <div class="flex">
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-th-list"></i>
            </button>
            <button class="mx-1 text-gray-600 hover:text-white">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    <!-- Search Section -->
    <div class="border-b p-3">
        <div class="flex items-center">
            <span class="text-sm text-gray-700">Cari Berdasarkan RM/Nama</span>
            <button class="ml-2 text-gray-600 hover:text-white">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
        <div class="mt-2 flex">
            <input type="text" class="w-full rounded border p-2" placeholder="Cari...">
        </div>
    </div>
    <!-- Patient List -->
    <div class="h-screen overflow-y-auto rounded">
        @if (count($antrian) > 0)
            @php
                // reverse the order of the antrian array
                // $antrian = $antrian->reverse();
                $count = 1;
            @endphp
            @foreach ($antrian as $item)
                <a href="{{ route('show.pemeriksaan', $item->id_kunjungan) }}">
                    <div class="cursor-pointer border-b p-3 hover:bg-amber-50">
                        <div class="flex justify-between">
                            <span class="font-bold text-amber-800">{{ $item->pasien->nomor_rekam_medis }}</span>
                            <span
                                class="flex items-center rounded bg-amber-400 px-2 text-xs font-semibold text-white">Antrian
                                ke-{{ $count }}</span>
                        </div>
                        <div class="mt-1">
                            <div class="font-bold">{{ $item->pasien->nama_lengkap }}</div>
                            <div class="text-xs text-gray-600">{{ $item->id_kunjungan }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d/m/Y') }} -
                                {{ \Carbon\Carbon::parse($item->waktu_kunjungan)->format('H:i') }}</div>
                            <div class="flex items-center text-xs">
                                <span>{{ $item->pasien->jenisKelamin->nama }} -
                                    {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') }}</span>
                                <span class="ml-1 text-green-600"><i class="fas fa-user-check"></i></span>
                            </div>
                            <div class="text-xs text-gray-600">{{ $item->dokter->nama_dokter }}</div>
                        </div>
                    </div>
                </a>
                @php
                    $count++;
                @endphp
            @endforeach
        @else
            <div class="p-3 text-center text-gray-600">Tidak ada antrian</div>
        @endif
    </div>
</div>
