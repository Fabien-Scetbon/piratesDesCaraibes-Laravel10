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
        // 1
        $specialite           = new Specialite();
        $specialite->nom      = "vigie";
        $specialite->save();

        // 2
        $specialite           = new Specialite();
        $specialite->nom      = "voleur";
        $specialite->save();

        // 3
        $specialite           = new Specialite();
        $specialite->nom      = "cuisinier";
        $specialite->save();

        // 4
        $specialite           = new Specialite();
        $specialite->nom      = "mousse";
        $specialite->save();

        // 5
        $specialite           = new Specialite();
        $specialite->nom      = "chef d equipe";
        $specialite->save();

        // 6
        $specialite           = new Specialite();
        $specialite->nom      = "sabreur";
        $specialite->save();

        // 7
        $specialite           = new Specialite();
        $specialite->nom      = "navigation";
        $specialite->save();
    }
}
