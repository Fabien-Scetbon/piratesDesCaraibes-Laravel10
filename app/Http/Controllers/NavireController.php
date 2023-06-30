<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\Tresor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
                if ($navire->item < 5) $navire->alert = 'Vous avez des réparations à prévoir !';
                if ($navire->item < 3) $navire->alert = 'Vous avez des réparations urgentes à prévoir !';
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
        $auth_specialites = Auth::user()->specialites->pluck('nom')->toArray();
        $is_cuisinier = in_array('cuisinier', $auth_specialites) ? true : false;
        $is_ingenieur = in_array('ingénieur', $auth_specialites) ? true : false;


        // dd($auth);
        $navire =  Navire::findOrFail($navire_id);
        $count = User::where('navire_id', $navire->id)->count();

        $etat = $this->getEtat($navire); // QUESTION mieux vaut il tout mettre dans 'navire' ?

        $totalPrix = Tresor::where('navire_id', $navire_id)->sum('prix');

        $totalPoids = Tresor::where('navire_id', $navire_id)->sum('poids');

        return view('navires.navire', compact('navire', 'count', 'etat', 'totalPrix', 'totalPoids', 'is_cuisinier', 'is_ingenieur')
        );
    }
}
