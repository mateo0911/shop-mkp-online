<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class AutenticateBasic
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next) : Response
    {
        if (!session()->has('app_sesion')) {
            if (session("app_sesion") != "xLXAiX0fFTjLKEiJam7X57") {
                return redirect('/');
            }
            return redirect('/');
        }
        return $next($request);
    }
}
