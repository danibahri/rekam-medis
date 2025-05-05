<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterStatusPernikahan extends Model
{
    protected $table = 'master_status_pernikahan';
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
        return $this->hasMany(Pasien::class, 'status_pernikahan', 'id');
    }
}