<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Illuminate\Http\Request;
use App\Models\Pasien;
use SweetAlert2\Laravel\Swal;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class GeneralController extends Controller
{
    public function index($id)
    {   
        $id = $id;
        $pasien = Pasien::find($id);
        if (!$pasien) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Pasien tidak ditemukan',
                'icon' => 'error',
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('error', 'Pasien not found');
        }
        
        switch ($pasien->jenis_kelamin) {
            case 1:
                $jenis_kelamin = 'Laki-laki';
                break;
            case 2:
                $jenis_kelamin = 'Perempuan';
                break;
            case 3:
                $jenis_kelamin = 'Tidak dapat ditentukan';
                break;
            case 4:
                $jenis_kelamin = 'Tidak mengisi';
                break;
            default:
                $jenis_kelamin = 'Tidak diketahui Jenis kelamin pasien';
                break;
            }
        return view('pages.general.index', compact('pasien', 'jenis_kelamin'));
    }

    public function store_general(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'nama_lengkap' => 'required|string|max:255',
            'nomor_rekam_medis' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'fasyankes_rujukan' => 'required',
            'tanda_tangan_pasien_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'persetujuan_pasien' => 'required',
            'penanggung_jawab' => 'required|string|max:255',
            'petugas_pemberi_penjelasan' => 'required|string|max:255',
        ],
        [
        'id_pasien.required' => 'ID Pasien wajib diisi',
        'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
        'nomor_rekam_medis.required' => 'Nomor Rekam Medis wajib diisi',
        'tanda_tangan_pasien_path.required' => 'Tanda Tangan Pasien wajib diisi',
        'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
        'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
        'penanggung_jawab.required' => 'Penanggung Jawab wajib diisi',
        'fasyankes_rujukan.required' => 'Fasyankes Rujukan wajib diisi',
        'persetujuan_pasien.required' => 'Persetujuan Pasien wajib diisi',
        'petugas_pemberi_penjelasan.required' => 'Petugas Pemberi Penjelasan wajib diisi',

        ]);

        try {
            // 1. Upload File TTD
            if ($request->hasFile('tanda_tangan_pasien_path')) {
                $file = $request->file('tanda_tangan_pasien_path');
                $filename = uniqid('ttd_') . '.' . $file->getClientOriginalExtension();
                $storedPath = $file->storeAs('public/ttd', $filename);
                $path = Storage::url($storedPath); // hasil: /storage/ttd/ttd_xxx.jpg
            } else {
                return redirect()->back()->with('error', 'File tanda tangan pasien tidak ditemukan');
            }

            // 2. Simpan Data Kunjungan
            $id_kunjungan = 'KJG-' . time() . rand(100, 999);
            $kunjungan = Kunjungan::create([
                'id_kunjungan' => $id_kunjungan,
                'id_pasien' => $request->id_pasien,
                'nama_lengkap' => $request->nama_lengkap,
                'tanggal_kunjungan' => now()->format('Y-m-d'),
                'waktu_kunjungan' => now()->format('H:i:s'),
                'jenis_kunjungan' => 'Baru',
                'cara_pembayaran' => null,
                'keluhan_utama' => null,
                'id_dokter' => null,
                'status' => 'menunggu',
            ]);

            // 3. Simpan Consent jika kunjungan berhasil
            if ($kunjungan) {
                $id_general = 'GCN-' . time() . rand(100, 999);
                $kunjungan->generalConsent()->create([
                    'id_consent' => $id_general,
                    'id_pasien' => $request->id_pasien,
                    'id_kunjungan' => $id_kunjungan,
                    'tanggal' => now()->format('Y-m-d'),
                    'waktu' => now()->format('H:i:s'),
                    'persetujuan_pasien' => $request->persetujuan_pasien,
                    'fasyankes_rujukan' => $request->fasyankes_rujukan,
                    'tanda_tangan_pasien_path' => $path, // Simpan URL publik
                    'penanggung_jawab' => $request->penanggung_jawab,
                    'petugas_pemberi_penjelasan' => $request->petugas_pemberi_penjelasan,
                ]);
                Swal::success([
                    'title' => 'Success',
                    'icon' => 'success',
                    'text' => 'Data berhasil disimpan',
                    'confirmButtonText' => 'OK',
                    'timer' => 3000,
                    'showConfirmButton' => false,
                ]);
                return redirect()->back()->with('success', 'Data berhasil disimpan');
            }
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan data kunjungan',
                'confirmButtonText' => 'OK',
                'icon' => 'error',
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('error', 'Gagal menyimpan data kunjungan');

        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat menyimpan data.',
                'icon' => 'error',
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    public function download_pdf()
    {
        $filePath = 'public/pdf/general.pdf';
        return Storage::download($filePath, 'general.pdf');
    }

    public function view_pdf()
    {
        // dd(Storage::exists('example.txt'));
        $filePath = 'example.txt';
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found.');
        }

        $file = Storage::get($filePath);
        return new Response($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="general.pdf"'
        ]);
    }
}
