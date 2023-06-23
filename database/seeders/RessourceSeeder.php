<?php

namespace Database\Seeders;

use App\Models\Navire;
use App\Models\Ressource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RessourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $ressource              = new Ressource();
        $ressource->nom         = "eau";
        $ressource->quantite    = 2540;
        $ressource->type        = "boisson";
        $ressource->navire_id   = Navire::all()->random()->id;
        $ressource->save();

        // 2
        $ressource             = new Ressource();
        $ressource->nom        = "banane";
        $ressource->quantite   = 554;
        $ressource->type       = "fruit";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();

        // 3
        $ressource             = new Ressource();
        $ressource->nom        = "coco";
        $ressource->quantite   = 145;
        $ressource->type       = "fruit";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();

        // 4
        $ressource             = new Ressource();
        $ressource->nom        = "poulet";
        $ressource->quantite   = 147;
        $ressource->type       = "viande";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();

        // 5
        $ressource             = new Ressource();
        $ressource->nom        = "sardine";
        $ressource->quantite   = 1240;
        $ressource->type       = "poisson";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();

        // 6
        $ressource             = new Ressource();
        $ressource->nom        = "anchoix";
        $ressource->quantite   = 427;
        $ressource->type       = "poisson";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();

        // 7
        $ressource             = new Ressource();
        $ressource->nom        = "patates";
        $ressource->quantite   = 4259;
        $ressource->type       = "légume";
        $ressource->navire_id  = Navire::all()->random()->id;
        $ressource->save();
    }
}
