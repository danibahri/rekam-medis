<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\Pasien;
use SweetAlert2\Laravel\Swal;
use App\Models\Kunjungan;
use App\Models\MasterAgama;
use App\Models\MasterCaraPembayaran;
use App\Models\MasterJenisKelamin;
use App\Models\MasterPekerjaan;
use App\Models\MasterPendidikan;
use App\Models\MasterStatusPernikahan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function show_pasien()
    {
        $data_pasien = Pasien::with(['jenisKelamin', 'agama', 'pendidikan', 'pekerjaan', 'statusPernikahan'])->get();
        $data_dokter = Dokter::all();
        return view('pages.pasien.index', compact('data_pasien', 'data_dokter'));
    }

    public function profile_pasien($id)
    {
        $pasien = Pasien::with(['jenisKelamin', 'agama', 'pendidikan', 'pekerjaan', 'statusPernikahan'])->findOrFail($id);

        // kunjungan pasien dengan status selesai
        $kunjungan = Kunjungan::where('id_pasien', $id)
            ->whereIn('status', ['selesai', 'dalam_pemeriksaan'])
            ->orderBy('tanggal_kunjungan', 'desc')
            ->orderBy('waktu_kunjungan', 'desc')
            ->get();

        if (!$pasien) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Pasien not found',
                'icon' => 'error',
                'timer' => 3000,
            ]);
            return redirect()->route('show.pasien')->with('error', 'Pasien not found');
        }
        return view('pages.pasien.profile', compact('pasien', 'kunjungan'));
    }

    public function add_pasien()
    {
        $master_agama = MasterAgama::all();
        $master_jenisKelamin = MasterJenisKelamin::all();
        $master_pekerjaan = MasterPekerjaan::all();
        $master_pendidikan = MasterPendidikan::all();
        $master_pernikahan = MasterStatusPernikahan::all();
        $master_pembayaran = MasterCaraPembayaran::all();
        return view('pages.pasien.create', compact('master_agama', 'master_jenisKelamin', 'master_pekerjaan', 'master_pendidikan', 'master_pernikahan', 'master_pembayaran'));
    }

    public function edit_pasien($id)
    {
        if (Auth::user()->role != 'petugas') {
            Swal::info([
                'title' => 'Peringatan!',
                'text' => 'Anda tidak memiliki akses untuk mengedit data pasien',
                'icon' => 'warning'
            ]);
            return redirect()->back();
        }

        $pasien = Pasien::findOrFail($id);
        $master_agama = MasterAgama::all();
        $master_jenisKelamin = MasterJenisKelamin::all();
        $master_pekerjaan = MasterPekerjaan::all();
        $master_pendidikan = MasterPendidikan::all();
        $master_pernikahan = MasterStatusPernikahan::all();
        $master_pembayaran = MasterCaraPembayaran::all();

        return view('pages.pasien.edit', compact('pasien', 'master_agama', 'master_jenisKelamin', 'master_pekerjaan', 'master_pendidikan', 'master_pernikahan', 'master_pembayaran'));
    }

    public function store_pasien(Request $request)
    {
        $validated = $request->validate([
            'nomor_rekam_medis' => 'required|string|unique:pasien',
            'nik' => 'nullable|string|max:16|unique:pasien',
            'nomor_identitas_lain' => 'nullable|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'nama_ibu_kandung' => 'nullable|string|max:100',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:0,1,2,3,4',
            'agama' => 'nullable|in:1,2,3,4,5,6,7',
            'suku' => 'nullable|string|max:50',
            'bahasa_dikuasai' => 'nullable|string|max:100',

            // Alamat KTP
            'alamat_lengkap' => 'required|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'kelurahan_desa' => 'nullable|string|max:50',
            'kecamatan' => 'nullable|string|max:50',
            'kota_kabupaten' => 'nullable|string|max:50',
            'provinsi' => 'nullable|string|max:50',
            'kode_pos' => 'nullable|string|max:10',
            'negara' => 'nullable|string|max:50',

            // Alamat Domisili
            'alamat_domisili' => 'nullable|string',
            'domisili_rt' => 'nullable|string|max:5',
            'domisili_rw' => 'nullable|string|max:5',
            'domisili_kelurahan_desa' => 'nullable|string|max:50',
            'domisili_kecamatan' => 'nullable|string|max:50',
            'domisili_kota_kabupaten' => 'nullable|string|max:50',
            'domisili_provinsi' => 'nullable|string|max:50',
            'domisili_kode_pos' => 'nullable|string|max:10',
            'domisili_negara' => 'nullable|string|max:50',

            // Kontak dan Data Lainnya
            'telepon_rumah' => 'nullable|string|max:15',
            'telepon_seluler' => 'nullable|string|max:15',
            'pendidikan' => 'nullable|in:1,2,3,4,5,6,7,8',
            'pekerjaan' => 'nullable|in:0,1,2,3,4,5,6,7',
            'status_pernikahan' => 'nullable|in:1,2,3,4',
            'cara_pembayaran' => 'nullable|in:1,2,3,4',

            // Upload file
            'foto_pasien_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nomor_rekam_medis.required' => 'Nomor Rekam Medis tidak boleh kosong',
            'nomor_rekam_medis.unique' => 'Nomor Rekam Medis sudah terdaftar',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong',
            'alamat_lengkap.required' => 'Alamat Lengkap tidak boleh kosong',
            'domisili_rt.max' => 'RT maksimal 5 karakter',
            'domisili_rw.max' => 'RW maksimal 5 karakter',
            'rt.max' => 'RT maksimal 5 karakter',
            'rw.max' => 'RW maksimal 5 karakter',
            'kode_pos.max' => 'Kode Pos maksimal 10 karakter',
            'domisili_kode_pos.max' => 'Kode Pos maksimal 10 karakter',
            'nik.max' => 'NIK maksimal 16 karakter',
            'nomor_identitas_lain.max' => 'Nomor Identitas Lain maksimal 20 karakter',
            'suku.max' => 'Suku maksimal 50 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 50 karakter',
            'nama_ibu_kandung.max' => 'Nama Ibu Kandung maksimal 100 karakter',
            'alamat_lengkap.max' => 'Alamat Lengkap maksimal 255 karakter',
            'alamat_domisili.max' => 'Alamat Domisili maksimal 255 karakter',
            'domisili_kelurahan_desa.max' => 'Domisili Kelurahan Desa maksimal 50 karakter',
            'domisili_kecamatan.max' => 'Domisili Kecamatan maksimal 50 karakter',
            'domisili_kota_kabupaten.max' => 'Domisili Kota/Kabupaten maksimal 50 karakter',
            'domisili_provinsi.max' => 'Domisili Provinsi maksimal 50 karakter',
            'domisili_negara.max' => 'Domisili Negara maksimal 50 karakter',
            'kelurahan_desa.max' => 'Kelurahan Desa maksimal 50 karakter',
            'kecamatan.max' => 'Kecamatan maksimal 50 karakter',
            'kota_kabupaten.max' => 'Kota/Kabupaten maksimal 50 karakter',
            'provinsi.max' => 'Provinsi maksimal 50 karakter',
            'negara.max' => 'Negara maksimal 50 karakter',
            'agama.in' => 'Agama tidak valid',
            'jenis_kelamin.in' => 'Jenis Kelamin tidak valid',
            'pendidikan.in' => 'Pendidikan tidak valid',
            'pekerjaan.in' => 'Pekerjaan tidak valid',
            'status_pernikahan.in' => 'Status Pernikahan tidak valid',
            'cara_pembayaran.in' => 'Cara Pembayaran tidak valid',
            'bahasa_dikuasai.max' => 'Bahasa Dikuasai maksimal 100 karakter',
            'suku.max' => 'Suku maksimal 50 karakter',
            'telepon_seluler.max' => 'Telepon Seluler maksimal 15 karakter',
            'telepon_rumah.max' => 'Telepon Rumah maksimal 15 karakter',

            // Validasi foto
            'foto_pasien_path.image' => 'File harus berupa gambar',
            'foto_pasien_path.mimes' => 'Format file harus jpeg, png, jpg, atau gif',
            'foto_pasien_path.max' => 'Ukuran file maksimal 2MB',
        ]);

        try {
            $id = 'PSN' . uniqid(true);

            // Handle file upload
            $foto_path = null;
            if ($request->hasFile('foto_pasien_path')) {
                $file = $request->file('foto_pasien_path');
                $filename = $id . '_' . time() . '.' . $file->getClientOriginalExtension();
                $foto_path = $file->storeAs('pasien/foto', $filename, 'public');
            }

            $pasien = Pasien::create([
                'id_pasien' => $id,
                'nomor_rekam_medis' => $validated['nomor_rekam_medis'],
                'nik' => $validated['nik'],
                'nomor_identitas_lain' => $validated['nomor_identitas_lain'],
                'nama_lengkap' => $validated['nama_lengkap'],
                'nama_ibu_kandung' => $validated['nama_ibu_kandung'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'agama' => $validated['agama'],
                'suku' => $validated['suku'],
                'bahasa_dikuasai' => $validated['bahasa_dikuasai'],

                // Alamat KTP
                'alamat_lengkap' => $validated['alamat_lengkap'],
                'rt' => $validated['rt'],
                'rw' => $validated['rw'],
                'kelurahan_desa' => $validated['kelurahan_desa'],
                'kecamatan' => $validated['kecamatan'],
                'kota_kabupaten' => $validated['kota_kabupaten'],
                'provinsi' => $validated['provinsi'],
                'kode_pos' => $validated['kode_pos'],
                'negara' => $validated['negara'],

                // Alamat Domisili
                'alamat_domisili' => $validated['alamat_domisili'],
                'domisili_rt' => $validated['domisili_rt'],
                'domisili_rw' => $validated['domisili_rw'],
                'domisili_kelurahan_desa' => $validated['domisili_kelurahan_desa'],
                'domisili_kecamatan' => $validated['domisili_kecamatan'],
                'domisili_kota_kabupaten' => $validated['domisili_kota_kabupaten'],
                'domisili_provinsi' => $validated['domisili_provinsi'],
                'domisili_kode_pos' => $validated['domisili_kode_pos'],
                'domisili_negara' => $validated['domisili_negara'],

                // Kontak dan Data Lainnya
                'telepon_rumah' => $validated['telepon_rumah'],
                'telepon_seluler' => $validated['telepon_seluler'],
                'pendidikan' => $validated['pendidikan'],
                'pekerjaan' => $validated['pekerjaan'],
                'status_pernikahan' => $validated['status_pernikahan'],

                // File upload
                'foto_pasien_path' => $foto_path,
            ]);

            Swal::success([
                'title' => 'Success',
                'text' => 'Pasien baru berhasil ditambahkan',
                'icon' => 'success',
                'timer' => 3000,
            ]);

            return redirect()->route('show.pasien')->with('success', 'Pasien created successfully');
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat menyimpan data pasien!',
                'icon' => 'error',
                'timer' => 3000,
            ]);
            return redirect()
                ->back()
                ->withInput();
        }
    }

    public function store_kunjungan(Request $request)
    {
        $validated = $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
        ]);

        $cek_kunjungan = Kunjungan::where('id_pasien', $validated['id_pasien'])->count();

        $jenis_kunjungan = 'baru';
        if ($cek_kunjungan > 0) {
            $jenis_kunjungan = 'lama';
        }

        // cek kunjungan pasien hanya bisa satu kali tidak boleh lebih dari satu jika statusnya belum selesai
        $kunjungan_aktif = Kunjungan::where('id_pasien', $validated['id_pasien'])
            ->whereIn('status', ['dalam_pemeriksaan', 'menunggu'])
            ->first();

        if ($kunjungan_aktif) {
            Swal::info([
                'title' => 'Peringatan!',
                'text' => 'Pasien sedang dalam pemeriksaan. Silakan selesaikan pemeriksaan sebelumnya.',
                'icon' => 'warning',
            ]);
            return redirect()->back();
        }

        try {
            // id_kunjungan
            $id_kunjungan = 'KJG-' . time() . rand(100, 999);
            $kunjungan = Kunjungan::create([
                'id_kunjungan' => $id_kunjungan,
                'id_pasien' => $validated['id_pasien'],
                'tanggal_kunjungan' => now(),
                'waktu_kunjungan' => now()->format('H:i:s'),
                'jenis_kunjungan' => $jenis_kunjungan,
                'keluhan_utama' => null,
                'id_dokter' => $validated['id_dokter'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($kunjungan) {
                Swal::success([
                    'title' => 'Success',
                    'text' => 'Pasien telah di tambahkan ke antrian',
                    'icon' => 'success',
                    'timer' => 3000,
                ]);
                return redirect()->route('show.pasien')->with('success', 'Kunjungan created successfully');
            }
        } catch (\Throwable $th) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat menyimpan data kunjungan.' . $th->getMessage(),
                'icon' => 'error',
                'timer' => 3000,
            ]);
            return redirect()
                ->back();
        }

        return redirect()->back();
    }

    public function delete_pasien($id)
    {
        $pasien = Pasien::find($id);
        if (!$pasien) {
            return redirect()->route('show.pasien')->with('error', 'Pasien not found');
        }

        try {
            if ($pasien) {
                $pasien->delete();
                Swal::success([
                    'title' => 'Success',
                    'text' => 'Pasien berhasil dihapus',
                    'icon' => 'success',
                    'timer' => 3000,
                ]);
                return redirect()->route('show.pasien')->with('success', 'Pasien deleted successfully');
            }
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Tidak dapat menghapus pasien atau data pasien sedang digunakan',
            ]);
            return redirect()->route('show.pasien')->with('error', 'Failed to delete pasien');
        }
        return redirect()->route('show.pasien')->with('error', 'Pasien not found');
    }
    public function update_pasien(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        // dd($request->all());
        $validated = $request->validate([
            'nomor_rekam_medis' => 'required|string|unique:pasien,nomor_rekam_medis,' . $id . ',id_pasien',
            'nik' => 'nullable|string|max:16|unique:pasien,nik,' . $id . ',id_pasien',
            'nomor_identitas_lain' => 'nullable|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'nama_ibu_kandung' => 'nullable|string|max:100',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:0,1,2,3,4',
            'agama' => 'nullable|in:1,2,3,4,5,6,7',
            'suku' => 'nullable|string|max:50',
            'bahasa_dikuasai' => 'nullable|string|max:100',

            // Alamat KTP
            'alamat_lengkap' => 'required|string',
            'rt' => 'nullable|string|max:5',
            'rw' => 'nullable|string|max:5',
            'kelurahan_desa' => 'nullable|string|max:50',
            'kecamatan' => 'nullable|string|max:50',
            'kota_kabupaten' => 'nullable|string|max:50',
            'provinsi' => 'nullable|string|max:50',
            'kode_pos' => 'nullable|string|max:10',
            'negara' => 'nullable|string|max:50',

            // Alamat Domisili
            'alamat_domisili' => 'nullable|string',
            'domisili_rt' => 'nullable|string|max:5',
            'domisili_rw' => 'nullable|string|max:5',
            'domisili_kelurahan_desa' => 'nullable|string|max:50',
            'domisili_kecamatan' => 'nullable|string|max:50',
            'domisili_kota_kabupaten' => 'nullable|string|max:50',
            'domisili_provinsi' => 'nullable|string|max:50',
            'domisili_kode_pos' => 'nullable|string|max:10',
            'domisili_negara' => 'nullable|string|max:50',

            // Kontak dan Data Lainnya
            'telepon_rumah' => 'nullable|string|max:15',
            'telepon_seluler' => 'nullable|string|max:15',
            'pendidikan' => 'nullable|in:1,2,3,4,5,6,7,8',
            'pekerjaan' => 'nullable|in:0,1,2,3,4,5,6,7',
            'status_pernikahan' => 'nullable|in:1,2,3,4',

            // Upload file
            'foto_pasien_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nomor_rekam_medis.required' => 'Nomor Rekam Medis tidak boleh kosong',
            'nomor_rekam_medis.unique' => 'Nomor Rekam Medis sudah terdaftar',
            'nik.unique' => 'NIK sudah terdaftar',
            'nama_lengkap.required' => 'Nama Lengkap tidak boleh kosong',
            'alamat_lengkap.required' => 'Alamat Lengkap tidak boleh kosong',
            'domisili_rt.max' => 'RT maksimal 5 karakter',
            'domisili_rw.max' => 'RW maksimal 5 karakter',
            'rt.max' => 'RT maksimal 5 karakter',
            'rw.max' => 'RW maksimal 5 karakter',
            'kode_pos.max' => 'Kode Pos maksimal 10 karakter',
            'domisili_kode_pos.max' => 'Kode Pos maksimal 10 karakter',
            'nik.max' => 'NIK maksimal 16 karakter',
            'nomor_identitas_lain.max' => 'Nomor Identitas Lain maksimal 20 karakter',
            'suku.max' => 'Suku maksimal 50 karakter',
            'tempat_lahir.max' => 'Tempat Lahir maksimal 50 karakter',
            'nama_ibu_kandung.max' => 'Nama Ibu Kandung maksimal 100 karakter',
            'alamat_lengkap.max' => 'Alamat Lengkap maksimal 255 karakter',
            'alamat_domisili.max' => 'Alamat Domisili maksimal 255 karakter',
            'domisili_kelurahan_desa.max' => 'Domisili Kelurahan Desa maksimal 50 karakter',
            'domisili_kecamatan.max' => 'Domisili Kecamatan maksimal 50 karakter',
            'domisili_kota_kabupaten.max' => 'Domisili Kota/Kabupaten maksimal 50 karakter',
            'domisili_provinsi.max' => 'Domisili Provinsi maksimal 50 karakter',
            'domisili_negara.max' => 'Domisili Negara maksimal 50 karakter',
            'kelurahan_desa.max' => 'Kelurahan Desa maksimal 50 karakter',
            'kecamatan.max' => 'Kecamatan maksimal 50 karakter',
            'kota_kabupaten.max' => 'Kota/Kabupaten maksimal 50 karakter',
            'provinsi.max' => 'Provinsi maksimal 50 karakter',
            'negara.max' => 'Negara maksimal 50 karakter',
            'agama.in' => 'Agama tidak valid',
            'jenis_kelamin.in' => 'Jenis Kelamin tidak valid',
            'pendidikan.in' => 'Pendidikan tidak valid',
            'pekerjaan.in' => 'Pekerjaan tidak valid',
            'status_pernikahan.in' => 'Status Pernikahan tidak valid',
            'bahasa_dikuasai.max' => 'Bahasa Dikuasai maksimal 100 karakter',
            'suku.max' => 'Suku maksimal 50 karakter',
            'telepon_seluler.max' => 'Telepon Seluler maksimal 15 karakter',
            'telepon_rumah.max' => 'Telepon Rumah maksimal 15 karakter',

            // Validasi foto
            'foto_pasien_path.image' => 'File harus berupa gambar',
            'foto_pasien_path.mimes' => 'Format file harus jpeg, png, jpg, atau gif',
            'foto_pasien_path.max' => 'Ukuran file maksimal 2MB',
        ]);

        if (Auth::user()->role != 'petugas') {
            Swal::info([
                'title' => 'Info',
                'text' => 'Anda tidak memiliki akses untuk mengedit data pasien',
                'icon' => 'info'
            ]);
            return redirect()->back();
        }

        try {
            // Handle file upload
            $foto_path = $pasien->foto_pasien_path; // Keep existing photo if no new upload
            if ($request->hasFile('foto_pasien_path')) {
                // Delete old photo if exists
                if ($pasien->foto_pasien_path && Storage::disk('public')->exists($pasien->foto_pasien_path)) {
                    Storage::disk('public')->delete($pasien->foto_pasien_path);
                }

                $file = $request->file('foto_pasien_path');
                $filename = $pasien->id_pasien . '_' . time() . '.' . $file->getClientOriginalExtension();
                $foto_path = $file->storeAs('pasien/foto', $filename, 'public');
            }

            $pasien->update([
                'nomor_rekam_medis' => $validated['nomor_rekam_medis'],
                'nik' => $validated['nik'],
                'nomor_identitas_lain' => $validated['nomor_identitas_lain'],
                'nama_lengkap' => $validated['nama_lengkap'],
                'nama_ibu_kandung' => $validated['nama_ibu_kandung'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'agama' => $validated['agama'],
                'suku' => $validated['suku'],
                'bahasa_dikuasai' => $validated['bahasa_dikuasai'],

                // Alamat KTP
                'alamat_lengkap' => $validated['alamat_lengkap'],
                'rt' => $validated['rt'],
                'rw' => $validated['rw'],
                'kelurahan_desa' => $validated['kelurahan_desa'],
                'kecamatan' => $validated['kecamatan'],
                'kota_kabupaten' => $validated['kota_kabupaten'],
                'provinsi' => $validated['provinsi'],
                'kode_pos' => $validated['kode_pos'],
                'negara' => $validated['negara'],

                // Alamat Domisili
                'alamat_domisili' => $validated['alamat_domisili'],
                'domisili_rt' => $validated['domisili_rt'],
                'domisili_rw' => $validated['domisili_rw'],
                'domisili_kelurahan_desa' => $validated['domisili_kelurahan_desa'],
                'domisili_kecamatan' => $validated['domisili_kecamatan'],
                'domisili_kota_kabupaten' => $validated['domisili_kota_kabupaten'],
                'domisili_provinsi' => $validated['domisili_provinsi'],
                'domisili_kode_pos' => $validated['domisili_kode_pos'],
                'domisili_negara' => $validated['domisili_negara'],

                // Kontak dan Data Lainnya
                'telepon_rumah' => $validated['telepon_rumah'],
                'telepon_seluler' => $validated['telepon_seluler'],
                'pendidikan' => $validated['pendidikan'],
                'pekerjaan' => $validated['pekerjaan'],
                'status_pernikahan' => $validated['status_pernikahan'],

                // File upload
                'foto_pasien_path' => $foto_path,
            ]);

            Swal::success([
                'title' => 'Success',
                'text' => 'Data pasien berhasil diperbarui',
                'icon' => 'success',
                'timer' => 3000,
            ]);
            return redirect()->route('profile.pasien', $pasien->id_pasien)->with('success', 'Data pasien berhasil diperbarui');
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat memperbarui data pasien.',
                'icon' => 'error',
                'timer' => 3000,
            ]);
            return redirect()
                ->back()
                ->withInput();
        }
    }
}
