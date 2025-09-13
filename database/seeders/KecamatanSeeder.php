<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    public function run(): void
    {
        Kecamatan::create([
            'name' => 'Lubuk Sikaping',
            'slug' => 'lubuk-sikaping',
            'color' => 'red'
        ]);

        Kecamatan::create([
            'name' => 'Bonjol',
            'slug' => 'bonjol',
            'color' => 'green'
        ]);

        Kecamatan::create([
            'name' => 'Dua Koto',
            'slug' => 'dua-koto',
            'color' => 'blue'
        ]);

        Kecamatan::create([
            'name' => 'Panti',
            'slug' => 'panti',
            'color' => 'yellow'
        ]);
        Kecamatan::create([
            'name' => 'Mapat Tunggul',
            'slug' => 'mapat-tunggul',
            'color' => 'red'
        ]);

        Kecamatan::create([
            'name' => 'Mapat Tunggul Selatan',
            'slug' => 'mapat-tunggul-selatan',
            'color' => 'green'
        ]);

        Kecamatan::create([
            'name' => 'Padang Gelugur',
            'slug' => 'padang-gelugur',
            'color' => 'blue'
        ]);

        Kecamatan::create([
            'name' => 'Rao',
            'slug' => 'rao',
            'color' => 'yellow'
        ]);
        Kecamatan::create([
            'name' => 'Rao Selatan',
            'slug' => 'rao-selatan',
            'color' => 'red'
        ]);

        Kecamatan::create([
            'name' => 'Rao Utara',
            'slug' => 'rao-utara',
            'color' => 'green'
        ]);

        Kecamatan::create([
            'name' => 'Simpang Alahan Mati',
            'slug' => 'simpang-alahan-mati',
            'color' => 'blue'
        ]);

        Kecamatan::create([
            'name' => 'Tigo Nagari',
            'slug' => 'tigo-nagari',
            'color' => 'yellow'
        ]);
    }
}
