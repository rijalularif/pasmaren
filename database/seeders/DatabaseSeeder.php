<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Maren;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KecamatanSeeder::class,
            UserSeeder::class,
        ]);

        Maren::factory(20)->recycle([
            Kecamatan::all(),
            // $arif,
            User::all()
        ])->create();
    }
}
