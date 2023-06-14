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
        $tresor->description    = "Pierres volees aux Indes";
        $tresor->prix           = 547;
        $tresor->poids          = 0.8;
        $tresor->etat           = "neuf";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 2
        $tresor                 = new Tresor();
        $tresor->nom            = "statuettes";
        $tresor->description    = "Statuettes volees aux Incas";
        $tresor->prix           = 2126;
        $tresor->poids          = 5.6;
        $tresor->etat           = "use";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 3
        $tresor                 = new Tresor();
        $tresor->nom            = "tableaux";
        $tresor->description    = "Tableaux voles au Louvre";
        $tresor->prix           = 14096;
        $tresor->poids          = 10.4;
        $tresor->etat           = "abime";
        $tresor->navire_id    = Navire::all()->random()->id;
        $tresor->save();

        // 4
        $tresor                 = new Tresor();
        $tresor->nom            = "objets en argent";
        $tresor->description    = "Divers objets pilles sur des bateaux";
        $tresor->prix           = 14521;
        $tresor->poids          = 320.4;
        $tresor->etat           = "neuf";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

        // 5
        $tresor                 = new Tresor();
        $tresor->nom            = "oeuvres d\'art";
        $tresor->description    = "Oeuvres des quatre coins du monde";
        $tresor->prix           = 9851;
        $tresor->poids          = 38.9;
        $tresor->etat           = "use";
        $tresor->navire_id      = Navire::all()->random()->id;
        $tresor->save();

    }
}
