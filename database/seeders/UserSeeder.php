<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'fullname' => 'Muamar Zidan Tri Antoro',
            'username' => 'muziro',
            'email' => 'muziro@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'fullname' => 'Cahyo Susilo',
            'username' => 'lssyhc',
            'email' => 'lssyhc@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->count(50)->hasProfile(1)->create();
    }
}
