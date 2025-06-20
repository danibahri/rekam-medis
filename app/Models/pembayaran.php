<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pembayaran',
        'id_kunjungan',
        'id_pasien',
        'tanggal_pembayaran',
        'waktu_pembayaran',
        'jumlah',
        'status_pembayaran',
    ];
}
