<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Models\Dokter;
use Barryvdh\DomPDF\Facade\Pdf;

class PelepasanController extends Controller
{
    public function index()
    {
        $pasien = Pasien::all();
        return view('pages.pelepasan.index', compact('pasien'));
    }

    public function show_pdf($id)
    {
        // Generate PDF for the specified patient
        $pasien = Pasien::findOrFail($id);
        $dokter = Dokter::get()->first();
        $pdf = Pdf::loadView('pages.pelepasan.surat-sakit', compact('pasien', 'dokter'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('surat-sakit.pdf');
    }

    public function persetujuan_pdf($id)
    {
        // Generate PDF for the patient consent form
        $pasien = Pasien::findOrFail($id);
        $dokter = Dokter::get()->first();
        $pdf = Pdf::loadView('pages.pelepasan.persetujuan-pasien', compact('pasien', 'dokter'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('persetujuan-pasien.pdf');
    }

    public function ringkasan_pdf($id)
    {
        // Generate PDF for the patient summary
        $pasien = Pasien::findOrFail($id);
        $dokter = Dokter::get()->first();
        $pdf = Pdf::loadView('pages.pelepasan.ringkasan-pulang', compact('pasien', 'dokter'));
        $pdf->setPaper('A4', 'portrait');
        return $pdf->stream('ringkasan-pulang.pdf');
    }
}
