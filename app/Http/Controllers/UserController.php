<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private function getDatas($navire_id)   // QUESTION typer la fontion ? :array
    {
        $navire = Navire::find($navire_id);
        $specialites = Specialite::select('id', 'nom')->get();

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        };

        return compact('navire', 'specialites', 'page');

    }
    public function getUsers($navire_id): View
    {
        $users = User::where('navire_id', $navire_id)->paginate(5); // paginate remplace ->get()

        $datas = $this->getDatas($navire_id);
        
        return view('users.users', array_merge(compact('users'), $datas));
    }

    public function searchSpecialite(Request $request, $navire_id) // QUESTION pas de type :view car else return pas view
    {
        if ($request->input('specialite') !== NULL) {
        $specialiteId = $request->input('specialite');
        $users = User::whereHas('specialites', function ($query) use ($specialiteId) {
            $query->where('specialite_id', $specialiteId);
        })->where('navire_id', $navire_id)->paginate(5);

        $datas = $this->getDatas($navire_id);

        return view('users.users', array_merge(compact('users'), $datas));

    } else {

        return redirect()->route('users',$navire_id);

    }
    }

    public function orderByAge(Request $request, $navire_id): View
    {
        $users = User::where('navire_id', $navire_id)->orderBy('age', 'asc')->paginate(5);
        $datas = $this->getDatas($navire_id);

        return view('users.users', array_merge(compact('users'), $datas));
    }
}
