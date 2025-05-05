<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPendidikan extends Model
{
    protected $table = 'master_pendidikan';
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
        return $this->hasMany(Pasien::class, 'pendidikan', 'id');
    }
}