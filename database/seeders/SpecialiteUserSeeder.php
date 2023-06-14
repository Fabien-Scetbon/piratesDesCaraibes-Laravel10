<?php

namespace Database\Seeders;

use App\Models\Specialite;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialiteUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::All()->each(function ($user) {
            $specialites = [Specialite::all()->random()->id, Specialite::all()->random()->id];
            $user->specialites()->attach($specialites);
        });
    }
}
