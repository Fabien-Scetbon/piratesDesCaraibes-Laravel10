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

        $this->call([
            NavireSeeder::class,
        ]);

        \App\Models\User::factory(20)->create();

        $this->call([
            SpecialiteSeeder::class,
            SpecialiteUserSeeder::class,
            RessourceSeeder::class,
            TresorSeeder::class,
        ]);
    }
}
