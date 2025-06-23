<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformedConsent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'informed_consent';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_informed_consent';

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
        'id_informed_consent',
        'id_pasien',
        'id_kunjungan',
        'tindakan_dilakukan',
        'nama_penanggung_jawab',
        'jenis_kelamin_penanggung_jawab',
        'hubungan_dengan_pasien',
        'nomor_hp_penanggung_jawab',
        'konsekuensi_tindakan',
        'persetujuan_tindakan',
        'tanggal_penjelasan',
        'waktu_penjelasan',
        'dokter_pemberi_penjelasan',
        'penerima_penjelasan',
        'nama_saksi',
        'penanggung_jawab_saksi',
        'dpjp'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_penjelasan' => 'date',
        'waktu_penjelasan' => 'datetime',
    ];

    /**
     * Get the pasien that owns the informed consent.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    /**
     * Get the kunjungan that owns the informed consent.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }
}
