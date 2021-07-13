<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         User::create([
             'name' => 'Admin',
             'email' => 'admin@admin.ru',
             'password' => Hash::make('password'),
             'email_verified_at' => now(),
         ]);
    }
}
