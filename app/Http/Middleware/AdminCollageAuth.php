<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCollageAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get(config('collage_admin.session_key')) !== true) {
            return redirect()->route('admin.site.gate');
        }

        return $next($request);
    }
}
