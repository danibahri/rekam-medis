<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tindakan;
use App\Models\Kunjungan;
use App\Models\ResumePasien;
use SweetAlert2\Laravel\Swal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kunjungan::with('pasien')
            ->where('status', 'selesai')
            ->orderBy('tanggal_kunjungan', 'desc');

        // Apply date range filter if provided
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_kunjungan', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal_kunjungan', '<=', $request->tanggal_selesai);
        }

        $kunjungan = $query->get()->unique('id_pasien');

        // Count visits with same date filter
        $countQuery = Kunjungan::select('id_pasien', \DB::raw('count(*) as total'))
            ->where('status', 'selesai');

        if ($request->filled('tanggal_mulai')) {
            $countQuery->whereDate('tanggal_kunjungan', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $countQuery->whereDate('tanggal_kunjungan', '<=', $request->tanggal_selesai);
        }

        $kunjunganCounts = $countQuery->groupBy('id_pasien')
            ->pluck('total', 'id_pasien')
            ->toArray();

        return view('pages.laporan.index', compact('kunjungan', 'kunjunganCounts'));
    }


    public function exportCsv(Request $request)
    {
        $query = Kunjungan::with('pasien')
            ->where('status', 'selesai')
            ->orderBy('tanggal_kunjungan', 'desc');

        // Apply same date range filter as index
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_kunjungan', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal_kunjungan', '<=', $request->tanggal_selesai);
        }

        $laporan = $query->get()->unique('id_pasien');

        if ($laporan->isEmpty()) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Tidak ada data untuk diekspor.',
            ]);
            return redirect()->back()->with('error', 'Tidak ada data untuk diekspor.');
        }

        $dateRange = '';
        if ($request->filled('tanggal_mulai') || $request->filled('tanggal_selesai')) {
            $dateRange = '_' . ($request->tanggal_mulai ?? 'start') . '_to_' . ($request->tanggal_selesai ?? 'end');
        }

        $filename = 'laporan_kunjungan' . $dateRange . '_' . now()->format('Ymd_His') . '.csv';
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
            'Biaya'
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
