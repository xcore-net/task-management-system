<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            $user=Auth::user();
            $user = auth()->user();

            if ($user->hasRole("admin")){
                return redirect("/dashborad"); 
            }
            else{
                
                return redirect("/welcome");
            }
        }
        return $next($request);
    }
}