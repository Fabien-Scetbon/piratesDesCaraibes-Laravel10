<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NavireController extends Controller
{
    public function getNavires(): View
    {
        $navires = Navire::all();
        foreach ($navires as $navire) {
            $count = User::where('navire_id', $navire->id)->count();
            $navire->count = $count;

            $etat = $navire->coque + $navire->misaine + $navire->mat + $navire->cachots + $navire->cabines + $navire->gouvernail + $navire->voiles + $navire->pavillon + $navire->pont + $navire->canons; // QUESTION faire plus simple ?
            $navire->etat = $etat;
        }

        return view('navires.navires', [
            'navires' => $navires,
        ]);
    }
}
