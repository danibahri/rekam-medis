<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $table = 'assessment';
    protected $primaryKey = 'id_assessment';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_assessment',
        'id_kunjungan',
        'id_pasien',
        'tanggal_assessment',
        'keluhan_utama',
        'denyut_jantung',
        'pernafasan',
        'tekanan_darah',
        'suhu_tubuh',
        'riwayat_penyakit',
        'bagian_tubuh_sakit',
        'riwayat_alergi',
        'detail_alergi',
        'riwayat_pengobatan',
        'id_dokter'
    ];
    
    protected $casts = [
        'tanggal_assessment' => 'date',
        'suhu_tubuh' => 'decimal:2',
    ];
    
    // Relasi dengan tabel kunjungan
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
    
    // Relasi dengan tabel pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }
}