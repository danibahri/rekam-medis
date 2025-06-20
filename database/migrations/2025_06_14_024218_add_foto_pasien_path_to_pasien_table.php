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
        Schema::table('pasien', function (Blueprint $table) {
            // Check if column doesn't exist before adding
            if (!Schema::hasColumn('pasien', 'foto_pasien_path')) {
                $table->string('foto_pasien_path')->nullable()->after('cara_pembayaran');
            }

            // Also add tanda_tangan_pasien_path if it doesn't exist
            if (!Schema::hasColumn('pasien', 'tanda_tangan_pasien_path')) {
                $table->string('tanda_tangan_pasien_path')->nullable()->after('foto_pasien_path');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasien', function (Blueprint $table) {
            if (Schema::hasColumn('pasien', 'foto_pasien_path')) {
                $table->dropColumn('foto_pasien_path');
            }

            if (Schema::hasColumn('pasien', 'tanda_tangan_pasien_path')) {
                $table->dropColumn('tanda_tangan_pasien_path');
            }
        });
    }
};
