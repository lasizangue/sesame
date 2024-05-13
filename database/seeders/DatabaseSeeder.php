<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(DetachementTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(BuroTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(TransporteurTableSeeder::class);

        \App\Models\User::factory(1)->create();
        \App\Models\Dossier::factory(1)->create();
        \App\Models\Conteneur::factory(1)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
