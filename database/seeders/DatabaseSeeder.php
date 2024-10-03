<?php

namespace Database\Seeders;

use App\Models\Pin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(8)->create();
//         Pin::factory(100)->create();
    }
}
