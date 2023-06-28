<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\Tresor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NavireController extends Controller
{
    private function getEtat($navire): Int
    {
        $etat = 0;
        foreach ($navire->getFillable() as $item) {
            if (is_int($navire->$item)) {
                $etat += $navire->$item;
            }
        }

        return $etat;
    }

    public function getNavires(): View
    {
        $navires = Navire::all();
        foreach ($navires as $navire) {
            $count = User::where('navire_id', $navire->id)->count();
            $navire->count = $count;

            $etat = $this->getEtat($navire);
            $navire->etat = $etat;
        }

        return view('navires.navires', [
            'navires' => $navires,
        ]);
    }

    public function getNavire($navire_id): View
    {
        $navire =  Navire::findOrFail($navire_id);
        $count = User::where('navire_id', $navire->id)->count();

        $etat = $this->getEtat($navire);

        $totalPrix = Tresor::where('navire_id', $navire_id)->sum('prix');

        $totalPoids = Tresor::where('navire_id', $navire_id)->sum('poids');

        return view('navires.navire', compact('navire', 'count', 'etat', 'totalPrix', 'totalPoids')
        );
    }
}
