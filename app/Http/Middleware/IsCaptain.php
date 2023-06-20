<?php

namespace App\Http\Middleware;

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
        if (Auth::user()->is_capitaine == 1) {
            return $next($request);
        } else {
            return redirect("/")
                ->withSuccess('Welcome ' . Auth::user()->login); //->withSuccess('Opps! You do not have access');

        }
    }
}