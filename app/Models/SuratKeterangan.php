<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeterangan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'surat_keterangan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_surat';

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
        'id_surat',
        'id_pasien',
        'id_kunjungan',
        'jenis_surat',
        'tanggal_surat',
        'tujuan_surat',
        'diagnosa',
        'kode_icd',
        'lama_istirahat',
        'tanggal_mulai',
        'tanggal_selesai',
        'hasil_pemeriksaan',
        'kesimpulan',
        'dokter_pemeriksa',
        'tanda_tangan_dokter_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'lama_istirahat' => 'integer',
    ];

    /**
     * Get the pasien that owns the surat.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    /**
     * Get the kunjungan that owns the surat.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

    /**
     * Get the diagnosa for this surat.
     */
    public function masterDiagnosa()
    {
        return $this->belongsTo(MasterDiagnosa::class, 'kode_icd', 'kode');
    }
}