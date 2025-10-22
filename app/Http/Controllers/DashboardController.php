<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Visitor;
use App\Models\Evaluasi;
use App\Models\Agenda; // <- pastikan ada
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $evaluasi = Evaluasi::orderBy('tahun', 'asc')->get();

        // ==============================
        // Data Penilaian
        // ==============================
        $penilaian = Penilaian::orderBy('year')->get();

        $scores = $penilaian->pluck('score')->map(fn($s) => floatval($s))->filter();
        $maxScore = $scores->max();
        $minScore = $scores->min();
        $avgScore = $scores->avg();
        $maxYear = $penilaian->where('score', $maxScore)->first()?->year ?? 'N/A';
        $minYear = $penilaian->where('score', $minScore)->first()?->year ?? 'N/A';

        $lastTwo = $penilaian->sortByDesc('year')->take(2);
        $increase = 0;
        if ($lastTwo->count() == 2) {
            $current = floatval($lastTwo->first()->score);
            $previous = floatval($lastTwo->last()->score);
            $increase = $current - $previous;
        }

        // ==============================
        // Statistik Pengunjung
        // ==============================
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $month = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
        $year  = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        // ==============================
        // Agenda Smart City
        // ==============================
        // (opsional) hapus agenda yang sudah lewat — hapus baris ini jika tidak mau auto-delete
        Agenda::where('tanggal', '<', Carbon::today())->delete();

        // ambil agenda mendatang (limit 5 misal)
        $agendas = Agenda::whereDate('tanggal', '>=', Carbon::today())
                        ->orderBy('tanggal', 'asc')
                         ->take(4)
                         ->get();

        // agenda berikutnya (terdekat)
        $nextAgenda = Agenda::whereDate('tanggal', '>=', Carbon::today())
                            ->orderBy('tanggal', 'asc')
                            ->first();

        // ==============================
        // Return view dengan semua variabel yang dibutuhkan
        // ==============================
        return view('admin.dashboard', [
            'penilaian' => $penilaian,
            'evaluasi' => $evaluasi,
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
            ],
            'agendas' => $agendas,
            'nextAgenda' => $nextAgenda,
        ]);
    }
}
