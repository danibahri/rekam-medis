<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tindakan;
use App\Models\ResumePasien;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;


class LaporanController extends Controller
{
    public function index()
    {   
        $laporan = ResumePasien::with('pasien','kunjungan')->get();
        return view('pages.laporan.index', compact('laporan'));
    }

    public function exportCsv()
    {
        $laporan = ResumePasien::with('pasien', 'kunjungan')->get();

        $filename = 'laporan_kunjungan_' . now()->format('Ymd_His') . '.csv';
        $handle = fopen('php://temp', 'r+');

        // Header CSV
        fputcsv($handle, [
            'No. Rekam Medis', 'Nama', 'Tanggal Kunjungan', 'Jenis Kelamin',
            'Diagnosa', 'Kode ICD10', 'Tindakan', 'Kode ICD9',
            'Jenis Pembayaran', 'Biaya'
        ]);

        foreach ($laporan as $item) {
            $tindakan = Tindakan::where('id_pasien', $item->pasien->id_pasien)
                                ->pluck('nama_tindakan')
                                ->implode(', ');

            fputcsv($handle, [
                $item->pasien->nomor_rekam_medis,
                $item->pasien->nama_lengkap,
                Carbon::parse($item->tanggal_kunjungan)->format('d-m-Y'),
                $this->getJenisKelamin($item->pasien->jenis_kelamin),
                $item->diagnosa,
                $item->kode_icd10 ?? '-',
                $tindakan,
                $item->kode_icd ?? '-',
                $this->getJenisPembayaran($item->kunjungan->cara_pembayaran),
                'Rp ' . number_format($item->biaya, 0, ',', '.'),
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

    private function getJenisKelamin($kode)
    {
        return match ($kode) {
            1 => 'Laki-laki',
            2 => 'Perempuan',
            0 => 'Tidak Diketahui',
            3 => 'Tidak dapat ditentukan',
            4 => 'Tidak mengisi',
            default => '-',
        };
    }

    private function getJenisPembayaran($kode)
    {
        return match ($kode) {
            1 => 'Umum/Tunai',
            2 => 'BPJS Kesehatan',
            3 => 'JKN',
            4 => 'Asuransi Lainnya',
            default => '-',
        };
    }
}
