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
        Schema::create('marens', function (Blueprint $table) {
            $table->id();
            // $table->string('no_stat');
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('tingkat');
            // $table->text('alamat');
            $table->foreignId('kecamatan_id')->constrained(
                table: 'kecamatans',
                indexName: 'marens_kecamatan_id'
            );
            $table->text('body');
            // $table->text('google_maps_url');
            // $table->decimal('latitude', 10, 8);
            // $table->decimal('longitude', 11, 8);
            // $table->string('program_jenjang');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'marens_author_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marens');
    }
};
