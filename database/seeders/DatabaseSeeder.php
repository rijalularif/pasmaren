<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Kalau Manual
        // $arif = User::create([
        //     'name' => 'Rijalul Arif',
        //     'username' => 'rijalularif',
        //     'email' => 'rijalul.arif@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        $this->call([
            KecamatanSeeder::class,
            UserSeeder::class,
        ]);

        // Maren::create([
        //     'title' => 'Lubuk Sikaping',
        //     'author_id' => 'lubuk-sikaping',
        //     'kecamatan_id' => 'red',
        //     'slug' => 'Lubuk Sikaping',
        //     'body' => 'body'
        // ]);

        Maren::factory(20)->recycle([
            Kecamatan::all(),
            // $arif,
            User::all()
        ])->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);





        // Maren::create([
        //     'nspp' => 'Lubuk Sikaping',
        //     'jenis' => 'Pondok Pesantren',
        //     'nama_lembaga' => 'lubuk-sikaping',
        //     'tingkat' => 'Pondok Pesantren',
        //     'alamat' => 'red',
        // ]);




    }
}
