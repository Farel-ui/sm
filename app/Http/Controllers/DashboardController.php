<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Visitor;
use App\Models\Agenda;
use App\Models\Evaluasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 📊 Data penilaian
        $penilaian = Penilaian::orderBy('year')->get();

        // 📈 Data pengunjung
        $today = Visitor::whereDate('created_at', Carbon::today())->count();
        $month = Visitor::whereMonth('created_at', Carbon::now()->month)->count();
        $year  = Visitor::whereYear('created_at', Carbon::now()->year)->count();
        $total = Visitor::count();

        // 📉 Statistik penilaian tahunan
        $scores = $penilaian->pluck('score')->map(fn($s) => floatval($s))->filter();
        $maxScore = $scores->max();
        $minScore = $scores->min();
        $avgScore = $scores->avg();
        $maxYear = $penilaian->where('score', $maxScore)->first()?->year ?? 'N/A';
        $minYear = $penilaian->where('score', $minScore)->first()?->year ?? 'N/A';

        // 🔺 Kenaikan terakhir
        $lastTwo = $penilaian->sortByDesc('year')->take(2);
        $increase = 0;
        if ($lastTwo->count() == 2) {
            $current = floatval($lastTwo->first()->score);
            $previous = floatval($lastTwo->last()->score);
            $increase = $current - $previous;
        }

        Agenda::where('tanggal', '<', Carbon::today())->delete();

        // 🗓️ Ambil hanya agenda yang tanggalnya >= hari ini
        $agendas = Agenda::whereDate('tanggal', '>=', Carbon::today())
                        ->orderBy('tanggal', 'asc')
                        ->take(4)
                        ->get();

        // 🔔 Agenda hari ini & agenda terdekat
        $todayAgenda = Agenda::whereDate('tanggal', Carbon::today())->first();
        $upcomingAgenda = Agenda::whereBetween('tanggal', [Carbon::today(), Carbon::tomorrow()])
                                ->orderBy('tanggal', 'asc')
                                ->first();

        // 📅 Agenda berikutnya (untuk statistik tambahan)
        $nextAgenda = Agenda::whereDate('tanggal', '>', now())
                            ->orderBy('tanggal', 'asc')
                            ->first();

                            $evaluasi = Evaluasi::orderBy('tahun')->get();

        // ✅ Kirim semua data ke view
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
            'todayAgenda' => $todayAgenda,
            'upcomingAgenda' => $upcomingAgenda,
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function agendaIndex()
    {
        $agendas = Agenda::paginate(6);

        return view('admin.agenda.index', [
            'agendas' => $agendas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function agendaCreate()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function agendaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Agenda::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function agendaEdit(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', [
            'agenda' => $agenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function agendaUpdate(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        $page = $request->input('page', 1);

        return redirect()->route('admin.agenda.index', ['page' => $page])
                         ->with('success', 'Agenda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function agendaDestroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return back()->with('success', 'Agenda berhasil dihapus.');
    }
}
