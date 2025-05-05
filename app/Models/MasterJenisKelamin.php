<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterJenisKelamin extends Model
{
    protected $table = 'master_jenis_kelamin';
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
        return $this->hasMany(Pasien::class, 'jenis_kelamin', 'id');
    }
}