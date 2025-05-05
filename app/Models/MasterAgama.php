<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterAgama extends Model
{
    protected $table = 'master_agama';
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
        return $this->hasMany(Pasien::class, 'agama', 'id');
    }
}