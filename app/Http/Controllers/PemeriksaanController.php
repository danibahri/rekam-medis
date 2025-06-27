<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\MasterJenisKelamin;
use App\Models\Dokter;
use App\Models\InformedConsent;
use App\Models\MasterCaraPembayaran;
use SweetAlert2\Laravel\Swal;
use App\Models\Pasien;
use App\Models\pembayaran;
use App\Models\Tindakan;
use App\Models\Resep;
use Barryvdh\DomPDF\Facade\Pdf;

class PemeriksaanController extends Controller
{
    public function index(Request $request)
    {
        $antrian = Kunjungan::whereIn('status', ['menunggu', 'dalam_pemeriksaan'])->get();
        // ubah status kunjungan yang sedang dalam pemeriksaan
        $kunjungan = Kunjungan::find($request->id);
        if ($kunjungan) {
            $kunjungan->status = 'dalam_pemeriksaan';
            $kunjungan->save();
        }

        $kunjungan = null;
        if ($request->id) {
            $kunjungan = Kunjungan::find($request->id);
        }

        // dokter yang sedang bertugas
        $dokter = Dokter::all()->first();

        $master_jeniskelamin = MasterJenisKelamin::all();
        $caraPembayaran = MasterCaraPembayaran::all();

        return view('pages.pemeriksaan.index', compact('antrian', 'kunjungan', 'master_jeniskelamin', 'dokter', 'caraPembayaran'));
    }

