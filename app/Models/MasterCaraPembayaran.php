<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterCaraPembayaran extends Model
{
    protected $table = 'master_cara_pembayaran';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'nama'
    ];
    
    // Relasi dengan tabel pasien
    public function pasien()
    {
        return $this->hasMany(Pasien::class, 'cara_pembayaran', 'id');
    }
    
    // Relasi dengan tabel kunjungan
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'cara_pembayaran', 'id');
    }
}