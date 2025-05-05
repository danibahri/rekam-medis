<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetugasAdministrasi extends Model
{
    protected $table = 'petugas_administrasi';
    protected $primaryKey = 'id_petugas';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_petugas',
        'user_id',
        'nama_petugas',
        'alamat',
        'nomor_hp'
    ];
    
    // Relasi dengan tabel users
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}