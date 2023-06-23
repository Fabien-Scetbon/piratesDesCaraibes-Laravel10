<?php

namespace App\Http\Controllers;

use App\Models\Navire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function getUsers($navire_id): View
    {
        $users = User::where('navire_id', $navire_id)->paginate(5); // paginate remplace ->get()
        $navire = Navire::where('id', $navire_id)->value('nom');

        return view('users.users', compact('users', 'navire'));
    }
}
