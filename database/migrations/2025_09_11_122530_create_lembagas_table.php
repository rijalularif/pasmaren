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
        Schema::create('lembagas', function (Blueprint $table) {

            $table->id();

            // Kode NO. STATISTIK dari Kemenag, dibuat unik
            $table->string('no_statistik', 30)->unique();

            $table->string('npsn', 30)->nullable();

            // Nama lembaga (PP/PPS)
            $table->string('nama_lembaga', 255);

            $table->string('slug')->unique();

            $table->string('jenis', 10)->nullable();

            $table->string('akreditasi', 10)->nullable();

            $table->integer('jumlah_guru')->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->integer('jumlah_rombel')->nullable();

            // Alamat lengkap
            $table->text('alamat');
            $table->string('kecamatan');
            $table->string('status')->nullable();

            // URL <iframe> Google Maps (opsional)
            $table->text('map_embed_url')->nullable();

            // Koordinat
            // Latitude: -90..90 (pakai presisi 8 desimal)
            $table->decimal('latitude', 10, 8)->nullable();

            // Longitude: -180..180 (butuh 3 digit di depan koma)
            $table->decimal('longitude', 11, 8)->nullable();

            // (Opsional) fulltext untuk pencarian nama/alamat (MySQL >= 5.7/InnoDB)
            // $table->fullText(['nama_lembaga', 'alamat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembagas');
    }
};
