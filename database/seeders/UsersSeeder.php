<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash; // Tambahkan ini!
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => 'admin',
            'role' => 'superadmin',
        ]);
        User::create([
            'name' => 'Admin Gudang',
            'email' => 'admingudang2@gmail.com',
            'password' => '12345', 
            'role' => 'admingudang',
        ]);
        User::create([
            'name' => 'Elisa Fitriana',
            'email' => 'elisa@gmail.com',
            'password' => '123',
            'role' => 'admingudang',
        ]);
        User :: create([
            'name' => 'Admin Gudang 3',
            'email' => 'admin3@gmail.com',
            'password' => 'elisa',
            'role' => 'admingudang',
        ]);
    }
}
