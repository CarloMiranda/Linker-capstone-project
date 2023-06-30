<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for($x=1; $x < 20; $x++){
            \App\Models\User::factory()->create([
                'name' => fake()->name(),
                'email' => fake()->freeEmail(),
                'password' => Hash::make('password123'),
            ]);
            for($i=0; $i < 20; $i++){

                \App\Models\Twat::create([
                    'content' => fake()->realText(),
                    'user_id' => $x,
                ]);
            }
        }
    }
}
