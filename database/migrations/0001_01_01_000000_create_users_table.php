<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Master Jenis Kelamin
        Schema::create('master_jenis_kelamin', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Master Agama
        Schema::create('master_agama', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Master Pendidikan
        Schema::create('master_pendidikan', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Master Pekerjaan
        Schema::create('master_pekerjaan', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Master Status Pernikahan
        Schema::create('master_status_pernikahan', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Master Cara Pembayaran
        Schema::create('master_cara_pembayaran', function (Blueprint $table) {
            $table->char('id', 1)->primary();
            $table->string('nama', 50);
            $table->timestamps();
        });

        // Konfigurasi Klinik
        Schema::create('konfigurasi_klinik', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama_klinik', 100);
            $table->string('alamat_klinik', 255)->nullable();
            $table->string('telepon', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('logo_path', 255)->nullable(); // Implementasi rekomendasi 1 - Penyimpanan File
            $table->string('kota', 50)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('jam_operasional', 100)->nullable();
            $table->string('pimpinan', 100)->nullable();
            $table->string('tanda_tangan_pimpinan_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->timestamps();
        });

        // Users
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 20)->primary();
            $table->string('username', 50)->unique();
            $table->string('password', 255); // Implementasi rekomendasi 3 - akan dienkripsi dengan bcrypt
            $table->enum('role', ['admin', 'dokter', 'petugas']);
            $table->string('nama', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('nomor_hp', 15)->nullable();
            $table->boolean('status')->default(true);
            $table->string('foto_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->string('tanda_tangan_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->timestamp('last_login')->nullable();
            $table->timestamps();
        });

        // Dokter
        Schema::create('dokter', function (Blueprint $table) {
            $table->string('id_dokter', 20)->primary();
            $table->string('user_id', 20);
            $table->string('nama_dokter', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('nomor_hp', 15)->nullable();
            $table->string('spesialisasi', 100)->nullable();
            $table->string('sip', 50)->nullable(); // Surat Ijin Praktek
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Petugas Administrasi
        Schema::create('petugas_administrasi', function (Blueprint $table) {
            $table->string('id_petugas', 20)->primary();
            $table->string('user_id', 20);
            $table->string('nama_petugas', 100);
            $table->string('alamat', 255)->nullable();
            $table->string('nomor_hp', 15)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Pasien
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('id_pasien', 20)->primary();
            $table->string('nomor_rekam_medis', 10)->unique();
            $table->string('nik', 16)->nullable()->unique();
            $table->string('nomor_identitas_lain', 20)->nullable(); // WNA
            $table->string('nama_lengkap', 100);
            $table->string('nama_ibu_kandung', 100)->nullable();
            $table->string('tempat_lahir', 50)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->char('jenis_kelamin', 1)->nullable();
            $table->char('agama', 1)->nullable();
            $table->string('suku', 50)->nullable();
            $table->string('bahasa_dikuasai', 50)->nullable();

            // Data alamat KTP
            $table->string('alamat_lengkap', 255)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('kelurahan_desa', 50)->nullable();
            $table->string('kecamatan', 50)->nullable();
            $table->string('kota_kabupaten', 50)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('provinsi', 50)->nullable();
            $table->string('negara', 50)->default('Indonesia');

            // Data alamat domisili
            $table->string('alamat_domisili', 255)->nullable();
            $table->string('domisili_rt', 5)->nullable();
            $table->string('domisili_rw', 5)->nullable();
            $table->string('domisili_kelurahan_desa', 50)->nullable();
            $table->string('domisili_kecamatan', 50)->nullable();
            $table->string('domisili_kota_kabupaten', 50)->nullable();
            $table->string('domisili_kode_pos', 10)->nullable();
            $table->string('domisili_provinsi', 50)->nullable();
            $table->string('domisili_negara', 50)->default('Indonesia');

            // Data kontak
            $table->string('telepon_rumah', 15)->nullable();
            $table->string('telepon_seluler', 15)->nullable();

            // Data sosial
            $table->char('pendidikan', 1)->nullable();
            $table->char('pekerjaan', 1)->nullable();
            $table->char('status_pernikahan', 1)->nullable();

            // File pasien
            $table->string('foto_pasien_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->string('tanda_tangan_pasien_path', 255)->nullable(); // Implementasi rekomendasi 1

            $table->timestamps();

            // Implementasi rekomendasi 2 - Indeks Database
            $table->index('nomor_rekam_medis');
            $table->index('nik');
            $table->index('nama_lengkap');
            $table->index('tanggal_lahir');

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('jenis_kelamin')->references('id')->on('master_jenis_kelamin');
            $table->foreign('agama')->references('id')->on('master_agama');
            $table->foreign('pendidikan')->references('id')->on('master_pendidikan');
            $table->foreign('pekerjaan')->references('id')->on('master_pekerjaan');
            $table->foreign('status_pernikahan')->references('id')->on('master_status_pernikahan');
        });

        // Kunjungan
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->string('id_kunjungan', 20)->primary();
            $table->string('id_pasien', 20);
            $table->date('tanggal_kunjungan')->index(); // Implementasi rekomendasi 2
            $table->time('waktu_kunjungan');
            $table->enum('jenis_kunjungan', ['baru', 'lama']);
            $table->text('keluhan_utama')->nullable();
            $table->string('id_dokter', 20)->nullable();
            $table->enum('status', ['menunggu', 'dalam_pemeriksaan', 'selesai']);
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
        });

        // pembayaran
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->string('id_pembayaran', 20)->primary();
            $table->string('id_kunjungan', 20);
            $table->string('id_pasien', 20);
            $table->string('cara_pembayaran', 1)->nullable(); // Menggunakan master_cara_pembayaran
            $table->date('tanggal_pembayaran');
            $table->time('waktu_pembayaran');
            $table->decimal('jumlah', 12, 2);
            $table->enum('status_pembayaran', ['lunas', 'belum_lunas']);
            $table->string('petugas_administrasi', 100)->nullable();
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->foreign('cara_pembayaran')->references('id')->on('master_cara_pembayaran');
        });

        // Assessment
        Schema::create('assessment', function (Blueprint $table) {
            $table->string('id_assessment', 20)->primary();
            $table->string('id_kunjungan', 20);
            $table->string('id_pasien', 20);
            $table->date('tanggal_assessment');
            $table->text('anamnesa')->nullable();
            $table->string('denyut_jantung', 10)->nullable()->comment('satuan per menit');
            $table->string('pernafasan', 10)->nullable()->comment('satuan per menit');
            $table->string('tekanan_darah', 10)->nullable();
            $table->decimal('suhu_tubuh', 5, 2)->nullable()->comment('dalam derajat celcius');
            $table->text('riwayat_penyakit')->nullable();
            $table->text('bagian_tubuh_sakit')->nullable();
            $table->string('riwayat_alergi', 50)->nullable()->comment('1=Obat, 2=Makanan, 3=Udara, 4=Lain-lain');
            $table->text('detail_alergi')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
            $table->string('id_dokter', 20);
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
        });

        // General Consent
        Schema::create('general_consent', function (Blueprint $table) {
            $table->string('id_consent', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20);
            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('persetujuan_pasien', ['ya', 'tidak']);
            $table->enum('informasi_pembayaran', ['setuju', 'tidak_setuju'])->nullable();
            $table->enum('informasi_hak_kewajiban', ['setuju', 'tidak_setuju'])->nullable();
            $table->enum('informasi_tata_tertib', ['setuju', 'tidak_setuju'])->nullable();
            $table->enum('kebutuhan_penterjemah', ['ya', 'tidak'])->nullable();
            $table->enum('kebutuhan_rohaniawan', ['ya', 'tidak'])->nullable();
            $table->enum('pelepasan_informasi', ['setuju', 'tidak_setuju'])->nullable();
            $table->enum('hasil_penunjang_penjamin', ['setuju', 'tidak_setuju'])->nullable();
            $table->enum('hasil_penunjang_peserta_didik', ['setuju', 'tidak_setuju'])->nullable();
            $table->text('anggota_keluarga_penerima_info')->nullable();
            $table->enum('fasyankes_rujukan', ['setuju', 'tidak_setuju']);
            $table->string('tanda_tangan_pasien_path', 255)->nullable();
            $table->string('penanggung_jawab', 100)->nullable();
            $table->string('petugas_pemberi_penjelasan', 100)->nullable();
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
        });

        // Informed Consent
        Schema::create('informed_consent', function (Blueprint $table) {
            $table->string('id_informed_consent', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20);
            $table->string('nama_dokter_pemberi_penjelasan', 100);
            $table->string('nama_petugas_pendamping', 100)->nullable();
            $table->string('nama_keluarga_pasien', 100)->nullable();
            $table->text('tindakan_dilakukan');
            $table->text('konsekuensi_tindakan');
            $table->enum('persetujuan_tindakan', ['ya', 'tidak']);
            $table->date('tanggal_penjelasan');
            $table->time('waktu_penjelasan');
            $table->string('dokter_pemberi_penjelasan', 100);
            $table->string('penerima_penjelasan', 100);
            $table->string('tanda_tangan_dokter_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->string('tanda_tangan_penerima_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->string('saksi_1', 100)->nullable();
            $table->string('tanda_tangan_saksi1_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->string('saksi_2', 100)->nullable();
            $table->string('tanda_tangan_saksi2_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
        });

        // Master Obat
        Schema::create('master_obat', function (Blueprint $table) {
            $table->string('id_obat', 20)->primary();
            $table->string('nama_obat', 100);
            $table->string('bentuk_sediaan', 50)->nullable();
            $table->string('satuan', 20)->nullable();
            $table->integer('stok')->default(0);
            $table->decimal('harga', 12, 2)->nullable();
            $table->string('gambar_obat_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->timestamps();

            // Implementasi rekomendasi 2 - Indeks Database
            $table->index('nama_obat');
        });

        // Tindakan
        Schema::create('tindakan', function (Blueprint $table) {
            $table->string('id_tindakan', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20);
            $table->string('nama_tindakan', 100);
            $table->string('petugas_pelaksana', 100);
            $table->date('tanggal_tindakan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('alat_medis_digunakan')->nullable();
            $table->text('bmhp')->nullable()->comment('Bahan Medis Habis Pakai');
            $table->text('catatan')->nullable();
            $table->string('dokumentasi_tindakan_path', 255)->nullable(); // Implementasi rekomendasi 1
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
        });

        // Resume Pasien
        Schema::create('resume_pasien', function (Blueprint $table) {
            $table->string('id_resume', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20);
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('nama_dpjp', 100);
            $table->text('anamnesa')->nullable();
            $table->text('diagnosa')->nullable();
            $table->string('kode_icd9', 10)->nullable();
            $table->string('kode_icd10', 10)->nullable();
            $table->text('terapi')->nullable();
            $table->text('anjuran')->nullable();
            $table->string('tanda_tangan_dpjp_path', 255)->nullable();
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
        });

        // Resep
        Schema::create('resep', function (Blueprint $table) {
            $table->string('id_resep', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20);
            $table->date('tanggal_resep');
            $table->time('waktu_resep');
            $table->integer('tinggi_badan')->nullable()->comment('dalam cm');
            $table->decimal('berat_badan', 5, 2)->nullable()->comment('dalam kg');
            $table->decimal('luas_permukaan_tubuh', 5, 2)->nullable()->comment('untuk anak-anak');
            $table->string('dokter_penulis', 100);
            $table->string('nomor_telepon_dokter', 15)->nullable();
            $table->text('catatan_resep')->nullable();
            $table->string('tanda_tangan_dokter_path', 255)->nullable();
            $table->enum('pengkajian_resep', ['1', '2', '3'])->nullable()->comment('1=Pengkajian administrasi, 2=Persyaratan farmasetik, 3=Persyaratan klinis');
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan');
        });

        // Detail Resep
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->string('id_detail_resep', 20)->primary();
            $table->string('id_resep', 20);
            $table->string('id_obat', 20);
            $table->string('nama_obat', 100);
            $table->string('bentuk_sediaan', 50)->nullable();
            $table->integer('jumlah_obat');
            $table->string('metode_rute_pemberian', 50)->nullable();
            $table->string('dosis_obat', 50);
            $table->string('frekuensi_interval', 50);
            $table->text('aturan_tambahan')->nullable();
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_resep')->references('id_resep')->on('resep');
            $table->foreign('id_obat')->references('id_obat')->on('master_obat');
        });

        // Dokumen Pasien - Implementasi rekomendasi 1
        Schema::create('dokumen_pasien', function (Blueprint $table) {
            $table->string('id_dokumen', 20)->primary();
            $table->string('id_pasien', 20);
            $table->string('id_kunjungan', 20)->nullable();
            $table->string('jenis_dokumen', 50);
            $table->string('nama_dokumen', 100);
            $table->string('file_path', 255);
            $table->text('keterangan')->nullable();
            $table->string('uploaded_by', 20)->nullable();
            $table->timestamps();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade');
            $table->foreign('id_kunjungan')->references('id_kunjungan')->on('kunjungan')->nullable();
            $table->foreign('uploaded_by')->references('id')->on('users');
        });

        // Log Aktivitas
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->bigIncrements('id_log');
            $table->string('user_id', 20)->nullable();
            $table->string('aktivitas', 255);
            $table->string('tabel', 50)->nullable();
            $table->string('id_referensi', 50)->nullable();
            $table->timestamp('waktu')->useCurrent();
            $table->string('ip_address', 50)->nullable();

            // Implementasi rekomendasi 4 - Relasi Tabel
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_id', 20)->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel dengan urutan terbalik untuk menghindari error foreign key
        Schema::dropIfExists('log_aktivitas');
        Schema::dropIfExists('dokumen_pasien');
        Schema::dropIfExists('surat_keterangan');
        Schema::dropIfExists('detail_resep');
        Schema::dropIfExists('resep');
        Schema::dropIfExists('resume_pasien');
        Schema::dropIfExists('tindakan');
        Schema::dropIfExists('informed_consent');
        Schema::dropIfExists('general_consent');
        Schema::dropIfExists('assessment');
        Schema::dropIfExists('pembayaran');
        Schema::dropIfExists('kunjungan');
        Schema::dropIfExists('pasien');
        Schema::dropIfExists('petugas_administrasi');
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('users');
        Schema::dropIfExists('master_obat');
        Schema::dropIfExists('konfigurasi_klinik');
        Schema::dropIfExists('master_cara_pembayaran');
        Schema::dropIfExists('master_status_pernikahan');
        Schema::dropIfExists('master_pekerjaan');
        Schema::dropIfExists('master_pendidikan');
        Schema::dropIfExists('master_agama');
        Schema::dropIfExists('master_jenis_kelamin');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
