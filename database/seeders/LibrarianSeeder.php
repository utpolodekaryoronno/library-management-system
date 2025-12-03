<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LibrarianSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('librarians')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'photo' => null,
                'email_verified_at' => now(),
                'password' => Hash::make('123456'), // change later
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
