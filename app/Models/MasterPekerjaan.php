<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPekerjaan extends Model
{
    protected $table = 'master_pekerjaan';
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
        return $this->hasMany(Pasien::class, 'pekerjaan', 'id');
    }
}