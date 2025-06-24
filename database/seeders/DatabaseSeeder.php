<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama' => 'Amir',
            'email' => 'admin@gmail.com',
            'jabatan' => 'Admin',
            'password' => Hash::make('12345678'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama' => 'Syalwa',
            'email' => 'syalwa@gmail.com',
            'jabatan' => 'Karyawan',
            'password' => Hash::make('12345678'),
            'is_tugas' => false,
        ]);
        User::create([
            'nama' => 'Elisa',
            'email' => 'elisa@gmail.com',
            'jabatan' => 'Karyawan',
            'password' => Hash::make('12345678'),
            'is_tugas' => false,
        ]);
    }
}
