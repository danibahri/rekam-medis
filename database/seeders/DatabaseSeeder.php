<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedMasterJenisKelamin();
        $this->seedMasterAgama();
        $this->seedMasterPendidikan();
        $this->seedMasterPekerjaan();
        $this->seedMasterStatusPernikahan();
        $this->seedMasterCaraPembayaran();
        $this->seedMasterDiagnosa();
        $this->seedKonfigurasiKlinik();
        $this->seedUsers();
        $this->seedDokter();
        $this->seedPetugasAdministrasi();
        $this->seedMasterObat();
        $this->seedPasien();
        $this->seedKunjungan();
    }

    /**
     * Seed master_jenis_kelamin table
     */
    private function seedMasterJenisKelamin(): void
    {
        DB::table('master_jenis_kelamin')->insert([
            ['id' => '0', 'nama' => 'Tidak diketahui Jenis kelamin pasien', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '1', 'nama' => 'Laki-laki', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'Perempuan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'Tidak dapat ditentukan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'nama' => 'Tidak mengisi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Seed master_agama table
     */
    private function seedMasterAgama(): void
    {
        DB::table('master_agama')->insert([
            ['id' => '1', 'nama' => 'Islam', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'Kristen (Protestan)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'Katolik', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'nama' => 'Hindu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '5', 'nama' => 'Budha', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '6', 'nama' => 'Konghucu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Seed master_pendidikan table
     */
    private function seedMasterPendidikan(): void
    {
        DB::table('master_pendidikan')->insert([
            ['id' => '1', 'nama' => 'Tidak sekolah', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'SD', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'SLTP sederajat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'nama' => 'SLTA sederajat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '5', 'nama' => 'D1-D3 sederajat', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '6', 'nama' => 'D4', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '7', 'nama' => 'S1', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '8', 'nama' => 'S2', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Seed master_pekerjaan table
     */
    private function seedMasterPekerjaan(): void
    {
        DB::table('master_pekerjaan')->insert([
            ['id' => '0', 'nama' => 'Tidak bekerja', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '1', 'nama' => 'PNS', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'TNI/POLRI', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'BUMN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'nama' => 'Pegawai Swasta/Wirausaha', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Seed master_status_pernikahan table
     */
    private function seedMasterStatusPernikahan(): void
    {
        DB::table('master_status_pernikahan')->insert([
            ['id' => '1', 'nama' => 'Belum Kawin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'Kawin', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'Cerai Hidup', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '4', 'nama' => 'Cerai Mati', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }

    /**
     * Seed master_cara_pembayaran table
     */
    private function seedMasterCaraPembayaran(): void
    {
        DB::table('master_cara_pembayaran')->insert([
            ['id' => '1', 'nama' => 'JKN', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '2', 'nama' => 'Mandiri', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => '3', 'nama' => 'Asuransi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
    
    /**
     * Seed master_diagnosa table with some sample ICD-10 codes
     */
    private function seedMasterDiagnosa(): void
    {
        DB::table('master_diagnosa')->insert([
            [
                'kode' => 'A00',
                'nama' => 'Cholera',
                'deskripsi' => 'An intestinal infection caused by Vibrio cholerae',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode' => 'E11',
                'nama' => 'Type 2 diabetes mellitus',
                'deskripsi' => 'A metabolic disorder characterized by high blood sugar and insulin resistance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode' => 'I10',
                'nama' => 'Essential (primary) hypertension',
                'deskripsi' => 'High blood pressure with no identifiable cause',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode' => 'J03.9',
                'nama' => 'Acute tonsillitis, unspecified',
                'deskripsi' => 'Inflammation of the tonsils',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'kode' => 'R50.9',
                'nama' => 'Fever, unspecified',
                'deskripsi' => 'Elevation of body temperature above normal range',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Seed konfigurasi_klinik table
     */
    private function seedKonfigurasiKlinik(): void
    {
        DB::table('konfigurasi_klinik')->insert([
            [
                'id' => 'KLN0001',
                'nama_klinik' => 'Klinik Sehat Sentosa',
                'alamat_klinik' => 'Jl. Kesehatan No. 123, Jakarta Selatan',
                'telepon' => '021-7654321',
                'email' => 'info@kliniksehatsentosa.com',
                'logo_path' => null,
                'kota' => 'Jakarta Selatan',
                'kode_pos' => '12345',
                'jam_operasional' => 'Senin-Jumat: 08:00-20:00, Sabtu: 08:00-15:00',
                'pimpinan' => 'dr. Budi Santoso, Sp.PD',
                'tanda_tangan_pimpinan_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed users table
     */
    private function seedUsers(): void
    {
        // Admin user
        DB::table('users')->insert([
            [
                'id' => 'USR001',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'nama' => 'Administrator',
                'alamat' => 'Jakarta',
                'nomor_hp' => '08123456789',
                'status' => true,
                'foto_path' => null,
                'tanda_tangan_path' => null,
                'last_login' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        // Dokter users
        DB::table('users')->insert([
            [
                'id' => 'USR002',
                'username' => 'dokter1',
                'password' => Hash::make('dokter123'),
                'role' => 'dokter',
                'nama' => 'dr. Ani Wijaya',
                'alamat' => 'Jl. Anggrek No. 45, Jakarta',
                'nomor_hp' => '081234567890',
                'status' => true,
                'foto_path' => null,
                'tanda_tangan_path' => null,
                'last_login' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 'USR003',
                'username' => 'dokter2',
                'password' => Hash::make('dokter123'),
                'role' => 'dokter',
                'nama' => 'dr. Rudi Hartono, Sp.PD',
                'alamat' => 'Jl. Mawar No. 78, Jakarta',
                'nomor_hp' => '081234567891',
                'status' => true,
                'foto_path' => null,
                'tanda_tangan_path' => null,
                'last_login' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);

        // Petugas administrasi users
        DB::table('users')->insert([
            [
                'id' => 'USR004',
                'username' => 'petugas1',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
                'nama' => 'Dina Sari',
                'alamat' => 'Jl. Melati No. 12, Jakarta',
                'nomor_hp' => '081234567892',
                'status' => true,
                'foto_path' => null,
                'tanda_tangan_path' => null,
                'last_login' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 'USR005',
                'username' => 'petugas2',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
                'nama' => 'Budi Setiawan',
                'alamat' => 'Jl. Dahlia No. 34, Jakarta',
                'nomor_hp' => '081234567893',
                'status' => true,
                'foto_path' => null,
                'tanda_tangan_path' => null,
                'last_login' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed dokter table
     */
    private function seedDokter(): void
    {
        DB::table('dokter')->insert([
            [
                'id_dokter' => 'DOK001',
                'user_id' => 'USR002',
                'nama_dokter' => 'dr. Ani Wijaya',
                'alamat' => 'Jl. Anggrek No. 45, Jakarta',
                'nomor_hp' => '081234567890',
                'spesialisasi' => 'Dokter Umum',
                'sip' => '123/SIP/DKI/2023',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_dokter' => 'DOK002',
                'user_id' => 'USR003',
                'nama_dokter' => 'dr. Rudi Hartono, Sp.PD',
                'alamat' => 'Jl. Mawar No. 78, Jakarta',
                'nomor_hp' => '081234567891',
                'spesialisasi' => 'Penyakit Dalam',
                'sip' => '124/SIP/DKI/2023',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed petugas_administrasi table
     */
    private function seedPetugasAdministrasi(): void
    {
        DB::table('petugas_administrasi')->insert([
            [
                'id_petugas' => 'PTG001',
                'user_id' => 'USR004',
                'nama_petugas' => 'Dina Sari',
                'alamat' => 'Jl. Melati No. 12, Jakarta',
                'nomor_hp' => '081234567892',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_petugas' => 'PTG002',
                'user_id' => 'USR005',
                'nama_petugas' => 'Budi Setiawan',
                'alamat' => 'Jl. Dahlia No. 34, Jakarta',
                'nomor_hp' => '081234567893',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed master_obat table
     */
    private function seedMasterObat(): void
    {
        DB::table('master_obat')->insert([
            [
                'id_obat' => 'OBT001',
                'nama_obat' => 'Paracetamol',
                'bentuk_sediaan' => 'Tablet',
                'satuan' => 'Strip',
                'stok' => 100,
                'harga' => 5000.00,
                'gambar_obat_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_obat' => 'OBT002',
                'nama_obat' => 'Amoxicillin',
                'bentuk_sediaan' => 'Kapsul',
                'satuan' => 'Strip',
                'stok' => 80,
                'harga' => 15000.00,
                'gambar_obat_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_obat' => 'OBT003',
                'nama_obat' => 'Omeprazole',
                'bentuk_sediaan' => 'Kapsul',
                'satuan' => 'Strip',
                'stok' => 50,
                'harga' => 20000.00,
                'gambar_obat_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_obat' => 'OBT004',
                'nama_obat' => 'Simvastatin',
                'bentuk_sediaan' => 'Tablet',
                'satuan' => 'Strip',
                'stok' => 60,
                'harga' => 25000.00,
                'gambar_obat_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_obat' => 'OBT005',
                'nama_obat' => 'Captopril',
                'bentuk_sediaan' => 'Tablet',
                'satuan' => 'Strip',
                'stok' => 70,
                'harga' => 18000.00,
                'gambar_obat_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }

    /**
     * Seed sample pasien (optional)
     */
    private function seedSamplePasien(): void
    {
        DB::table('pasien')->insert([
            [
                'id_pasien' => 'PSN001',
                'nomor_rekam_medis' => 'RM00001',
                'nik' => '3101012304870001',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Ahmad Rizaldi',
                'nama_ibu_kandung' => 'Siti Aminah',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1987-04-23',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia, Inggris',
                'alamat_lengkap' => 'Jl. Teratai No. 15',
                'rt' => '003',
                'rw' => '005',
                'kelurahan_desa' => 'Cempaka Putih',
                'kecamatan' => 'Cempaka Putih',
                'kota_kabupaten' => 'Jakarta Pusat',
                'kode_pos' => '10510',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Teratai No. 15',
                'domisili_rt' => '003',
                'domisili_rw' => '005',
                'domisili_kelurahan_desa' => 'Cempaka Putih',
                'domisili_kecamatan' => 'Cempaka Putih',
                'domisili_kota_kabupaten' => 'Jakarta Pusat',
                'domisili_kode_pos' => '10510',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-7654321',
                'telepon_seluler' => '08123456789',
                'pendidikan' => '7',
                'pekerjaan' => '4',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '2',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN002',
                'nomor_rekam_medis' => 'RM00002',
                'nik' => '3101015506900002',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Siti Nurhayati',
                'nama_ibu_kandung' => 'Wati Suryani',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-06-15',
                'jenis_kelamin' => '2',
                'agama' => '1',
                'suku' => 'Sunda',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Mawar No. 8',
                'rt' => '002',
                'rw' => '003',
                'kelurahan_desa' => 'Rawamangun',
                'kecamatan' => 'Pulogadung',
                'kota_kabupaten' => 'Jakarta Timur',
                'kode_pos' => '13220',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Mawar No. 8',
                'domisili_rt' => '002',
                'domisili_rw' => '003',
                'domisili_kelurahan_desa' => 'Rawamangun',
                'domisili_kecamatan' => 'Pulogadung',
                'domisili_kota_kabupaten' => 'Jakarta Timur',
                'domisili_kode_pos' => '13220',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => null,
                'telepon_seluler' => '081234567890',
                'pendidikan' => '5',
                'pekerjaan' => '1',
                'status_pernikahan' => '1',
                'cara_pembayaran' => '1',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN003',
                'nomor_rekam_medis' => 'RM00003',
                'nik' => '3101012212650003',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Edi Sutrisno',
                'nama_ibu_kandung' => 'Endang Susilowati',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1965-12-22',
                'jenis_kelamin' => '1',
                'agama' => '2',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Kenanga No. 42',
                'rt' => '005',
                'rw' => '008',
                'kelurahan_desa' => 'Johar Baru',
                'kecamatan' => 'Johar Baru',
                'kota_kabupaten' => 'Jakarta Pusat',
                'kode_pos' => '10560',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Kenanga No. 42',
                'domisili_rt' => '005',
                'domisili_rw' => '008',
                'domisili_kelurahan_desa' => 'Johar Baru',
                'domisili_kecamatan' => 'Johar Baru',
                'domisili_kota_kabupaten' => 'Jakarta Pusat',
                'domisili_kode_pos' => '10560',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-5556789',
                'telepon_seluler' => '08567891234',
                'pendidikan' => '4',
                'pekerjaan' => '3',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '3',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed sample kunjungan (optional)
     */
    private function seedSampleKunjungan(): void
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        
        DB::table('kunjungan')->insert([
            [
                'id_kunjungan' => 'KJN001',
                'id_pasien' => 'PSN001',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '09:30:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '2',
                'keluhan_utama' => 'Demam, batuk, pilek sejak 2 hari yang lalu',
                'id_dokter' => 'DOK001',
                'status' => 'selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kunjungan' => 'KJN002',
                'id_pasien' => 'PSN002',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '10:15:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '1',
                'keluhan_utama' => 'Nyeri perut bagian atas sejak semalam',
                'id_dokter' => 'DOK002',
                'status' => 'dalam_pemeriksaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kunjungan' => 'KJN003',
                'id_pasien' => 'PSN003',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '11:00:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '3',
                'keluhan_utama' => 'Kontrol tekanan darah tinggi',
                'id_dokter' => 'DOK002',
                'status' => 'menunggu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed pasien data
     */
    private function seedPasien(): void
    {
        DB::table('pasien')->insert([
            [
                'id_pasien' => 'PSN001',
                'nomor_rekam_medis' => 'RM00001',
                'nik' => '3101012304870001',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Ahmad Rizaldi',
                'nama_ibu_kandung' => 'Siti Aminah',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1987-04-23',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia, Inggris',
                'alamat_lengkap' => 'Jl. Teratai No. 15',
                'rt' => '003',
                'rw' => '005',
                'kelurahan_desa' => 'Cempaka Putih',
                'kecamatan' => 'Cempaka Putih',
                'kota_kabupaten' => 'Jakarta Pusat',
                'kode_pos' => '10510',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Teratai No. 15',
                'domisili_rt' => '003',
                'domisili_rw' => '005',
                'domisili_kelurahan_desa' => 'Cempaka Putih',
                'domisili_kecamatan' => 'Cempaka Putih',
                'domisili_kota_kabupaten' => 'Jakarta Pusat',
                'domisili_kode_pos' => '10510',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-7654321',
                'telepon_seluler' => '08123456789',
                'pendidikan' => '7',
                'pekerjaan' => '4',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '2',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN002',
                'nomor_rekam_medis' => 'RM00002',
                'nik' => '3101015506900002',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Siti Nurhayati',
                'nama_ibu_kandung' => 'Wati Suryani',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-06-15',
                'jenis_kelamin' => '2',
                'agama' => '1',
                'suku' => 'Sunda',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Mawar No. 8',
                'rt' => '002',
                'rw' => '003',
                'kelurahan_desa' => 'Rawamangun',
                'kecamatan' => 'Pulogadung',
                'kota_kabupaten' => 'Jakarta Timur',
                'kode_pos' => '13220',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Mawar No. 8',
                'domisili_rt' => '002',
                'domisili_rw' => '003',
                'domisili_kelurahan_desa' => 'Rawamangun',
                'domisili_kecamatan' => 'Pulogadung',
                'domisili_kota_kabupaten' => 'Jakarta Timur',
                'domisili_kode_pos' => '13220',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => null,
                'telepon_seluler' => '081234567890',
                'pendidikan' => '5',
                'pekerjaan' => '1',
                'status_pernikahan' => '1',
                'cara_pembayaran' => '1',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN003',
                'nomor_rekam_medis' => 'RM00003',
                'nik' => '3101012212650003',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Edi Sutrisno',
                'nama_ibu_kandung' => 'Endang Susilowati',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1965-12-22',
                'jenis_kelamin' => '1',
                'agama' => '2',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Kenanga No. 42',
                'rt' => '005',
                'rw' => '008',
                'kelurahan_desa' => 'Johar Baru',
                'kecamatan' => 'Johar Baru',
                'kota_kabupaten' => 'Jakarta Pusat',
                'kode_pos' => '10560',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Kenanga No. 42',
                'domisili_rt' => '005',
                'domisili_rw' => '008',
                'domisili_kelurahan_desa' => 'Johar Baru',
                'domisili_kecamatan' => 'Johar Baru',
                'domisili_kota_kabupaten' => 'Jakarta Pusat',
                'domisili_kode_pos' => '10560',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-5556789',
                'telepon_seluler' => '08567891234',
                'pendidikan' => '4',
                'pekerjaan' => '3',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '3',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN004',
                'nomor_rekam_medis' => 'RM00004',
                'nik' => '3101014507800004',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Maya Lestari',
                'nama_ibu_kandung' => 'Maimunah',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1980-07-05',
                'jenis_kelamin' => '2',
                'agama' => '1',
                'suku' => 'Melayu',
                'bahasa_dikuasai' => 'Indonesia, Inggris',
                'alamat_lengkap' => 'Jl. Anggrek No. 23',
                'rt' => '004',
                'rw' => '006',
                'kelurahan_desa' => 'Kebon Jeruk',
                'kecamatan' => 'Kebon Jeruk',
                'kota_kabupaten' => 'Jakarta Barat',
                'kode_pos' => '11530',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Anggrek No. 23',
                'domisili_rt' => '004',
                'domisili_rw' => '006',
                'domisili_kelurahan_desa' => 'Kebon Jeruk',
                'domisili_kecamatan' => 'Kebon Jeruk',
                'domisili_kota_kabupaten' => 'Jakarta Barat',
                'domisili_kode_pos' => '11530',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-5557890',
                'telepon_seluler' => '081234543210',
                'pendidikan' => '7',
                'pekerjaan' => '4',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '3',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN005',
                'nomor_rekam_medis' => 'RM00005',
                'nik' => '3101010102950005',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Budi Santoso',
                'nama_ibu_kandung' => 'Ratna Dewi',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-02-01',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'suku' => 'Betawi',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Melati No. 45',
                'rt' => '006',
                'rw' => '009',
                'kelurahan_desa' => 'Jatinegara',
                'kecamatan' => 'Jatinegara',
                'kota_kabupaten' => 'Jakarta Timur',
                'kode_pos' => '13310',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Melati No. 45',
                'domisili_rt' => '006',
                'domisili_rw' => '009',
                'domisili_kelurahan_desa' => 'Jatinegara',
                'domisili_kecamatan' => 'Jatinegara',
                'domisili_kota_kabupaten' => 'Jakarta Timur',
                'domisili_kode_pos' => '13310',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => null,
                'telepon_seluler' => '085678901234',
                'pendidikan' => '4',
                'pekerjaan' => '4',
                'status_pernikahan' => '1',
                'cara_pembayaran' => '2',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN006',
                'nomor_rekam_medis' => 'RM00006',
                'nik' => '3101017504600006',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Sri Rahayu',
                'nama_ibu_kandung' => 'Kartini',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1960-04-15',
                'jenis_kelamin' => '2',
                'agama' => '1',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia, Jawa',
                'alamat_lengkap' => 'Jl. Dahlia No. 12',
                'rt' => '002',
                'rw' => '005',
                'kelurahan_desa' => 'Menteng',
                'kecamatan' => 'Menteng',
                'kota_kabupaten' => 'Jakarta Pusat',
                'kode_pos' => '10310',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Dahlia No. 12',
                'domisili_rt' => '002',
                'domisili_rw' => '005',
                'domisili_kelurahan_desa' => 'Menteng',
                'domisili_kecamatan' => 'Menteng',
                'domisili_kota_kabupaten' => 'Jakarta Pusat',
                'domisili_kode_pos' => '10310',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-7891234',
                'telepon_seluler' => '081234789012',
                'pendidikan' => '3',
                'pekerjaan' => '0',
                'status_pernikahan' => '4',
                'cara_pembayaran' => '1',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN007',
                'nomor_rekam_medis' => 'RM00007',
                'nik' => '3101012509850007',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Agus Hermawan',
                'nama_ibu_kandung' => 'Sumiati',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1985-09-25',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Cendana No. 78',
                'rt' => '007',
                'rw' => '012',
                'kelurahan_desa' => 'Kebayoran Baru',
                'kecamatan' => 'Kebayoran Baru',
                'kota_kabupaten' => 'Jakarta Selatan',
                'kode_pos' => '12150',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Cendana No. 78',
                'domisili_rt' => '007',
                'domisili_rw' => '012',
                'domisili_kelurahan_desa' => 'Kebayoran Baru',
                'domisili_kecamatan' => 'Kebayoran Baru',
                'domisili_kota_kabupaten' => 'Jakarta Selatan',
                'domisili_kode_pos' => '12150',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => null,
                'telepon_seluler' => '085678123456',
                'pendidikan' => '7',
                'pekerjaan' => '1',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '2',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN008',
                'nomor_rekam_medis' => 'RM00008',
                'nik' => '3101011010920008',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Dewi Safitri',
                'nama_ibu_kandung' => 'Nur Hasanah',
                'tempat_lahir' => 'Tangerang',
                'tanggal_lahir' => '1992-10-10',
                'jenis_kelamin' => '2',
                'agama' => '1',
                'suku' => 'Sunda',
                'bahasa_dikuasai' => 'Indonesia, Inggris',
                'alamat_lengkap' => 'Jl. Gatot Subroto No. 32',
                'rt' => '005',
                'rw' => '007',
                'kelurahan_desa' => 'Kuningan',
                'kecamatan' => 'Setiabudi',
                'kota_kabupaten' => 'Jakarta Selatan',
                'kode_pos' => '12950',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Gatot Subroto No. 32',
                'domisili_rt' => '005',
                'domisili_rw' => '007',
                'domisili_kelurahan_desa' => 'Kuningan',
                'domisili_kecamatan' => 'Setiabudi',
                'domisili_kota_kabupaten' => 'Jakarta Selatan',
                'domisili_kode_pos' => '12950',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-8765432',
                'telepon_seluler' => '081234987654',
                'pendidikan' => '7',
                'pekerjaan' => '4',
                'status_pernikahan' => '2',
                'cara_pembayaran' => '3',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN009',
                'nomor_rekam_medis' => 'RM00009',
                'nik' => '3101010807700009',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Hendra Gunawan',
                'nama_ibu_kandung' => 'Siti Fatimah',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1970-07-08',
                'jenis_kelamin' => '1',
                'agama' => '1',
                'suku' => 'Jawa',
                'bahasa_dikuasai' => 'Indonesia',
                'alamat_lengkap' => 'Jl. Ahmad Yani No. 55',
                'rt' => '003',
                'rw' => '006',
                'kelurahan_desa' => 'Cawang',
                'kecamatan' => 'Kramat Jati',
                'kota_kabupaten' => 'Jakarta Timur',
                'kode_pos' => '13630',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Ahmad Yani No. 55',
                'domisili_rt' => '003',
                'domisili_rw' => '006',
                'domisili_kelurahan_desa' => 'Cawang',
                'domisili_kecamatan' => 'Kramat Jati',
                'domisili_kota_kabupaten' => 'Jakarta Timur',
                'domisili_kode_pos' => '13630',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => null,
                'telepon_seluler' => '081234567891',
                'pendidikan' => '5',
                'pekerjaan' => '3',
                'status_pernikahan' => '3',
                'cara_pembayaran' => '2',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_pasien' => 'PSN010',
                'nomor_rekam_medis' => 'RM00010',
                'nik' => '3101013003890010',
                'nomor_identitas_lain' => null,
                'nama_lengkap' => 'Linda Susanti',
                'nama_ibu_kandung' => 'Maryati',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1989-03-30',
                'jenis_kelamin' => '2',
                'agama' => '3',
                'suku' => 'Sunda',
                'bahasa_dikuasai' => 'Indonesia, Sunda',
                'alamat_lengkap' => 'Jl. Pemuda No. 67',
                'rt' => '004',
                'rw' => '008',
                'kelurahan_desa' => 'Rawamangun',
                'kecamatan' => 'Pulogadung',
                'kota_kabupaten' => 'Jakarta Timur',
                'kode_pos' => '13220',
                'provinsi' => 'DKI Jakarta',
                'negara' => 'Indonesia',
                'alamat_domisili' => 'Jl. Pemuda No. 67',
                'domisili_rt' => '004',
                'domisili_rw' => '008',
                'domisili_kelurahan_desa' => 'Rawamangun',
                'domisili_kecamatan' => 'Pulogadung',
                'domisili_kota_kabupaten' => 'Jakarta Timur',
                'domisili_kode_pos' => '13220',
                'domisili_provinsi' => 'DKI Jakarta',
                'domisili_negara' => 'Indonesia',
                'telepon_rumah' => '021-8642135',
                'telepon_seluler' => '087654321098',
                'pendidikan' => '7',
                'pekerjaan' => '4',
                'status_pernikahan' => '1',
                'cara_pembayaran' => '1',
                'foto_pasien_path' => null,
                'tanda_tangan_pasien_path' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Seed kunjungan data
     */
    private function seedKunjungan(): void
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        $yesterday = Carbon::now()->subDay()->format('Y-m-d');
        $lastWeek = Carbon::now()->subWeek()->format('Y-m-d');
        
        DB::table('kunjungan')->insert([
            [
                'id_kunjungan' => 'KJN001',
                'id_pasien' => 'PSN001',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '09:30:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '2',
                'keluhan_utama' => 'Demam, batuk, pilek sejak 2 hari yang lalu',
                'id_dokter' => 'DOK001',
                'status' => 'selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kunjungan' => 'KJN002',
                'id_pasien' => 'PSN002',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '10:15:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '1',
                'keluhan_utama' => 'Nyeri perut bagian atas sejak semalam',
                'id_dokter' => 'DOK002',
                'status' => 'dalam_pemeriksaan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kunjungan' => 'KJN003',
                'id_pasien' => 'PSN003',
                'tanggal_kunjungan' => $currentDate,
                'waktu_kunjungan' => '11:00:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '3',
                'keluhan_utama' => 'Kontrol tekanan darah tinggi',
                'id_dokter' => 'DOK002',
                'status' => 'menunggu',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id_kunjungan' => 'KJN004',
                'id_pasien' => 'PSN004',
                'tanggal_kunjungan' => $yesterday,
                'waktu_kunjungan' => '14:30:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '3',
                'keluhan_utama' => 'Sakit kepala dan mual sejak 3 hari yang lalu',
                'id_dokter' => 'DOK001',
                'status' => 'selesai',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay()
            ],
            [
                'id_kunjungan' => 'KJN005',
                'id_pasien' => 'PSN005',
                'tanggal_kunjungan' => $yesterday,
                'waktu_kunjungan' => '15:45:00',
                'jenis_kunjungan' => 'baru',
                'cara_pembayaran' => '2',
                'keluhan_utama' => 'Gatal-gatal pada kulit sejak 1 minggu',
                'id_dokter' => 'DOK001',
                'status' => 'selesai',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now()->subDay()
            ],
        ]);
    }

}