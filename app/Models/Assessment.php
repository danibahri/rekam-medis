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
        'anamnesa',
        'diagnosa',
        'kode_icd10',
        'denyut_jantung',
        'tekanan_darah',
        'suhu_tubuh',
        'pernafasan',
        'riwayat_penyakit',
        'riwayat_alergi',
        'detail_alergi',
        'riwayat_pengobatan',
        'bagian_tubuh_sakit',
        'detail_bagian_sakit',
    ];

    protected $casts = [
        'tanggal_assessment' => 'date',
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
}
