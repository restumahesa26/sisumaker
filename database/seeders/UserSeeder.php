<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Mufti Restu Mahesa',
            'email' => 'mufti.restumahesa@gmail.com',
            'username' => 'restumahesa',
            'nip' => '123456789101112',
            'password' => Hash::make('password'),
            'role' => 'Sekretariat'
        ]);

        User::create([
            'nama' => 'Muhammad Farel',
            'email' => 'farel@gmail.com',
            'username' => 'farel',
            'nip' => '12345678910111213',
            'password' => Hash::make('password'),
            'role' => 'Sekretaris'
        ]);

        User::create([
            'nama' => 'Danurifa Mubarik Imam',
            'email' => 'danurifa@gmail.com',
            'username' => 'danurifa',
            'nip' => '12345678910111214',
            'password' => Hash::make('password'),
            'role' => 'Pimpinan'
        ]);

        User::create([
            'nama' => 'Balqis Nabila Aulia Putri',
            'email' => 'balqisnabila48@gmail.com',
            'username' => 'balqisnabila',
            'nip' => '123456789101112',
            'password' => Hash::make('password'),
            'role' => 'Sekretariat'
        ]);

        User::create([
            'nama' => 'Muhammad Raihan',
            'email' => 'raihan@gmail.com',
            'username' => 'raihan',
            'nip' => '12345678910111213',
            'password' => Hash::make('password'),
            'role' => 'Sekretaris'
        ]);

        User::create([
            'nama' => 'Wahyu Dwi Prasetio',
            'email' => 'wahyudwiprasetio@gmail.com',
            'username' => 'wahyudwi',
            'nip' => '12345678910111214',
            'password' => Hash::make('password'),
            'role' => 'Pimpinan'
        ]);
    }
}
