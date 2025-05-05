<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Resep;

class DetailResep extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_resep';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_detail_resep';

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
        'id_detail_resep',
        'id_resep',
        'id_obat',
        'nama_obat',
        'bentuk_sediaan',
        'jumlah_obat',
        'metode_rute_pemberian',
        'dosis_obat',
        'frekuensi_interval',
        'aturan_tambahan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jumlah_obat' => 'integer',
    ];

    /**
     * Get the resep that owns the detail resep.
     */
    public function resep()
    {
        return $this->belongsTo(Resep::class, 'id_resep', 'id_resep');
    }

    /**
     * Get the obat for this detail resep.
     */
    public function obat()
    {
        return $this->belongsTo(MasterObat::class, 'id_obat', 'id_obat');
    }
}