<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $primaryKey = 'id_pasien';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'id_pasien',
        'nomor_rekam_medis',
        'nik',
        'nomor_identitas_lain',
        'nama_lengkap',
        'nama_ibu_kandung',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'suku',
        'bahasa_dikuasai',
        'alamat_lengkap',
        'rt',
        'rw',
        'kelurahan_desa',
        'kecamatan',
        'kota_kabupaten',
        'kode_pos',
        'provinsi',
        'negara',
        'alamat_domisili',
        'domisili_rt',
        'domisili_rw',
        'domisili_kelurahan_desa',
        'domisili_kecamatan',
        'domisili_kota_kabupaten',
        'domisili_kode_pos',
        'domisili_provinsi',
        'domisili_negara',
        'telepon_rumah',
        'telepon_seluler',
        'pendidikan',
        'pekerjaan',
        'status_pernikahan',
        'cara_pembayaran',
        'foto_pasien_path',
        'tanda_tangan_pasien_path'
    ];
    
    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
    
    // Relasi dengan tabel master_jenis_kelamin
    public function jenisKelamin()
    {
        return $this->belongsTo(MasterJenisKelamin::class, 'jenis_kelamin', 'id');
    }
    
    // Relasi dengan tabel master_agama
    public function agama()
    {
        return $this->belongsTo(MasterAgama::class, 'agama', 'id');
    }
    
    // Relasi dengan tabel master_pendidikan
    public function pendidikan()
    {
        return $this->belongsTo(MasterPendidikan::class, 'pendidikan', 'id');
    }
    
    // Relasi dengan tabel master_pekerjaan
    public function pekerjaan()
    {
        return $this->belongsTo(MasterPekerjaan::class, 'pekerjaan', 'id');
    }
    
    // Relasi dengan tabel master_status_pernikahan
    public function statusPernikahan()
    {
        return $this->belongsTo(MasterStatusPernikahan::class, 'status_pernikahan', 'id');
    }
    
    // Relasi dengan tabel master_cara_pembayaran
    public function caraPembayaran()
    {
        return $this->belongsTo(MasterCaraPembayaran::class, 'cara_pembayaran', 'id');
    }
    
    // Relasi dengan tabel kunjungan
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel assessment
    public function assessment()
    {
        return $this->hasMany(Assessment::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel general_consent
    public function generalConsent()
    {
        return $this->hasMany(GeneralConsent::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel informed_consent
    public function informedConsent()
    {
        return $this->hasMany(InformedConsent::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel tindakan
    public function tindakan()
    {
        return $this->hasMany(Tindakan::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel resume_pasien
    public function resumePasien()
    {
        return $this->hasMany(ResumePasien::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel resep
    public function resep()
    {
        return $this->hasMany(Resep::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel surat_keterangan
    public function suratKeterangan()
    {
        return $this->hasMany(SuratKeterangan::class, 'id_pasien', 'id_pasien');
    }
    
    // Relasi dengan tabel dokumen_pasien
    public function dokumenPasien()
    {
        return $this->hasMany(DokumenPasien::class, 'id_pasien', 'id_pasien');
    }
}