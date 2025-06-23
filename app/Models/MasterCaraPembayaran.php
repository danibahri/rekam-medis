<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterCaraPembayaran extends Model
{
    protected $table = 'master_cara_pembayaran';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'nama'
    ];

    // Relasi dengan tabel pembayaran
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'cara_pembayaran', 'id');
    }
}
