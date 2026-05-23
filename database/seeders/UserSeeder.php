<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'SrokhHub Admin',
            'email' => 'admin@srokhhub.com',
            'password' => bcrypt('admin123456'),
            'role' => 'admin',
        ]);
    }
}
