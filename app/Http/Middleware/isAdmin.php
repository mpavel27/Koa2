<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->web_admin == 9) {
            return $next($request);
        }

        toastr()->error('Nu esti autorizat sa accesezi aceasta pagina');
        return redirect()->route('app.home');
    }
}
