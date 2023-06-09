<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Device;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Device::factory(6)->create();
        Device::create(
            [
                'title' => "Heated Chamber",
                'tags' => 'hot, cold',
                'company' => 'Bernard Ingeneieria',
                'location' => 'Santa Fe',
                'email' => 'bmaximiliano0210@gmmail.com',
                'description' => 'Camara de temperatura controlada de 10ºC a 60ºC'
            ]
        );
        Device::create(
            [
                'title' => "Heated Chamber 2",
                'tags' => 'hot, cold',
                'company' => 'Bernard Ingeneieria',
                'location' => 'Santa Fe',
                'email' => 'bmaximiliano0210@gmmail.com',
                'description' => 'Camara de temperatura controlada de 20ºC a 100ºC'
            ]
        );
    }
}
