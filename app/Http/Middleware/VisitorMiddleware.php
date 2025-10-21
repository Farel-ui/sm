<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Lewati halaman admin/dashboard
        if ($request->is('admin/*') || $request->is('dashboard*')) {
            return $next($request);
        }

        // Cek apakah sudah pernah tercatat di session
        if (!$request->session()->has('visitor_logged')) {
            try {
                Visitor::create([
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'url'        => $request->fullUrl(),
                    'visited_at' => now(),
                ]);

                // Tandai bahwa sesi ini sudah tercatat
                $request->session()->put('visitor_logged', true);
            } catch (\Exception $e) {
                \Log::error('VisitorMiddleware error: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
