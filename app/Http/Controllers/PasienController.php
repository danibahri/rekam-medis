<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use RealRashid\SweetAlert\Facades\Alert;

class PasienController extends Controller
{
    public function show_pasien(){
        $data_pasien = Pasien::all();
        return view('pages.pasien.index', compact('data_pasien'));
    }

    public function add_pasien(){
        return view('pages.pasien.create');
    }

    public function delete_pasien($id){
        $pasien = Pasien::find($id);
        if ($pasien) {
            $pasien->delete();
            Alert::success('Berhasil', 'Data Pasien Berhasil Dihapus');
            return redirect()->route('show.pasien')->with('success', 'Pasien deleted successfully');
        }
        Alert::error('Gagal', 'Data Pasien Gagal Dihapus');
        return redirect()->route('show.pasien')->with('error', 'Pasien not found');
    }
}
