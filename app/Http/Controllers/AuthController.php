<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Navire;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function registration(): View
    {
        $navires = Navire::all();

        return view('auth.registration', [
            'navires' => $navires,
        ]);
    }

    public function postLogin(Request $request): RedirectResponse  // QUESTION utiliser Validator ?
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');  // only : ne recupere que email et pass dans l'obj $request
        if (Auth::attempt($credentials)) {
            $navire = Auth::user()->navireUser->nom;
            $pseudo = Auth::user()->pseudo;
            
            
            return redirect()->intended('dashboard') // renvoie autom l'user vers la page a laquelle il tentait d'acceder avant connex (ici soit dashboard, soit une page protegee)
                ->withSuccess('Tu es monté à bord du ' . $navire . ', '.$pseudo.' !'); // ajoute mess a session flash de Laravel, detruit apres utilisation
        }

        return redirect("login")->withSuccess('Tu ne fais pas partie des membres d\'équipage ! Dégage !');
    }

    public function postRegistration(Request $request): RedirectResponse
    {
        $request->validate([
            'pseudo'                => 'bail|required',
            'email'                 => 'bail|required|email|unique:users',
            'password'              => 'bail|required|confirmed|min:6',
            'password_confirmation' => 'bail|required'
        ]);

        $data = $request->all();
        $check = $this->createUser($data);

        return redirect("dashboard")->withSuccess('Bienvenu à bord du Navire, pirate !');
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('Tu dois montrer patte blanche, pirate !');
    }

    public function createUser(array $data)
    {
        return User::create([
            'pseudo'    => $data['pseudo'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'navire_id' => $data['navire_id'],
        ]);
    }

    public function logout(): RedirectResponse
    {
        Session::flush(); // nettoie la session
        Auth::logout();

        return Redirect('/');
    }
}
