<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Rijalul Arif',
            'username' => 'rijalularif',
            'email' => 'rijalul.arif@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Rijhppl17!'),
            'remember_token' => Str::random(10)
        ]);
    }
}
