<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonfigurasiKlinik extends Model
{
    protected $table = 'konfigurasi_klinik';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'nama_klinik',
        'alamat_klinik',
        'telepon',
        'email',
        'logo_path',
        'kota',
        'kode_pos',
        'jam_operasional',
        'pimpinan',
        'tanda_tangan_pimpinan_path'
    ];
}