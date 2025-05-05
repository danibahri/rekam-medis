<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterObat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'master_obat';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_obat';

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
        'id_obat',
        'nama_obat',
        'bentuk_sediaan',
        'satuan',
        'stok',
        'harga',
        'gambar_obat_path',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'stok' => 'integer',
        'harga' => 'decimal:2',
    ];

    /**
     * Get the detail resep that contains this obat.
     */
    public function detailResep()
    {
        return $this->hasMany(DetailResep::class, 'id_obat', 'id_obat');
    }
}