<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        
        if (
            auth()->user()->detachement->nomDetachement === "EXPORT" or auth()->user()->detachement->nomDetachement === "MARITIME" or  auth()->user()->detachement->nomDetachement === "INFORMATIQUE"
            or auth()->user()->detachement->nomDetachement === "DIRECTION"
            or auth()->user()->detachement->nomDetachement === "CHEF"
            or auth()->user()->detachement->nomDetachement === "LIVRAISON"
            or auth()->user()->detachement->nomDetachement === "AERIEN"
        ) {

            return $next($request);
        }
    
    
        return redirect()->route('home');
    }
}
