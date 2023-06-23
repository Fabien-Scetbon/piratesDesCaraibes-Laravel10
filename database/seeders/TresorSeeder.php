<?php

namespace Database\Seeders;

use App\Models\Navire;
use App\Models\Tresor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TresorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $tresor                 = new Tresor();
        $tresor->nom            = "pierres precieuses";
        $tresor->description    = "Pierres volées aux Indes";
        $tresor->prix           = 547;
        $tresor->poids          = 0.8;
        $tresor->etat           = "neuf";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 2
        $tresor                 = new Tresor();
        $tresor->nom            = "statuettes";
        $tresor->description    = "Statuettes volées aux Incas";
        $tresor->prix           = 2126;
        $tresor->poids          = 5.6;
        $tresor->etat           = "usé";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 3
        $tresor                 = new Tresor();
        $tresor->nom            = "tableaux";
        $tresor->description    = "Tableaux volés au Louvre";
        $tresor->prix           = 14096;
        $tresor->poids          = 10.4;
        $tresor->etat           = "abimé";
        $tresor->navire_id    = Navire::all()->random()->id;
        $tresor->save();

        // 4
        $tresor                 = new Tresor();
        $tresor->nom            = "objets en argent";
        $tresor->description    = "Divers objets pillés sur des bâteaux";
        $tresor->prix           = 14521;
        $tresor->poids          = 320.4;
        $tresor->etat           = "neuf";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 5
        $tresor                 = new Tresor();
        $tresor->nom            = "oeuvres d'art";
        $tresor->description    = "Oeuvres des quatre coins du monde";
        $tresor->prix           = 9851;
        $tresor->poids          = 38.9;
        $tresor->etat           = "usé";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

    }
}
