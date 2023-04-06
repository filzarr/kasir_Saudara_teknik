<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Kasir
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->jabatan == 'superadmin' ||auth()->user()->jabatan == 'admin' ) {
            # code...
            return $next($request);
        }
        else{
            return redirect('/kasir');
        }
    }
}
