<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyNavireId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userNavireId = auth()->user()->navire_id;
        $routeNavireId = $request->route('navire_id');

        if ($userNavireId != $routeNavireId) {
            abort(403, "Accès interdit.");
        }

        return $next($request);
    }
}
