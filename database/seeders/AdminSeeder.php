<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
        ['email' => 'admin@devseas.com'],
        [
            'name' => 'Admin',
            'email' => 'admin@devseas.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]
        );
    }
}
