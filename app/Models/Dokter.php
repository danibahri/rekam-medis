<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_dokter',
        'user_id',
        'nama_dokter',
        'alamat',
        'nomor_hp',
        'spesialisasi',
        'sip'
    ];

    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi dengan tabel kunjungan
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_dokter', 'id_dokter');
    }

    // Relasi dengan tabel assessment
    public function assessment()
    {
        return $this->hasMany(Assessment::class, 'id_dokter', 'id_dokter');
    }
}
