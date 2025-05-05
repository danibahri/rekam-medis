<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralConsent extends Model
{
    protected $table = 'general_consent';
    protected $primaryKey = 'id_consent';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_consent',
        'id_pasien',
        'id_kunjungan',
        'tanggal',
        'waktu',
        'persetujuan_pasien',
        'informasi_pembayaran',
        'informasi_hak_kewajiban',
        'informasi_tata_tertib',
        'kebutuhan_penterjemah',
        'kebutuhan_rohaniawan',
        'pelepasan_informasi',
        'hasil_penunjang_penjamin',
        'hasil_penunjang_peserta_didik',
        'anggota_keluarga_penerima_info',
        'fasyankes_rujukan',
        'tanda_tangan_pasien_path',
        'penanggung_jawab',
        'petugas_pemberi_penjelasan'
    ];
    
    protected $casts = [
        'tanggal' => 'date',
    ];
    
    // Relasi dengan tabel pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel kunjungan
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
}