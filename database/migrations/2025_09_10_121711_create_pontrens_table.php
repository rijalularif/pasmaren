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
        Schema::create('pontrens', function (Blueprint $table) {
            $table->id();
            $table->string('no_stat')->unique()->nullable();
            $table->string('nama_lembaga');
            $table->enum('jenjang', ['RA', 'MI', 'MTs', 'MA', 'PP', 'LPQ', 'MDT']);
            $table->enum('tingkat', ['Ula', 'Wustha', 'Ulya'])->nullable();
            $table->string('alamat');
            $table->string('link_google_maps')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->text('program')->nullable();
            $table->integer('jumlah_santri')->default(0);
            $table->integer('jumlah_ustadz')->default(0);
            $table->integer('ruang_kelas')->default(0);
            $table->integer('rombel')->default(0);
            $table->string('website')->nullable();
            $table->text('fasilitas')->nullable();
            $table->decimal('luas_tanah', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontrens');
    }
};
