<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\Specialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    private function getDatas($navire_id)   // QUESTION typer la fontion ? :array
    {
        $navire = Navire::find($navire_id);
        $specialites = Specialite::select('id', 'nom')->get();

        if (isset($_GET['page'])) {
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

    public function searchSpecialite(Request $request, $navire_id): View|RedirectResponse
    {
        if ($request->input('specialite') !== NULL) {
            $specialiteId = $request->input('specialite');
            $users = User::whereHas('specialites', function ($query) use ($specialiteId) {
                $query->where('specialite_id', $specialiteId);
            })->where('navire_id', $navire_id)->paginate(5);

            $datas = $this->getDatas($navire_id);

            return view('users.users', array_merge(compact('users'), $datas));
        } else {

            return redirect()->route('users', $navire_id);
        }
    }

    public function orderByAge(Request $request, $navire_id): View
    {
        $users = User::where('navire_id', $navire_id)->orderBy('age', 'asc')->paginate(5);
        $datas = $this->getDatas($navire_id);

        return view('users.users', array_merge(compact('users'), $datas));
    }

    public function getUser($user_id): View
    {
        $user =  User::find($user_id);

        return view('users.user', compact('user'));
    }

    public function addUser(): View
    {
        $navire_nom = Auth::user()->navireUser->nom;
        $specialites = Specialite::select('id', 'nom')->get();

        return view('users.add', compact('navire_nom', 'specialites'));
    }

    public function createUser(Request $request): RedirectResponse
    {
        $navire = Auth::user()->navireUser;
        // $specialites = Specialite::select('id', 'nom')->get();

        $datas = $request->all();

        // dd($datas);

        $validator = Validator::make($datas, [

            'nom'           => 'string|nullable',

            'prenom'        => 'string|nullable',

            'pseudo'        => 'string|required|max:8',

            'email'         => 'email|required|unique:users',

            'password'      => 'string|required|min:6',

            'age'           => 'integer|nullable|min:16|max:65',

            'description'   => 'string|nullable|max:50',

            'is_capitaine'  => 'boolean'

        ]);

        if ($validator->stopOnFirstFailure()->fails()) {

            return redirect('user/add')
                ->withErrors($validator)
                ->withInput();
        }

        $datas['password'] = Hash::make($datas['password']);
        $datas['navire_id'] = $navire->id;

        $user = User::create($datas);



        $message = $user->pseudo ." a rejoint l'équipage de " . $navire->nom." !";

        return redirect()->route('users',$navire->id)->with('message', $message);
    }
}
