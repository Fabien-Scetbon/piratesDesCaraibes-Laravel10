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
        $liste = [
            [
                'nom' => 'eau',
                'quantite' => 5740,
                'type' => 'boisson'
            ],
            [
                'nom' => 'banane',
                'quantite' => 345,
                'type' => 'fruit'
            ],
            [
                'nom' => 'coco',
                'quantite' => 145,
                'type' => 'fruit'
            ],
            [
                'nom' => 'poulet',
                'quantite' => 147,
                'type' => 'viande'
            ],
            [
                'nom' => 'sardine',
                'quantite' => 1240,
                'type' => 'poisson'
            ],
            [
                'nom' => 'anchoix',
                'quantite' => 427,
                'type' => 'poisson'
            ],
            [
                'nom' => 'patate',
                'quantite' => 1548,
                'type' => 'légumes'
            ]

        ];
        
        foreach ($liste as $item) {
            $ressource              = new Ressource();
            $ressource->nom         = $item['nom'];
            $ressource->quantite    = $item['quantite'];
            $ressource->type        = $item['type'];
            $ressource->navire_id   = Navire::all()->random()->id;
            $ressource->save();
        }
    }
}
