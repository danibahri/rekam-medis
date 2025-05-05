<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function show_pasien(){
        $data_pasien = Pasien::all();
        return view('pages.pasien.index', compact('data_pasien'));
    }

    public function add_pasien(){
        return view('pages.pasien.create');
    }
}
