<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // ✅ Tambahkan ini untuk mengakses Auth

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Perbaikan penulisan Auth dan pengecekan role
        if (Auth::check() && Auth::user()->role === "admin") {
            return $next($request);
        }

        // ✅ Tampilkan pesan 403 jika bukan admin
        abort(403, "Hanya admin yang dapat mengakses halaman ini");
    }
}
