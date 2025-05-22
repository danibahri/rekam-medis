<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterDiagnosa extends Model
{
    protected $table = 'master_diagnosa';
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'kode',
        'nama',
        'deskripsi'
    ];
    
    // Relasi dengan tabel resume_pasien
    public function resumePasien()
    {
        return $this->hasMany(ResumePasien::class, 'kode_diagnosa', 'kode');
    }
    
    // Relasi dengan tabel surat_keterangan
    public function suratKeterangan()
    {
        return $this->hasMany(SuratKeterangan::class, 'kode_diagnosa', 'kode');
    }
}