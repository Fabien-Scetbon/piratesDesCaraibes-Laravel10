<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsCaptain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // teste si l'auth est captain ou si l'auth est le user a editer
        if (Auth::user()) {

            $authId = Auth::user()->id;

            $isSamePerson = false;

            if($request->route('user_id')) {

                $user =  User::findOrFail($request->route('user_id'));

                $userId = $user->id;
    
                if ($authId == $userId) $isSamePerson = true;
            }
            

            if (Auth::user()->is_capitaine == 1 || $isSamePerson ) {
                return $next($request);
            } else {
                abort(403, "Accès interdit.");
            }
        } else abort(403, "Accès interdit.");
    }
}
