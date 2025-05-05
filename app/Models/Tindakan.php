<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tindakan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_tindakan';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tindakan',
        'id_pasien',
        'id_kunjungan',
        'nama_tindakan',
        'petugas_pelaksana',
        'tanggal_tindakan',
        'waktu_mulai',
        'waktu_selesai',
        'alat_medis_digunakan',
        'bmhp',
        'catatan',
        'dokumentasi_tindakan_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_tindakan' => 'date',
        'waktu_mulai' => 'datetime',
        'waktu_selesai' => 'datetime',
    ];

    /**
     * Get the pasien that owns the tindakan.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    /**
     * Get the kunjungan that owns the tindakan.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
}