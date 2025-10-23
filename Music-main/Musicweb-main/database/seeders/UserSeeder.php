<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tạo tài khoản admin
        User::create([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('12345678'),
        'role' => 'admin',
        ]);

        // Tạo tài khoản user thường
        User::create([
        'name' => 'Normal User',
        'email' => 'user@example.com',
        'password' => Hash::make('12345678'),
        'role' => 'user',
        ]);

        // Tạo 4 tài khoản user thường
        User::factory(4)->create([
            'role' => 'user'
        ]);
        // Tao 4 tai khoan artist
        User::factory(4)->create([
            'role' => 'artist'
        ]);
    }
}

