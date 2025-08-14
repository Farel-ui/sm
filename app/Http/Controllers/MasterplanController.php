<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterplan;
use App\Models\Dimension;
use App\Models\QuickWin;
use App\Models\Booklet;
use App\Models\Iga;
use App\Models\Assessment;

class MasterplanController extends Controller
{
    public function index()
    {
        $masterplans = Masterplan::orderBy('period')->paginate(7);
        $dimensions = Dimension::all();
        $quickwins = QuickWin::all();
        $booklets = Booklet::all();
        $implementasi = Masterplan::where('type', 'implementasi')->orderBy('period')->get();
        $penghargaan = Masterplan::where('type', 'penghargaan')->orderBy('period')->get();
        $igas = Iga::all();
        $assessments = Assessment::orderBy('year')->get();

        return view('welcome', compact('masterplans', 'dimensions', 'quickwins', 'booklets', 'igas', 'implementasi', 'assessments'));
    }

    public function masterplan()
{
    $masterplans = Masterplan::orderBy('period')->paginate(7);
    return view('masterplan', compact('masterplans'));
}


    public function buku()
    {
        $title = 'Masterplan Smart City (Buku)';
        $masterplans = Masterplan::where('type', 'buku')->orderBy('period')->get();
        return view('masterplans.buku', compact('title', 'masterplans'));
    }

    public function paparan()
    {
        $title = 'Paparan Masterplan Smart City';
        $masterplans = Masterplan::where('type', 'paparan')->get();
        return view('masterplans.paparan', compact('title', 'masterplans'));
    }

    public function penilaian()
    {
        $assessments = \App\Models\Assessment::orderBy('year')->get();
        return view('penilaian', compact('assessments'));
    }

    public function iga()
    {
        $igas = \App\Models\Iga::all();
        return view('iga', compact('igas'));
    }

    public function admin()
    {
        return view('admin.dashboard', [
            'masterplans' => Masterplan::all(),
            'dimensions' => Dimension::all(),
            'quickwins' => QuickWin::all(),
            'booklets' => Booklet::all(),
            'igas' => Iga::all(),
            'assessments' => Assessment::all(),
        ]);
    }

    // Tambahan kosong untuk CRUD jika nanti ingin digunakan di admin
    public function create() {}
    public function store(Request $request) {}
    public function show(Masterplan $masterplan) {}
    public function edit(Masterplan $masterplan) {}
    public function update(Request $request, Masterplan $masterplan) {}
    public function destroy(Masterplan $masterplan) {}

    public function implementasi()
    {
        // Mengarah ke file resources/views/implementasi.blade.php
        return view('implementasi');
    }

    public function chartData(Request $request)
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

        $cacheKey = "chart_data_{$range}{$start->toDateString()}{$end->toDateString()}";

        $result = Cache::remember($cacheKey, 300, function () use ($range, $start, $end) {
            $query = Sale::whereBetween('date', [$start, $end]);

            if ($range === 'daily') {
                $rows = $query->select(DB::raw('DATE(date) as label, SUM(amount) as value'))->groupBy('label')->orderBy('label')->get();
            } elseif ($range === 'yearly') {
                $rows = $query->select(DB::raw('YEAR(date) as label, SUM(amount) as value'))->groupBy('label')->orderBy('label')->get();
            } else {
                $rows = $query->select(DB::raw("DATE_FORMAT(date, '%Y-%m') as label, SUM(amount) as value"))->groupBy('label')->orderBy('label')->get();
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
