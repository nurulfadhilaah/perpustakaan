<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama_admin' => 'Admin Perpus',
            'email' => 'admin@madina.local',
            'password' => Hash::make('password123'), // ganti dengan password aman
        ]);
    }
}
