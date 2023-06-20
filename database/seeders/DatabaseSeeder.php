<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
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