<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    public function index(Request $request)
    {
        // total kunjungan (semua rows)
        $total = Visitor::count();

        // unique IP (perkiraan unique visitor)
        $unique_ips = Visitor::distinct('ip_address')->count('ip_address');

        // unique per hari (mis. hari ini)
        $today_total = Visitor::whereDate('visited_at', now()->toDateString())->count();

        // Top 10 IPs (berapa kali datang)
        $top_ips = Visitor::select('ip_address', DB::raw('count(*) as visits'))
                          ->groupBy('ip_address')
                          ->orderByDesc('visits')
                          ->limit(10)
                          ->get();

        // Latest visitors
        $latest = Visitor::orderByDesc('visited_at')->limit(50)->get();

        return view('admin.visitors.index', compact(
            'total', 'unique_ips', 'today_total', 'top_ips', 'latest'
        ));
    }
}
