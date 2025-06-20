<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\MasterJenisKelamin;


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

        $master_jeniskelamin = MasterJenisKelamin::all();

        return view('pages.pemeriksaan.index', compact('antrian', 'kunjungan', 'master_jeniskelamin'));
    }
}
