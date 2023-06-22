<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function getUsers(): View
    {
        $users = User::paginate(5);
        foreach ($users as $user) {
            $navire = $user->navireUser->nom;
            $user->navire = $navire;
        }

        return view('users.users', [
            'users' => $users,
        ]);
    }
}
