<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CategoriaSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    
      $this->call(class:GenerosSeeder::class);
      $this->call(class:LibrosSeeder::class);
      $this->call(class:UsuarioSeeder::class);
      $this->call(class:CategoriaSeeder::class);
      $this->call(class:PostsSeeder::class);
      

    }
}
