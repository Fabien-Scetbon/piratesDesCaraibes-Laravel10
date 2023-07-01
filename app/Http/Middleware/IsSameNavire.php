<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSameNavire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()) {
            $authNavire = Auth::user()->navireUser->id;

            $user =  User::findOrFail($request->route('user_id'));

            $userNavire = $user->navireUser->id;

            if ($authNavire != $userNavire) {
                abort(403, "Accès interdit.");
            }

            return $next($request);
        } else abort(403, "Accès interdit.");
    } 
}
