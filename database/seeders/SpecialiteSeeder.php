<?php

namespace Database\Seeders;

use App\Models\Specialite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $liste = ['vigie', 'voleur', 'cuisinier', 'mousse', "chef d'équipe", 'sabreur', 'navigateur', 'ingénieur'];

        foreach ($liste as $item) {
            $specialite = new Specialite();
            $specialite->nom = $item;
            $specialite->save();
        }
    }
}
