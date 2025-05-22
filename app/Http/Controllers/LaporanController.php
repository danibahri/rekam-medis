<?php

namespace App\Http\Controllers;

use App\Models\ResumePasien;

use Illuminate\Http\Request;


class LaporanController extends Controller
{
    public function index()
    {   
        $laporan = ResumePasien::with('pasien','kunjungan')->get();
        return view('pages.laporan.index', compact('laporan'));
    }
}
