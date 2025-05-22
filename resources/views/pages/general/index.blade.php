@extends('layouts.master')

@section('title', 'General - Consent')

@section('description', 'General - Consent')

@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <h1 class="text-3xl font-bold mb-4 bg-white py-5 pl-3 rounded shadow text-gray-700">General-Consent</h1>
            {{-- Info Card --}}
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-6">
                <div id="alert-additional-content-1"
                    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 " role="alert">
                    <div class="flex items-center">
                        <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Informasi tentang Hak dan Kewajiban Pasien</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        More info about this info alert goes here. This example text is going to run a bit longer
                    </div>
                    <div class="flex">
                        <button type="button"
                            class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 cursor-pointer focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center ">
                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            View more
                        </button>
                        <button type="button"
                            class="text-blue-800 bg-transparent border cursor-pointer border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center"
                            data-dismiss-target="#alert-additional-content-1" aria-label="Close">
                            Dismiss
                        </button>
                    </div>
                </div>
                <div id="alert-additional-content-2"
                    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 " role="alert">
                    <div class="flex items-center">
                        <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Informasi Ketentuan Pembayaran</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        More info about this info alert goes here. This example text is going to run a bit longer so that
                        you
                        can see how spacing within an alert works with this kind of content.
                    </div>
                    <div class="flex">
                        <button type="button"
                            class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 cursor-pointer focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center ">
                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            View more
                        </button>
                        <button type="button"
                            class="text-blue-800 bg-transparent border cursor-pointer border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center"
                            data-dismiss-target="#alert-additional-content-2" aria-label="Close">
                            Dismiss
                        </button>
                    </div>
                </div>
                <div id="alert-additional-content-3"
                    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 " role="alert">
                    <div class="flex items-center">
                        <svg class="shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <h3 class="text-lg font-medium">Informasi tentang Tata Tertib Klinik</h3>
                    </div>
                    <div class="mt-2 mb-4 text-sm">
                        More info about this info alert goes here. This example text is going to run a bit longer so that
                        you
                        can see how spacing within an alert works with this kind of content.
                    </div>
                    <div class="flex">
                        <button type="button"
                            class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 cursor-pointer focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center ">
                            <svg class="me-2 h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 14">
                                <path
                                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                            </svg>
                            View more
                        </button>
                        <button type="button"
                            class="text-blue-800 bg-transparent border cursor-pointer border-blue-800 hover:bg-blue-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 text-center"
                            data-dismiss-target="#alert-additional-content-3" aria-label="Close">
                            Dismiss
                        </button>
                    </div>
                </div>
            </div>

            {{-- form --}}
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Data Pribadi</h2>
                <form action="{{ route('store.general') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_pasien" value="{{ $pasien->id_pasien }}">
                    <div class="pt-5 grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-gray-900">Nama
                                Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="Nomor Induk Kependudukan" value="{{ $pasien->nama_lengkap }}" readonly>
                            @error('nama_lengkap')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="nomor_rekam_medis" class="block mb-2 text-sm font-medium text-gray-900">No.
                                Rekam
                                Medis</label>
                            <input type="text" id="nomor_rekam_medis" name="nomor_rekam_medis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="Nomor Induk Kependudukan" value="{{ $pasien->nomor_rekam_medis }}" readonly>
                            @error('nomor_rekam_medis')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                                Lahir</label>
                            <input type="text" id="tanggal_lahir" name="tanggal_lahir"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="Nomor Induk Kependudukan"
                                value="{{ $pasien->tanggal_lahir->translatedFormat('d F Y') }}" readonly>
                            @error('tanggal_lahir')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                                Kelamin</label>
                            <input type="text" id="jenis_kelamin" name="jenis_kelamin"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                placeholder="Nomor Induk Kependudukan" value="{{ $jenis_kelamin }}" readonly>
                            @error('jenis_kelamin')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="pt-5 grid md:grid-cols-2 gap-6">
                        <div>
                            <h1 class="border-b pb-2">Persetujuan Pasien</h1>
                            <div class="flex flex-col md:flex-row gap-4 mt-4">
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                                    <input id="persetujuan_pasien-1" type="radio" value="ya"
                                        name="persetujuan_pasien"
                                        class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                                    <label for="persetujuan_pasien-1"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Setuju</label>
                                </div>
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                                    <input id="persetujuan_pasien-2" type="radio" value="tidak"
                                        name="persetujuan_pasien"
                                        class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                                    <label for="persetujuan_pasien-2"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Tidak Setuju</label>
                                </div>
                            </div>
                            @error('persetujuan_pasien')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <h1 class="border-b pb-2">Fasyankes Rujukan</h1>
                            <div class="flex flex-col md:flex-row gap-4 mt-4">
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                                    <input id="fasyankes_rujukan-1" type="radio" value="setuju"
                                        name="fasyankes_rujukan"
                                        class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                                    <label for="fasyankes_rujukan-1"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Setuju</label>
                                </div>
                                <div
                                    class="flex items-center ps-4 border border-gray-200 rounded-sm w-full cursor-pointer">
                                    <input id="fasyankes_rujukan-2" type="radio" value="tidak_setuju"
                                        name="fasyankes_rujukan"
                                        class="w-4 h-4 text-amber-300 bg-gray-100 border-gray-300 rounded-sm focus:ring-amber-300">
                                    <label for="fasyankes_rujukan-2"
                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 ">Tidak Setuju</label>
                                </div>
                            </div>
                            @error('fasyankes_rujukan')
                                <span class="text-red-400 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <h1 class="border-b pb-2">Yang membuat pernyataan</h1>
                            <div class="grid grid-cols-1 gap-6 mt-4">
                                <div class="bg-white rounded-lg overflow-hidden items-center">
                                    {{-- File Input (HARUS DI LUAR preview box) --}}
                                    <input id="upload-ttd-pasien" name="tanda_tangan_pasien_path" type="file"
                                        class="hidden" accept="image/*" />

                                    {{-- Preview Area --}}
                                    <div id="penanggung-jawab-preview"
                                        class="p-6 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg mx-auto text-center cursor-pointer">
                                        <label for="upload-ttd-pasien" class="cursor-pointer block">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                            </svg>
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload Gambar
                                            </h5>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">Unggah TTD Penanggung
                                                Jawab</p>
                                            <span id="penanggung-jawab-filename"
                                                class="text-gray-500 bg-gray-200 text-sm block mt-2"></span>
                                        </label>
                                    </div>
                                    @error('tanda_tangan_pasien_path')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                    <div class="mt-4">
                                        <label for="penanggung_jawab"
                                            class="block mb-2 text-sm font-medium text-gray-900">Nama Penanggung
                                            Jawab</label>
                                        <input type="text" id="penanggung_jawab" name="penanggung_jawab"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                            placeholder="Nama Pembuat Pernyataan">
                                        @error('penanggung_jawab')
                                            <span class="text-red-400 text-xs">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white rounded-lg overflow-hidden items-center">
                                {{-- <div id="petugas-preview"
                                    class="max-w-sm p-6 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                    <input id="petugas" type="file" class="hidden" accept="image/*" />
                                    <label for="petugas" class="cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                        </svg>
                                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload
                                            Gambar</h5>
                                        <p class="font-normal text-sm text-gray-400 md:px-6">Unggah TTD Petugas</p>
                                        <span id="petugas-filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                    </label>
                                </div> --}}
                                <div class="mt-4">
                                    <label for="petugas_pemberi_penjelasan"
                                        class="block mb-2 text-sm font-medium text-gray-900">Nama
                                        Petugas</label>
                                    <input type="text" id="petugas_pemberi_penjelasan"
                                        name="petugas_pemberi_penjelasan"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-400 focus:border-amber-400 block w-full p-2.5"
                                        placeholder="petugas pemberi penjelasan">
                                    @error('petugas_pemberi_penjelasan')
                                        <span class="text-red-400 text-xs">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 w-full flex justify-end gap-3">
                        <a href="{{ route('show.pasien') }}"
                            class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 ms-3 text-center inline-flex items-center">
                            Kembali
                        </a>
                        <button type="submit"
                            class="text-white cursor-pointer bg-amber-500 hover:bg-amber-600 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setupImageUpload(inputId, filenameLabelId, previewContainerId) {
            const uploadInput = document.getElementById(inputId);
            const filenameLabel = document.getElementById(filenameLabelId);
            const imagePreview = document.getElementById(previewContainerId);

            uploadInput.addEventListener('change', (event) => {
                const file = event.target.files[0];
                if (file) {
                    filenameLabel.textContent = file.name;

                    const reader = new FileReader();
                    reader.onload = (e) => {
                        imagePreview.querySelector('label').innerHTML =
                            `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        setupImageUpload('upload-ttd-pasien', 'penanggung-jawab-filename', 'penanggung-jawab-preview');
    </script>
@endpush
