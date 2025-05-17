<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kunjungan;
use App\Models\Pasien;


class DashboardController extends Controller
{
    public function index()
    {
        // totol kunjungan
        $total_kunjungan = Kunjungan::count();

        // total kunjungan per hari
        $total_kunjungan_per_hari = Kunjungan::whereDate('created_at', now())->count();

        // total kunjungan per bulan
        $total_kunjungan_per_bulan = Kunjungan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // rata-rata kunjungan per hari
        $rata_rata_kunjungan_per_hari = Kunjungan::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count() / now()->daysInMonth;
        $rata_rata_kunjungan_per_hari = round($rata_rata_kunjungan_per_hari);
        
        // pasien baru
        $pasien_baru = Pasien::whereDate('created_at', now())->count();


        return view('pages.dashboard', compact('total_kunjungan', 'total_kunjungan_per_hari', 'total_kunjungan_per_bulan', 'rata_rata_kunjungan_per_hari', 'pasien_baru'));
    }
}
