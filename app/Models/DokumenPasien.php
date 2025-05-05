<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPasien extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dokumen_pasien';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_dokumen';

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
        'id_dokumen',
        'id_pasien',
        'id_kunjungan',
        'jenis_dokumen',
        'nama_dokumen',
        'file_path',
        'keterangan',
        'uploaded_by',
    ];

    /**
     * Get the pasien that owns the dokumen.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    /**
     * Get the kunjungan that owns the dokumen.
     */
    public function kunjungan()
    {
        return $this->belongsTo(Kunjungan::class, 'id_kunjungan', 'id_kunjungan');
    }

    /**
     * Get the user who uploaded the document.
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by', 'id');
    }
}