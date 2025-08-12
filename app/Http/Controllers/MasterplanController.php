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
        $masterplans = Masterplan::orderBy('period')->get();
        $dimensions = Dimension::all();
        $quickwins = QuickWin::all();
        $booklets = Booklet::all();
        $igas = Iga::all();
        $assessments = Assessment::orderBy('year')->get();

        return view('welcome', compact(
            'masterplans',
            'dimensions',
            'quickwins',
            'booklets',
            'igas',
            'assessments'
        ));
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

    public function assessment()
    {
        $assessments = Assessment::orderBy('year')->get();
        return view('assessment', compact('assessments'));
    }

    public function iga()
    {
        $igas = Iga::all();
        return view('iga', compact('igas'));
    }

    // Ambil video berdasarkan ID Dimension
    public function dimensionVideo($id)
    {
        $dimension = Dimension::findOrFail($id);
        return response()->json([
            'video' => asset('storage/video/' . $dimension->video)
        ]);
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
}
