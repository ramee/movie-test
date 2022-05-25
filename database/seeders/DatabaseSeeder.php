<?php

namespace Database\Seeders;

use App\Models\Movies;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

         Movies::factory(100)->create();
    }
}
