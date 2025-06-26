<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $keyType = 'string';

    protected $fillable = [
        'id_pembayaran',
        'id_kunjungan',
        'id_pasien',
        'tanggal_pembayaran',
        'waktu_pembayaran',
        'cara_pembayaran',
        'jumlah',
        'status_pembayaran',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'date',
        'waktu_pembayaran' => 'datetime',
    ];

    // relasi ke tabel cara_pembayaran
    public function caraPembayaran()
    {
        return $this->belongsTo(MasterCaraPembayaran::class, 'cara_pembayaran', 'id');
    }

    // relasi ke tabel pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    // relasi ke tabel kunjungan
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
}
