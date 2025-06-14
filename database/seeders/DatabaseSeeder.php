<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Master Jenis Kelamin
        DB::table('master_jenis_kelamin')->insert([
            ['id' => '0', 'nama' => 'Tidak diketahui Jenis kelamin pasien', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '1', 'nama' => 'Laki-laki', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'Perempuan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'Tidak dapat ditentukan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'Tidak mengisi', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Master Agama
        DB::table('master_agama')->insert([
            ['id' => '1', 'nama' => 'Islam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'Kristen', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'Katolik', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'Hindu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'nama' => 'Buddha', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'nama' => 'Konghucu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'nama' => 'Lainnya', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Master Pendidikan
        DB::table('master_pendidikan')->insert([
            ['id' => '1', 'nama' => 'Tidak Sekolah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'SD', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'SMP', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'SMA/SMK', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'nama' => 'D1-D3 Sederajat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'nama' => 'D4', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'nama' => 'S1', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '8', 'nama' => 'S2', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Master Pekerjaan
        DB::table('master_pekerjaan')->insert([
            ['id' => '0', 'nama' => 'Belum/Tidak Bekerja', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '1', 'nama' => 'Pelajar/Mahasiswa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'PNS', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'TNI/POLRI', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'BUMN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '5', 'nama' => 'Swasta', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '6', 'nama' => 'Wiraswasta', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '7', 'nama' => 'Pensiunan', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Master Status Pernikahan
        DB::table('master_status_pernikahan')->insert([
            ['id' => '1', 'nama' => 'Belum Menikah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'Menikah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'Cerai Hidup', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'Cerai Mati', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed Master Cara Pembayaran
        DB::table('master_cara_pembayaran')->insert([
            ['id' => '1', 'nama' => 'Umum/Tunai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '2', 'nama' => 'BPJS Kesehatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '3', 'nama' => 'JKN', 'created_at' => now(), 'updated_at' => now()],
            ['id' => '4', 'nama' => 'Asuransi Lainnya', 'created_at' => now(), 'updated_at' => now()],
        ]);


        // Seed Konfigurasi Klinik
        DB::table('konfigurasi_klinik')->insert([
            'id' => 'KLN-001',
            'nama_klinik' => 'Klinik Sehat Sentosa',
            'alamat_klinik' => 'Jl. Merdeka No. 123, Kelurahan Sukajadi',
            'telepon' => '0217654321',
            'email' => 'info@kliniksehatsentosa.com',
            'logo_path' => 'storage/logo/logo-klinik.png',
            'kota' => 'Jakarta',
            'kode_pos' => '12345',
            'jam_operasional' => 'Senin-Sabtu: 08.00-20.00, Minggu: 09.00-16.00',
            'pimpinan' => 'Dr. Indah Yuliarini, Sp.',
            'tanda_tangan_pimpinan_path' => 'storage/tanda_tangan/pimpinan.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Users
        $adminUserId = 'USR-' . date('Ymd') . '001';
        $dokterUserId = 'USR-' . date('Ymd') . '002';
        $petugasUserId = 'USR-' . date('Ymd') . '003';

        DB::table('users')->insert([
            [
                'id' => $adminUserId,
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'nama' => 'Administrator',
                'alamat' => 'Jl. Admin No. 1',
                'nomor_hp' => '08123456789',
                'status' => true,
                'foto_path' => 'storage/foto/admin.jpg',
                'tanda_tangan_path' => 'storage/tanda_tangan/admin.png',
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => $dokterUserId,
                'username' => 'dokter',
                'password' => Hash::make('dokter123'),
                'role' => 'dokter',
                'nama' => 'Dr. Indah Yuliarini, Sp.',
                'alamat' => 'Jl. Dokter No. 1',
                'nomor_hp' => '08234567890',
                'status' => true,
                'foto_path' => 'storage/foto/dokter.jpg',
                'tanda_tangan_path' => 'storage/tanda_tangan/dokter.png',
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => $petugasUserId,
                'username' => 'petugas',
                'password' => Hash::make('petugas123'),
                'role' => 'petugas',
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Petugas No. 1',
                'nomor_hp' => '08345678901',
                'status' => true,
                'foto_path' => 'storage/foto/petugas.jpg',
                'tanda_tangan_path' => 'storage/tanda_tangan/petugas.png',
                'last_login' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed Dokter
        DB::table('dokter')->insert([
            'id_dokter' => 'DOK-' . date('Ymd') . '001',
            'user_id' => $dokterUserId,
            'nama_dokter' => 'Dr. Indah Yuliarini, Sp. THT-KL',
            'alamat' => 'Jl. Dokter No. 1',
            'nomor_hp' => '08234567890',
            'spesialisasi' => 'Spesialis Penyakit Dalam',
            'sip' => 'SIP-123/2023',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Petugas Administrasi
        DB::table('petugas_administrasi')->insert([
            'id_petugas' => 'PTG-' . date('Ymd') . '001',
            'user_id' => $petugasUserId,
            'nama_petugas' => 'Budi Santoso',
            'alamat' => 'Jl. Petugas No. 1',
            'nomor_hp' => '08345678901',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Pasien
        $pasienId = 'PSN-' . date('Ymd') . '001';
        $pasienId2 = 'PSN-' . date('Ymd') . '002';
        DB::table('pasien')->insert([
            'id_pasien' => $pasienId,
            'nomor_rekam_medis' => 'RM0000001',
            'nik' => '3674012345678901',
            'nama_lengkap' => 'Siti Nurhaliza',
            'nama_ibu_kandung' => 'Aminah',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-05-15',
            'jenis_kelamin' => '2',
            'agama' => '1',
            'suku' => 'Jawa',
            'bahasa_dikuasai' => 'Indonesia',
            'alamat_lengkap' => 'Jl. Mawar No. 10 RT 001 RW 002',
            'rt' => '001',
            'rw' => '002',
            'kelurahan_desa' => 'Kelurahan Mawar',
            'kecamatan' => 'Kecamatan Indah',
            'kota_kabupaten' => 'Jakarta Selatan',
            'kode_pos' => '12345',
            'provinsi' => 'DKI Jakarta',
            'negara' => 'Indonesia',
            'alamat_domisili' => 'Jl. Mawar No. 10 RT 001 RW 002',
            'domisili_rt' => '001',
            'domisili_rw' => '002',
            'domisili_kelurahan_desa' => 'Kelurahan Mawar',
            'domisili_kecamatan' => 'Kecamatan Indah',
            'domisili_kota_kabupaten' => 'Jakarta Selatan',
            'domisili_kode_pos' => '12345',
            'domisili_provinsi' => 'DKI Jakarta',
            'domisili_negara' => 'Indonesia',
            'telepon_rumah' => '0217654321',
            'telepon_seluler' => '08123456789',
            'pendidikan' => '6',
            'pekerjaan' => '5',
            'status_pernikahan' => '2',
            'cara_pembayaran' => '1',
            'foto_pasien_path' => '',
            'tanda_tangan_pasien_path' => 'storage/tanda_tangan_pasien/siti.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('pasien')->insert([
            'id_pasien' => $pasienId2,
            'nomor_rekam_medis' => 'RM0000002',
            'nik' => '3674012345678902',
            'nama_lengkap' => 'Nurul Hidayah',
            'nama_ibu_kandung' => 'Aminaha',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1999-05-15',
            'jenis_kelamin' => '2',
            'agama' => '1',
            'suku' => 'Jawa',
            'bahasa_dikuasai' => 'Indonesia',
            'alamat_lengkap' => 'Jl. Melati No. 20 RT 003 RW 004',
            'rt' => '001',
            'rw' => '002',
            'kelurahan_desa' => 'Kelurahan Melati',
            'kecamatan' => 'Kecamatan Melati',
            'kota_kabupaten' => 'Jakarta Selatan',
            'kode_pos' => '12345',
            'provinsi' => 'DKI Jakarta',
            'negara' => 'Indonesia',
            'alamat_domisili' => 'Jl. Melati No. 20 RT 003 RW 004',
            'domisili_rt' => '001',
            'domisili_rw' => '002',
            'domisili_kelurahan_desa' => 'Kelurahan Melati',
            'domisili_kecamatan' => 'Kecamatan Melati',
            'domisili_kota_kabupaten' => 'Jakarta Selatan',
            'domisili_kode_pos' => '12345',
            'domisili_provinsi' => 'DKI Jakarta',
            'domisili_negara' => 'Indonesia',
            'telepon_rumah' => '0217654321',
            'telepon_seluler' => '08123456789',
            'pendidikan' => '6',
            'pekerjaan' => '5',
            'status_pernikahan' => '2',
            'cara_pembayaran' => '1',
            'foto_pasien_path' => '',
            'tanda_tangan_pasien_path' => 'storage/tanda_tangan_pasien/siti.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Kunjungan
        $kunjunganId = 'KJG-' . date('Ymd') . '001';
        DB::table('kunjungan')->insert([
            'id_kunjungan' => $kunjunganId,
            'id_pasien' => $pasienId,
            'tanggal_kunjungan' => date('Y-m-d'),
            'waktu_kunjungan' => '09:30:00',
            'jenis_kunjungan' => 'baru',
            'cara_pembayaran' => '1',
            'keluhan_utama' => 'Demam tinggi dan batuk selama 3 hari',
            'id_dokter' => 'DOK-' . date('Ymd') . '001',
            'status' => 'menunggu',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Assessment
        DB::table('assessment')->insert([
            'id_assessment' => 'ASM-' . date('Ymd') . '001',
            'id_kunjungan' => $kunjunganId,
            'id_pasien' => $pasienId,
            'tanggal_assessment' => date('Y-m-d'),
            'anamnesa' => 'Demam tinggi dan batuk selama 3 hari',
            'denyut_jantung' => '95',
            'pernafasan' => '20',
            'tekanan_darah' => '120/80',
            'suhu_tubuh' => 38.5,
            'riwayat_penyakit' => 'Tidak ada riwayat penyakit kronis',
            'bagian_tubuh_sakit' => 'Tenggorokan dan dada',
            'riwayat_alergi' => '4',
            'detail_alergi' => 'Alergi debu',
            'riwayat_pengobatan' => 'Paracetamol 3x1 sebelum ke klinik',
            'id_dokter' => 'DOK-' . date('Ymd') . '001',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed General Consent
        DB::table('general_consent')->insert([
            'id_consent' => 'GCN-' . date('Ymd') . '001',
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'tanggal' => date('Y-m-d'),
            'waktu' => '09:45:00',
            'persetujuan_pasien' => 'ya',
            'informasi_pembayaran' => 'setuju',
            'informasi_hak_kewajiban' => 'setuju',
            'informasi_tata_tertib' => 'setuju',
            'kebutuhan_penterjemah' => 'tidak',
            'kebutuhan_rohaniawan' => 'tidak',
            'pelepasan_informasi' => 'setuju',
            'hasil_penunjang_penjamin' => 'setuju',
            'hasil_penunjang_peserta_didik' => 'setuju',
            'anggota_keluarga_penerima_info' => 'Ahmad (Suami)',
            'fasyankes_rujukan' => 'setuju',
            'tanda_tangan_pasien_path' => 'storage/tanda_tangan_pasien/siti.png',
            'penanggung_jawab' => 'Ahmad',
            'petugas_pemberi_penjelasan' => 'Budi Santoso',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Informed Consent
        DB::table('informed_consent')->insert([
            'id_informed_consent' => 'ICN-' . date('Ymd') . '001',
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'nama_dokter_pemberi_penjelasan' => 'Dr. Indah Yuliarini, Sp.',
            'nama_petugas_pendamping' => 'Budi Santoso',
            'nama_keluarga_pasien' => 'Ahmad',
            'tindakan_dilakukan' => 'Pemeriksaan fisik dan penanganan demam',
            'konsekuensi_tindakan' => 'Pasien akan merasa lebih baik setelah penanganan demam',
            'persetujuan_tindakan' => 'ya',
            'tanggal_penjelasan' => date('Y-m-d'),
            'waktu_penjelasan' => '10:00:00',
            'dokter_pemberi_penjelasan' => 'Dr. Indah Yuliarini, Sp.',
            'penerima_penjelasan' => 'Siti Nurhaliza',
            'tanda_tangan_dokter_path' => 'storage/tanda_tangan/dokter.png',
            'tanda_tangan_penerima_path' => 'storage/tanda_tangan_pasien/siti.png',
            'saksi_1' => 'Budi Santoso',
            'tanda_tangan_saksi1_path' => 'storage/tanda_tangan/petugas.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Master Obat
        DB::table('master_obat')->insert([
            [
                'id_obat' => 'OBT-001',
                'nama_obat' => 'Paracetamol 500mg',
                'bentuk_sediaan' => 'Tablet',
                'satuan' => 'Tablet',
                'stok' => 100,
                'harga' => 2500.00,
                'gambar_obat_path' => 'storage/obat/paracetamol.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_obat' => 'OBT-002',
                'nama_obat' => 'Amoxicillin 500mg',
                'bentuk_sediaan' => 'Kapsul',
                'satuan' => 'Kapsul',
                'stok' => 80,
                'harga' => 5000.00,
                'gambar_obat_path' => 'storage/obat/amoxicillin.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seed Tindakan
        DB::table('tindakan')->insert([
            'id_tindakan' => 'TND-' . date('Ymd') . '001',
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'nama_tindakan' => 'Pemeriksaan Fisik',
            'petugas_pelaksana' => 'Dr. Indah Yuliarini, Sp.',
            'tanggal_tindakan' => date('Y-m-d'),
            'waktu_mulai' => '10:15:00',
            'waktu_selesai' => '10:30:00',
            'alat_medis_digunakan' => 'Stetoskop, Termometer, Tensimeter',
            'bmhp' => 'Alkohol swab, Kapas',
            'catatan' => 'Pemeriksaan fisik menyeluruh, auskultasi paru, pengukuran tanda vital',
            'dokumentasi_tindakan_path' => 'storage/dokumentasi/pemeriksaan_fisik.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Resume Pasien
        DB::table('resume_pasien')->insert([
            'id_resume' => 'RSM-' . date('Ymd') . '001',
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'tanggal_masuk' => date('Y-m-d'),
            'tanggal_keluar' => date('Y-m-d'),
            'nama_dpjp' => 'Dr. Indah Yuliarini, Sp.',
            'anamnesa' => 'Pasien datang dengan keluhan demam tinggi dan batuk selama 3 hari. Tidak ada riwayat kontak dengan pasien COVID-19.',
            'diagnosa' => 'Common Cold',
            'kode_icd9' => 'J00',
            'kode_icd10' => 'J00',
            'terapi' => 'Paracetamol 3x1 setelah makan, Amoxicillin 3x1 setelah makan',
            'anjuran' => 'Istirahat yang cukup, minum air putih yang banyak, kontrol 3 hari lagi jika keluhan tidak membaik',
            'tanda_tangan_dpjp_path' => 'storage/tanda_tangan/dokter.png',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Resep
        $resepId = 'RSP-' . date('Ymd') . '001';
        DB::table('resep')->insert([
            'id_resep' => $resepId,
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'tanggal_resep' => date('Y-m-d'),
            'waktu_resep' => '10:45:00',
            'tinggi_badan' => 165,
            'berat_badan' => 55.5,
            'dokter_penulis' => 'Dr. Indah Yuliarini, Sp.',
            'nomor_telepon_dokter' => '08234567890',
            'catatan_resep' => 'Minum obat setelah makan',
            'tanda_tangan_dokter_path' => 'storage/tanda_tangan/dokter.png',
            'pengkajian_resep' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Detail Resep
        DB::table('detail_resep')->insert([
            [
                'id_detail_resep' => 'DTR-' . date('Ymd') . '001',
                'id_resep' => $resepId,
                'id_obat' => 'OBT-001',
                'nama_obat' => 'Paracetamol 500mg',
                'bentuk_sediaan' => 'Tablet',
                'jumlah_obat' => 10,
                'metode_rute_pemberian' => 'Oral',
                'dosis_obat' => '1 tablet',
                'frekuensi_interval' => '3 kali sehari',
                'aturan_tambahan' => 'Diminum setelah makan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_detail_resep' => 'DTR-' . date('Ymd') . '002',
                'id_resep' => $resepId,
                'id_obat' => 'OBT-002',
                'nama_obat' => 'Amoxicillin 500mg',
                'bentuk_sediaan' => 'Kapsul',
                'jumlah_obat' => 10,
                'metode_rute_pemberian' => 'Oral',
                'dosis_obat' => '1 kapsul',
                'frekuensi_interval' => '3 kali sehari',
                'aturan_tambahan' => 'Diminum setelah makan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // // Seed Surat Keterangan
        // DB::table('surat_keterangan')->insert([
        //     'id_surat' => 'SKT-' . date('Ymd') . '001',
        //     'id_pasien' => $pasienId,
        //     'id_kunjungan' => $kunjunganId,
        //     'jenis_surat' => 'sakit',
        //     'tanggal_surat' => date('Y-m-d'),
        //     'tujuan_surat' => 'Untuk diberikan kepada yang bersangkutan',
        //     'diagnosa' => 'Common Cold',
        //     'kode_icd9' => 'J00',
        //     'kode_icd10' => 'J00',
        //     'lama_istirahat' => 3,
        //     'tanggal_mulai' => date('Y-m-d'),
        //     'tanggal_selesai' => date('Y-m-d', strtotime('+3 days')),
        //     'dokter_pemeriksa' => 'Dr. Indah Yuliarini, Sp.',
        //     'tanda_tangan_dokter_path' => 'storage/tanda_tangan/dokter.png',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Seed Dokumen Pasien
        DB::table('dokumen_pasien')->insert([
            'id_dokumen' => 'DOC-' . date('Ymd') . '001',
            'id_pasien' => $pasienId,
            'id_kunjungan' => $kunjunganId,
            'jenis_dokumen' => 'Foto KTP',
            'nama_dokumen' => 'KTP Siti Nurhaliza',
            'file_path' => 'storage/dokumen/ktp_siti.jpg',
            'keterangan' => 'Dokumen identitas pasien',
            'uploaded_by' => $petugasUserId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed Log Aktivitas
        DB::table('log_aktivitas')->insert([
            'user_id' => $petugasUserId,
            'aktivitas' => 'Pendaftaran pasien baru',
            'tabel' => 'pasien',
            'id_referensi' => $pasienId,
            'waktu' => now(),
            'ip_address' => '192.168.1.1',
        ]);

        // Seed Password Reset Token
        DB::table('password_reset_tokens')->insert([
            'email' => 'admin@klinik.com',
            'token' => Hash::make('random_token'),
            'created_at' => now(),
        ]);

        // Seed Session
        DB::table('sessions')->insert([
            'id' => 'sess_' . md5(uniqid()),
            'user_id' => $adminUserId,
            'ip_address' => '192.168.1.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'payload' => serialize(['_token' => 'example_token', 'user_id' => $adminUserId]),
            'last_activity' => now()->timestamp,
        ]);
    }
}
