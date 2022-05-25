<?php

namespace Database\Seeders;

use App\Models\Movie;
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

         Movie::factory(100)->create();
    }
}
