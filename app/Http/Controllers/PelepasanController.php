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
}
