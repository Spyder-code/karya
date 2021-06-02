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
            'name' => 'Admin',
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123'),
            'role' => 1
        ]);
        User::create([
            'name' => 'Juri',
            'email' => 'juri@yahoo.com',
            'password' => Hash::make('admin123'),
            'role' => 2
        ]);
        User::create([
            'name' => 'Funners',
            'email' => 'funner@yahoo.com',
            'password' => Hash::make('admin123'),
            'role' => 3
        ]);
    }
}
