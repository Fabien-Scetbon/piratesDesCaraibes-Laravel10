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
        $navire = Navire::findOrFail($navire_id); // find renvoie null si pas trouvé, findorfail renvoie exception (try catch pour recup)
        $specialites = Specialite::select('id', 'nom')->orderBy('nom')->get();

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        };

        return compact('navire', 'specialites', 'page');
    }

    private function processNewSpecialites($new)
    {
        $spe_array = explode(' ', $new);

        foreach ($spe_array as $spe) {

            $array = ['nom' => strtolower($spe)];
            $validator = Validator::make($array, [

                'nom' => 'string|nullable|unique:specialites',
            ]);

            if ($validator->fails()) {
                redirect('user/add')  // pas return ici sinon renvoyé dans create user et gros bug
                    ->withErrors($validator)
                    ->withInput()
                    ->send();
            }

            Specialite::create($array);
        }

        $ids = Specialite::whereIn('nom', $spe_array)->pluck('id')->all();
        // dd($ids);

        return $ids;
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
        $user =  User::findOrFail($user_id);

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

        // old et new specialites
        if (!is_null($datas['new_specialites']) && isset($datas['$specialites'])) {

            $new_spe = $this->processNewSpecialites($datas['new_specialites']);
            $all_spes = array_merge($datas['$specialites'], $new_spe);
            $user->specialites()->attach($all_spes);

            // new specialites
        } elseif (!is_null($datas['new_specialites']) && !isset($datas['$specialites'])) {

            $all_spes = $this->processNewSpecialites($datas['new_specialites']);
            $user->specialites()->attach($all_spes);

            // old specialites
        } elseif (is_null($datas['new_specialites']) && isset($datas['$specialites'])) {

            $all_spes = $datas['$specialites'];
            $user->specialites()->attach($all_spes);
        }

        $message = $user->pseudo . " a rejoint l'équipage de " . $navire->nom . " !";

        return redirect()->route('users', $navire->id)->with('message', $message);
    }

    public function editUser($user_id): View
    {
        $user =  User::findOrFail($user_id);
        $navire = $user->navireUser;
        $specialites = Specialite::select('id', 'nom')->get();

        $specialites_user = $user->specialites;

        $spe_array = [];

        foreach($specialites_user as $spe) {
            array_push($spe_array, $spe->nom);
        }

        return view('users.edit', compact('user', 'navire', 'specialites', 'spe_array'));
    }

    public function updateUser(Request $request, $user_id): RedirectResponse
    {
        $user =  User::findOrFail($user_id);
        $navire = $user->navireUser;

        $datas = $request->all();

        // dd($datas['$specialites']);

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

        $spe_array = explode(' ', $datas['new_specialites']);

        foreach ($spe_array as $spe) {

            $array = ['nom' => strtolower($spe)];
            $validator = Validator::make($array, [

                'nom' => 'string|nullable|unique:specialites',
            ]);

            if ($validator->fails()) {

                return redirect('user/add')
                    ->withErrors($validator)
                    ->withInput();
            }

            Specialite::create($array);
        }

        $ids = Specialite::whereIn('nom', $spe_array)->pluck('id')->all();
        // dd($ids);

        $all_spes = array_merge($datas['$specialites'], $ids);
        // dd($all_spes);

        $user = User::create($datas);

        $user->specialites()->attach($all_spes);

        $message = $user->pseudo . " a rejoint l'équipage de " . $navire->nom . " !";

        return redirect()->route('users', $navire->id)->with('message', $message);
    }

    // pour sup de user ->  Detach all roles from the user...$user->roles()->detach();
}
