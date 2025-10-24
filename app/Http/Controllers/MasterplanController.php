<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Masterplan;
use App\Models\Dimension;
use App\Models\QuickWin;
use App\Models\Booklet;
use App\Models\Iga;
use App\Models\Penilaian;
use App\Models\implementasi;


class MasterplanController extends Controller
{
    public function index()
    {
        $masterplans  = Masterplan::all();
        $dimensions   = Dimension::all();
        $quickwins    = QuickWin::where('status', 'publish')->get();
        $booklets     = Booklet::where('status', 'publish')->get();
        $implementasi = implementasi::where('status', 'publish')->get();
        $igas         = Iga::where('status', 'publish')->get();
        $penilaian    = Penilaian::orderBy('year')->get();

        return view('welcome', compact(
            'masterplans',
            'dimensions',
            'quickwins',
            'implementasi',
            'booklets',
            'igas',
            'penilaian'
        ));
    }

    public function admin()
{
    return view('admin.dashboard');
}


public function implementasi()
{
    $implementasi = Implementasi::where('status', 'publish')->get();
    return view('implementasi', compact('implementasi'));
}


    public function paparan()
    {
        $title = 'Paparan Masterplan Smart City';
        $masterplans = Masterplan::where('type', 'paparan')
        ->where('status', 'publish')
        ->orderByDesc('tanggal')
        ->get();
        return view('paparan', compact('title', 'masterplans'));
    }

        public function masterplano()
    {
        $title = 'Masterplan Smart City';
        $masterplans = Masterplan::where('status', 'publish')
        ->where('type', 'buku')
        ->orderByDesc('tanggal')
        ->get();
        return view('masterplano', compact('title', 'masterplans'));
    }

    public function penilaian()
    {
        $penilaian = Penilaian::orderBy('year')->get();
        return view('penilaian', compact('penilaian'));
    }

    public function iga()
    {
        $igas = Iga::where('status', 'publish')->get();
        return view('iga', compact('igas'));
    }

    public function igi()
    {
        $igas = Iga::where('status', 'publish')->get();
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
}



