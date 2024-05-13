<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LivraisonMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->detachement->nomDetachement === "LIVRAISON" 
        or auth()->user()->detachement->nomDetachement === "DIRECTION"
        or auth()->user()->detachement->nomDetachement === "INFORMATIQUE"  
        or auth()->user()->detachement->nomDetachement === "CHEF") {

            return $next($request);
        }

        return redirect()->route('home');
    }
}
