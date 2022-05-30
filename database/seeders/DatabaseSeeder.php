<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::create([
        //     'full_name' => 'Khayrul Shanto',
        //     'name' => 'Admin',
        //     'role' => 1,
        //     'email' => 'admin@mail.com',
        //     'password' => Hash::make('password'),
        // ]);

        \App\Models\Category::factory(10)->create();
    }
}
