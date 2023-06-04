<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'              => 'Administrator',
                'email'             => 'admin@gmail.com',
                'email_verified_at' => now(),
                'role'              => 'admin',
                'password'          => Hash::make('admin'),
                'created_at'        => now(),
            ],
        ];

        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}