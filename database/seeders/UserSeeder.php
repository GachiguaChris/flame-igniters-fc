<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@flameignitersfc.com'], [
            'name'     => 'Admin User',
            'password' => Hash::make('password'),
            'role'     => 'admin',
        ]);

        User::firstOrCreate(['email' => 'editor@flameignitersfc.com'], [
            'name'     => 'Content Editor',
            'password' => Hash::make('password'),
            'role'     => 'editor',
        ]);
    }
}
