<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // data penilaian
        $assessments = Assessment::orderBy('year')->get();

        // data pengunjung
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $month = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
        $year  = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        return view('admin.dashboard', [
            'assessments' => $assessments,
            'stats' => [
                'today' => $today,
                'month' => $month,
                'year'  => $year,
                'total' => $total,
            ]
        ]);
    }
}
