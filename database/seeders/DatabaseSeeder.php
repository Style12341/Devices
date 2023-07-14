<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\System;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Bernard M',
            'email' => 'test@example.com',
        ]);


        System::factory(6)->create(
            [
                'user_id' => $user->id
            ]
        );
        System::create(
            [
                'name' => "Heated Chamber",
                'user_id' => $user->id,
                'tags' => 'temperature',
                'logo' => 'null',
                'company' => 'Bernard Ingeneieria',
                'location' => 'Santa Fe',
                'email' => 'bmaximiliano0210@gmmail.com',
                'description' => 'Camara de temperatura controlada de 10ºC a 60ºC'
            ]
        );
        System::create(
            [
                'name' => "Heated Chamber 2",
                'user_id' => $user->id,
                'tags' => 'hot, cold',
                'company' => 'Bernard Ingeneieria',
                'location' => 'Santa Fe',
                'email' => 'bmaximiliano0210@gmmail.com',
                'description' => 'Camara de temperatura controlada de 20ºC a 100ºC'
            ]
        );
    }
}
