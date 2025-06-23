<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tindakan;
use App\Models\ResumePasien;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\Kunjungan;
use SweetAlert2\Laravel\Swal;

class LaporanController extends Controller
{
    public function index()
    {
        $kunjungan = Kunjungan::with(('pasien'))->orderBy('tanggal_kunjungan', 'desc')->get()->unique('id_pasien');
        return view('pages.laporan.index', compact('kunjungan'));
    }

    public function exportCsv()
    {
        $laporan = Kunjungan::with(('pasien'))->orderBy('tanggal_kunjungan', 'desc')->get()->unique('id_pasien');
        if ($laporan->isEmpty()) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Tidak ada data untuk diekspor.',
            ]);
            return redirect()->back()->with('error', 'Tidak ada data untuk diekspor.');
        }
        $filename = 'laporan_kunjungan_' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://temp', 'r+');

        // Header CSV
        fputcsv($handle, [
            'No. Rekam Medis',
            'Nama',
            'Tanggal Kunjungan',
            'Jenis Kelamin',
            'Diagnosa',
            'Kode ICD10',
            'Kode ICD9',
            'Jenis Pembayaran',
        ]);

        foreach ($laporan as $item) {
            fputcsv($handle, [
                $item->pasien->nomor_rekam_medis,
                $item->pasien->nama_lengkap,
                Carbon::parse($item->tanggal_kunjungan)->format('d-m-Y'),
                $item->pasien->jenisKelamin->nama ?? '-',
                $item->assessment->diagnosa ?? '-',
                $item->assessment->kode_icd10 ?? '-',
                $item->tindakan->kode_icd9 ?? '-',
                $item->pembayaran->caraPembayaran->nama ?? '-',
                'Rp ' . number_format($item->pembayaran->jumlah, 0, ',', '.'),
            ]);
        }

        rewind($handle);
        $csvContent = stream_get_contents($handle);
        fclose($handle);

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }
}
