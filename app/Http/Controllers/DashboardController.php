<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // data penilaian
        $penilaian = Penilaian::orderBy('year')->get();

        // data pengunjung
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $month = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
        $year  = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        // statistik penilaian tahunan
        $scores = $penilaian->pluck('score')->map(fn($s) => floatval($s))->filter();
        $maxScore = $scores->max();
        $minScore = $scores->min();
        $avgScore = $scores->avg();
        $maxYear = $penilaian->where('score', $maxScore)->first()?->year ?? 'N/A';
        $minYear = $penilaian->where('score', $minScore)->first()?->year ?? 'N/A';

        // kenaikan terakhir
        $lastTwo = $penilaian->sortByDesc('year')->take(2);
        $increase = 0;
        if ($lastTwo->count() == 2) {
            $current = floatval($lastTwo->first()->score);
            $previous = floatval($lastTwo->last()->score);
            $increase = $current - $previous;
        }

        return view('admin.dashboard', [
            'penilaian' => $penilaian,
            'stats' => [
                'today' => $today,
                'month' => $month,
                'year'  => $year,
                'total' => $total,
            ],
            'penilaianStats' => [
                'maxValue' => number_format($maxScore, 1),
                'maxYear' => $maxYear,
                'minValue' => number_format($minScore, 1),
                'minYear' => $minYear,
                'avgValue' => number_format($avgScore, 2),
                'increaseValue' => ($increase >= 0 ? '+' : '') . number_format($increase, 1),
            ]
        ]);
    }
}
