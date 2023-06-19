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
        User::all()->each(function ($user) {
            $specialiteIds = Specialite::pluck('id')->toArray(); 
    
            $specialites = [];

            $statNumber = [1, 1, 1, 2, 2, 3];
    
            $numElements = $statNumber[array_rand($statNumber)];
    
            while (count($specialites) < $numElements) {
                $randomKey = array_rand($specialiteIds); 
                if (!in_array($specialiteIds[$randomKey], $specialites)) {
                    $specialites[] = $specialiteIds[$randomKey];
                }
            }
    
            $user->specialites()->attach($specialites);
        });
    }
}