    public function store_pemeriksaan(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        $request->validate(
            [
                'anamnesa' => 'required|string|max:255',
                'diagnosa' => 'required|string|max:255',
                'icd_10' => 'required|string|max:255',
                'denyut_jantung' => 'nullable|string|max:50',
                'tekanan_darah' => 'nullable|string|max:50',
                'suhu_tubuh' => 'nullable|string|max:50',
                'riwayat_penyakit' => 'nullable|string|max:255',
                'riwayat_alergi' => 'nullable|string|max:255',
                'detail_alergi' => 'nullable|string|max:255',
                'riwayat_pengobatan' => 'nullable|string|max:255',
                'bagian_tubuh_sakit' => 'nullable|string|max:255',
                'detail_keluhan' => 'nullable|string|max:255',
                'active_tab' => 'required|string|max:255',
            ],
            [
                'anamnesa.required' => 'Anamnesa harus diisi.',
                'diagnosa.required' => 'Diagnosa harus diisi.',
                'icd_10.required' => 'Kode ICD-10 harus diisi.',
            ]
        );

        $id_assessment = 'AS-' . strtoupper(uniqid());

        try {
            Assessment::updateOrCreate(
                ['id_kunjungan' => $kunjungan->id_kunjungan],
                [
                    'id_assessment' => $id_assessment,
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'id_pasien' => $kunjungan->id_pasien,
                    'tanggal_assessment' => now(),
                    'anamnesa' => $request->anamnesa,
                    'diagnosa' => $request->diagnosa,
                    'kode_icd10' => $request->icd_10,
                    'denyut_jantung' => $request->denyut_jantung,
                    'tekanan_darah' => $request->tekanan_darah,
                    'suhu_tubuh' => $request->suhu_tubuh,
                    'riwayat_penyakit' => $request->riwayat_penyakit,
                    'riwayat_alergi' => $request->riwayat_alergi,
                    'detail_alergi' => $request->detail_alergi,
                    'riwayat_pengobatan' => $request->riwayat_pengobatan,
                    'bagian_tubuh_sakit' => $request->bagian_tubuh_sakit,
                    'detail_bagian_sakit' => $request->detail_keluhan,
                ]
            );

            Swal::success([
                'title' => 'Sukses',
                'text' => 'Pemeriksaan Klinis berhasil disimpan.',
            ]);

            return redirect()->back()->with('active_tab', $request->active_tab);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan pemeriksaan Klinis',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }

        return redirect()->back()->with('success', 'Pemeriksaan Klinis berhasil disimpan.');
    }

    public function store_informed(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        $request->validate(
            [
                'tindakan_dilakukan' => 'required|string|max:255',
                'penanggung_jawab' => 'required|string|max:255',
                'jenis_kelamin' => 'required',
                'hubungan_dengan_pasien' => 'required|string|max:255',
                'nomor_hp_penanggung_jawab' => 'nullable|string|max:20',
                'konsekuensi_tindakan' => 'required|string',
                'persetujuan' => 'required',
                'nama_saksi' => 'required|string|max:255',
                'penanggung_jawab_saksi' => 'required|string|max:255',
                'dpjp' => 'required|string|max:255',
                'active_tab' => 'required|string|max:255',
            ],
            [
                'tindakan_dilakukan.required' => 'Tindakan yang dilakukan harus diisi.',
                'penanggung_jawab.required' => 'Nama penanggung jawab harus diisi.',
                'jenis_kelamin.required' => 'Jenis kelamin penanggung jawab harus dipilih.',
                'hubungan_dengan_pasien.required' => 'Hubungan dengan pasien harus diisi.',
                'konsekuensi_tindakan.required' => 'Konsekuensi tindakan harus diisi.',
                'persetujuan.required' => 'Persetujuan harus diberikan.',
                'nama_saksi.required' => 'Nama saksi harus diisi.',
                'dpjp.required' => 'DPJP harus diisi.',
            ]
        );

        $id_informed = 'ICN-' . strtoupper(uniqid());
        try {
            InformedConsent::updateOrCreate(
                ['id_kunjungan' => $kunjungan->id_kunjungan],
                [
                    'id_informed_consent' => $id_informed,
                    'id_pasien' => $kunjungan->id_pasien,
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'tindakan_dilakukan' => $request->tindakan_dilakukan,
                    'nama_penanggung_jawab' => $request->penanggung_jawab,
                    'jenis_kelamin_penanggung_jawab' => $request->jenis_kelamin,
                    'hubungan_dengan_pasien' => $request->hubungan_dengan_pasien,
                    'nomor_hp_penanggung_jawab' => $request->nomor_hp_penanggung_jawab,
                    'konsekuensi_tindakan' => $request->konsekuensi_tindakan,
                    'persetujuan_tindakan' => $request->persetujuan,
                    'tanggal_penjelasan' => date('Y-m-d'),
                    'waktu_penjelasan' => date('H:i:s'),
                    'dokter_pemberi_penjelasan' => $request->dpjp,
                    'penerima_penjelasan' => $request->penanggung_jawab,
                    'nama_saksi' => $request->nama_saksi,
                    'penanggung_jawab_saksi' => $request->penanggung_jawab_saksi,
                    'dpjp' => $request->dpjp,
                ]
            );
            Swal::success([
                'title' => 'Sukses',
                'text' => 'Informed Consent berhasil disimpan.',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan informed consent',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }
    }

    public function store_terapi(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        $request->validate(
            [
                'nama_tindakan' => 'required|string|max:255',
                'kode_icd9' => 'required|string|max:50',
                'tanggal_tindakan' => 'required|date',
                'waktu_mulai' => 'required|date_format:H:i',
                'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
                'alat_medis' => 'nullable|string|max:255',
                'bmhp' => 'nullable|string|max:255',
                'konsekuensi_tindakan' => 'nullable|string|max:255',
                'obat_digunakan' => 'nullable|string|max:255',
                'aturan_penggunaan_obat' => 'nullable|string|max:255',
            ],
            [
                'nama_tindakan.required' => 'Nama tindakan harus diisi.',
                'kode_icd9.required' => 'Kode ICD-9 harus diisi.',
                'tanggal_tindakan.required' => 'Tanggal tindakan harus diisi.',
                'waktu_mulai.required' => 'Waktu mulai harus diisi.',
                'waktu_selesai.required' => 'Waktu selesai harus diisi.',
                'waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai.',
            ]
        );

        $id_terapi = 'TR-' . strtoupper(uniqid());
        try {
            Tindakan::updateOrCreate(
                ['id_kunjungan' => $kunjungan->id_kunjungan],
                [
                    'id_terapi' => $id_terapi,
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'id_pasien' => $kunjungan->id_pasien,
                    'nama_tindakan' => $request->nama_tindakan,
                    'kode_icd9' => $request->kode_icd9,
                    'tanggal_tindakan' => $request->tanggal_tindakan,
                    'waktu_mulai' => $request->waktu_mulai,
                    'waktu_selesai' => $request->waktu_selesai,
                    'alat_medis_digunakan' => $request->alat_medis,
                    'konsekuensi_tindakan' => $request->konsekuensi_tindakan,
                    'bmhp' => $request->bmhp,
                    'obat_digunakan' => $request->obat_digunakan,
                    'aturan_penggunaan_obat' => $request->aturan_penggunaan_obat,
                ]
            );

            Swal::success([
                'title' => 'Sukses',
                'text' => 'Terapi berhasil disimpan.',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan terapi',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }
    }

    public function store_resep(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        $request->validate(
            [
                'nama_obat' => 'required|string|max:255',
                'bentuk_sediaan' => 'required|string|max:255',
                'jumlah_obat' => 'required|string|max:100',
                'tanggal' => 'required|date',
                'waktu_resep' => 'required|date_format:H:i',
                'dosis_obat' => 'required|string|max:255',
                'frekuensi_interval' => 'required|string|max:255',
                'aturan_tambahan' => 'nullable|string|max:255',
                'catatan_resep' => 'nullable|string|max:500',
                'active_tab' => 'required|string|max:255',
            ],
            [
                'nama_obat.required' => 'Nama obat harus diisi.',
                'bentuk_sediaan.required' => 'Bentuk sediaan harus diisi.',
                'jumlah_obat.required' => 'Jumlah obat harus diisi.',
                'tanggal.required' => 'Tanggal resep harus diisi.',
                'waktu_resep.required' => 'Waktu resep harus diisi.',
                'dosis_obat.required' => 'Dosis obat harus diisi.',
                'frekuensi_interval.required' => 'Frekuensi interval harus diisi.',
            ]
        );

        // dd($request->all());

        $id_resep = 'RSP-' . strtoupper(uniqid());

        try {
            Resep::updateOrCreate(
                ['id_kunjungan' => $kunjungan->id_kunjungan],
                [
                    'id_resep' => $id_resep,
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'id_pasien' => $kunjungan->id_pasien,
                    'nama_obat' => $request->nama_obat,
                    'bentuk_sediaan' => $request->bentuk_sediaan,
                    'jumlah_obat' => $request->jumlah_obat,
                    'tanggal_resep' => $request->tanggal,
                    'waktu_resep' => $request->waktu_resep,
                    'dosis_obat_diberikan' => $request->dosis_obat,
                    'frekuensi_interval' => $request->frekuensi_interval,
                    'aturan_tambahan' => $request->aturan_tambahan,
                    'catatan_resep' => $request->catatan_resep,
                ]
            );

            Swal::success([
                'title' => 'Sukses',
                'text' => 'Resep berhasil disimpan.',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan resep',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }
    }

    public function store_pembayaran(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        if (!isset($kunjungan->assessment) || !isset($kunjungan->resep)) {
            Swal::info([
                'title' => 'Peringatan!',
                'text' => 'Pastikan Pemeriksaan Klinis dan Resep sudah diisi sebelum melakukan pembayaran.',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }

        $request->validate([
            'tanggal_pembayaran' => 'required|date',
            'waktu_pembayaran' => 'required|date_format:H:i',
            'jumlah' => 'required|string',
            'cara_pembayaran' => 'required',
            'status_pembayaran' => 'required|in:lunas,belum_lunas',
            'active_tab' => 'required'
        ], [
            'tanggal_pembayaran.required' => 'Tanggal pembayaran harus diisi.',
            'waktu_pembayaran.required' => 'Waktu pembayaran harus diisi.',
            'jumlah.required' => 'Jumlah pembayaran harus diisi.',
            'cara_pembayaran.required' => 'Cara pembayaran harus dipilih.',
            'status_pembayaran.required' => 'Status pembayaran harus dipilih.',
            'status_pembayaran.in' => 'Status pembayaran harus berupa "lunas" atau "belum_lunas".',
        ]);
        $id_pembayaran = 'PB-' . strtoupper(uniqid());

        try {
            $kunjungan->pembayaran()->updateOrCreate(
                ['id_kunjungan' => $kunjungan->id_kunjungan],
                [
                    'id_pembayaran' => $id_pembayaran,
                    'id_pasien' => $kunjungan->id_pasien,
                    'id_kunjungan' => $kunjungan->id_kunjungan,
                    'tanggal_pembayaran' => $request->tanggal_pembayaran,
                    'waktu_pembayaran' => $request->waktu_pembayaran,
                    'cara_pembayaran' => $request->cara_pembayaran,
                    'jumlah' => $request->jumlah,
                    'status_pembayaran' => $request->status_pembayaran,
                ]
            );

            Swal::success([
                'title' => 'Sukses',
                'text' => 'Pembayaran berhasil disimpan.',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyimpan pembayaran',
            ]);
            return redirect()->back()->with('active_tab', $request->active_tab);
        }
    }

    public function store_pembayaran_status(Request $request, $id)
    {
        $kunjungan = Kunjungan::find($id);
        if (!$kunjungan) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Kunjungan tidak ditemukan.',
            ]);
            return redirect()->back()->with('error', 'Kunjungan tidak ditemukan.');
        }

        if (!isset($kunjungan->pembayaran)) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Selesaikan pemeriksaan klinis dan resep sebelum melakukan pembayaran.',
            ]);
            return redirect()->back();
        }

        $request->validate([
            'id_kunjungan' => 'required|exists:kunjungan,id_kunjungan',
        ]);

        try {
            // Update status kunjungan
            $kunjungan->status = 'selesai';
            $status_kunjungan = $kunjungan->save();

            if ($status_kunjungan) {
                // Update status pembayaran
                $pembayaran = $kunjungan->pembayaran;
                $pembayaran->status_pembayaran = 'lunas';
                $pembayaran->save();

                Swal::success([
                    'title' => 'Sukses',
                    'text' => 'Pembayaran berhasil diselesaikan.',
                ]);
                return redirect()->back()->with('success', 'Pembayaran berhasil diselesaikan.');
            }
        } catch (\Exception $e) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Gagal menyelesaikan pembayaran: ' . $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'Gagal menyelesaikan pembayaran.');
        }
    }

    public function surat_tindakan($id)
    {
        // Generate PDF for the patient consent form
        $pasien = Kunjungan::findOrFail($id);
        $dokter = Dokter::get()->first();
        $pdf = Pdf::loadView('pages.pelepasan.tindakan-medis', compact('pasien', 'dokter'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('tindakan-medis.pdf');
    }
}
