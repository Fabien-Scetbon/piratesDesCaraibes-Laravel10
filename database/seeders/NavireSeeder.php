<?php

namespace Database\Seeders;

use App\Models\Navire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1
        $navire             = new Navire();
        $navire->nom        = "Black Pearl";
        $navire->bois       = "Chene";
        $navire->coque      = 4;
        $navire->misaine    = 9;
        $navire->mat        = 7;
        $navire->cachots    = 2;
        $navire->cabines    = 6;
        $navire->gouvernail = 8;
        $navire->voiles     = 5;
        $navire->pavillon   = 6;
        $navire->pont       = 9;
        $navire->canons     = 6;
        $navire->save();

        // 2
        $navire             = new Navire();
        $navire->nom        = "Blue Blood";
        $navire->bois       = "Sapin";
        $navire->coque      = 6;
        $navire->misaine    = 7;
        $navire->mat        = 8;
        $navire->cachots    = 3;
        $navire->cabines    = 6;
        $navire->gouvernail = 5;
        $navire->voiles     = 9;
        $navire->pavillon   = 6;
        $navire->pont       = 4;
        $navire->canons     = 2;
        $navire->save();

        // 3
        $navire             = new Navire();
        $navire->nom        = "La Murene";
        $navire->bois       = "Hetre";
        $navire->coque      = 4;
        $navire->misaine    = 6;
        $navire->mat        = 8;
        $navire->cachots    = 5;
        $navire->cabines    = 3;
        $navire->gouvernail = 7;
        $navire->voiles     = 6;
        $navire->pavillon   = 1;
        $navire->pont       = 4;
        $navire->canons     = 5;
        $navire->save();
        
    }
}
