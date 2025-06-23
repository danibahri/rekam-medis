<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kunjungan extends Model
{
    protected $table = 'kunjungan';
    protected $primaryKey = 'id_kunjungan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kunjungan',
        'id_pasien',
        'tanggal_kunjungan',
        'waktu_kunjungan',
        'jenis_kunjungan',
        'keluhan_utama',
        'id_dokter',
        'status'
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];

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

    // Relasi dengan tabel assessment
    public function assessment()
    {
        return $this->hasOne(Assessment::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel general_consent
    public function generalConsent()
    {
        return $this->hasOne(GeneralConsent::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel informed_consent
    public function informedConsent()
    {
        return $this->hasOne(InformedConsent::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel tindakan
    public function tindakan()
    {
        return $this->hasOne(Tindakan::class, 'id_kunjungan', 'id_kunjungan');
    }

    // realasi ke pembayaran
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel resume_pasien
    public function resumePasien()
    {
        return $this->hasOne(ResumePasien::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel resep
    public function resep()
    {
        return $this->hasOne(Resep::class, 'id_kunjungan', 'id_kunjungan');
    }

    // Relasi dengan tabel dokumen_pasien
    public function dokumenPasien()
    {
        return $this->hasMany(DokumenPasien::class, 'id_kunjungan', 'id_kunjungan');
    }
}
