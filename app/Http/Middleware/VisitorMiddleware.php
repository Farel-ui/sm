<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ✅ Lewatin kalau URL mulai dengan /admin atau /dashboard
        if ($request->is('/')) 

        try {
            Visitor::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'url'        => $request->fullUrl(),
                'visited_at' => now(),
            ]);
        } catch (\Exception $e) {
            \Log::error('VisitorMiddleware error: '.$e->getMessage());
        }

        return $next($request);
    }
}
