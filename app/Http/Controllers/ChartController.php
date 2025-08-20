<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use DB;

class ChartController extends Controller
{
    public function index()
    {
        return view('chart');
    }

    public function data(Request $request)
    {
        $range = $request->get('range', 'monthly');
        $start = $request->get('start');
        $end = $request->get('end');

        $defaultEnd = Carbon::now();
        $defaultStart = Carbon::now()->subYears(5)->startOfMonth();

        try {
            $start = $start ? Carbon::parse($start) : $defaultStart;
            $end = $end ? Carbon::parse($end) : $defaultEnd;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid date format'], 422);
        }

        $cacheKey = "chart_data_{$range}_{$start->toDateString()}_{$end->toDateString()}";

        $result = Cache::remember($cacheKey, 300, function () use ($range, $start, $end) {
            $query = Sale::whereBetween('date', [$start, $end]);

            if ($range === 'daily') {
                $rows = $query->select(DB::raw("DATE(date) as label, SUM(amount) as value"))
                              ->groupBy('label')->orderBy('label')->get();
            } elseif ($range === 'yearly') {
                $rows = $query->select(DB::raw("YEAR(date) as label, SUM(amount) as value"))
                              ->groupBy('label')->orderBy('label')->get();
            } else {
                $rows = $query->select(DB::raw("DATE_FORMAT(date, '%Y-%m') as label, SUM(amount) as value"))
                              ->groupBy('label')->orderBy('label')->get();
            }

            $labels = [];
            $values = [];

            if ($range === 'daily') {
                $cursor = $start->copy();
                $map = $rows->pluck('value', 'label')->toArray();
                while ($cursor->lte($end)) {
                    $labels[] = $cursor->format('Y-m-d');
                    $values[] = $map[$cursor->format('Y-m-d')] ?? 0;
                    $cursor->addDay();
                }
            } elseif ($range === 'yearly') {
                $cursor = $start->copy()->startOfYear();
                $map = $rows->pluck('value', 'label')->toArray();
                while ($cursor->lte($end)) {
                    $labels[] = $cursor->format('Y');
                    $values[] = $map[$cursor->format('Y')] ?? 0;
                    $cursor->addYear();
                }
            } else {
                $cursor = $start->copy()->startOfMonth();
                $map = $rows->pluck('value', 'label')->toArray();
                while ($cursor->lte($end)) {
                    $labels[] = $cursor->format('Y-m');
                    $values[] = $map[$cursor->format('Y-m')] ?? 0;
                    $cursor->addMonth();
                }
            }

            return [
                'labels' => $labels,
                'values' => $values,
            ];
        });

        return response()->json($result);
    }
}
