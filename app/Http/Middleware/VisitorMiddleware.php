<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Simpan data visitor
        Visitor::create([
        'ip_address' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);


        return $next($request);
    }
}
