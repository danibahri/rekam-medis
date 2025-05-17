<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use SweetAlert2\Laravel\Swal;


class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            Swal::toast([
                'icon' => 'warning',
                'title' => 'Anda belum login',
                'position' => 'top-end',
                'timer' => 3000,
                'showConfirmButton' => false,
                'showLoading' => true,
            ]);
            return redirect('/login');
        }
        return $next($request);
    }
}
