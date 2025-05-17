<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use SweetAlert2\Laravel\Swal;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class GeneralController extends Controller
{
    public function swow_general($id)
    {   
        $id = $id;
        $pasien = Pasien::find($id);
        // dd($pasien);
        if (!$pasien) {
            Swal::error([
                'title' => 'Error',
                'text' => 'Pasien tidak ditemukan',
                'icon' => 'error',
                'timer' => 3000,
                'showConfirmButton' => false,
            ]);
            return redirect()->back()->with('error', 'Pasien not found');
        }
        
        switch ($pasien->jenis_kelamin) {
            case 1:
                $jenis_kelamin = 'Laki-laki';
                break;
            case 2:
                $jenis_kelamin = 'Perempuan';
                break;
            case 3:
                $jenis_kelamin = 'Tidak dapat ditentukan';
                break;
            case 4:
                $jenis_kelamin = 'Tidak mengisi';
                break;
            default:
                $jenis_kelamin = 'Tidak diketahui Jenis kelamin pasien';
                break;
            }
        return view('pages.general.index', compact('pasien', 'jenis_kelamin'));
    }

    public function download_pdf()
    {
        $filePath = 'public/pdf/general.pdf';
        return Storage::download($filePath, 'general.pdf');
    }

    public function view_pdf()
    {
        // dd(Storage::exists('example.txt'));
        $filePath = 'example.txt';
        if (!Storage::exists($filePath)) {
            abort(404, 'File not found.');
        }

        $file = Storage::get($filePath);
        return new Response($file, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="general.pdf"'
        ]);
    }
}
