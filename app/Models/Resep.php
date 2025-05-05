<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resep';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_resep';

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
        'id_resep',
        'id_pasien',
        'id_kunjungan',
        'tanggal_resep',
        'waktu_resep',
        'tinggi_badan',
        'berat_badan',
        'luas_permukaan_tubuh',
        'dokter_penulis',
        'nomor_telepon_dokter',
        'catatan_resep',
        'tanda_tangan_dokter_path',
        'pengkajian_resep',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_resep' => 'date',
        'waktu_resep' => 'datetime',
        'tinggi_badan' => 'integer',
        'berat_badan' => 'decimal:2',
        'luas_permukaan_tubuh' => 'decimal:2',
    ];

    /**
     * Get the pasien that owns the resep.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    /**
     * Get the kunjungan that owns the resep.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

    /**
     * Get the detail resep for this resep.
     */
    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_resep', 'id_resep');
    }
}