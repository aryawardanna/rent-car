<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MembersMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lakukan pengecekan untuk memastikan bahwa user yang sedang login adalah anggota (members)
        // dd();
        if (auth()->check() && auth()->guard('members')->user()) {
            return $next($request);
        }

        // Jika tidak, arahkan ke halaman yang sesuai (misalnya halaman home)
        return redirect('/home')->with('error', 'Unauthorized');
    }
}
