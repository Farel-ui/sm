<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterplan;
use App\Models\Dimension;
use App\Models\QuickWin;
use App\Models\Booklet;
use App\Models\Iga;
use App\Models\Assessment;

abstract class Controller
{
     public function index()
{
    $masterplans = Masterplan::orderBy('period')->get();
    $dimensions = Dimension::all();
    $quickwins = QuickWin::all();
    $booklets = Booklet::all(); // ✅ sudah diperbaiki
    $igas = Iga::all();
    $institutions = Iga::select('institution')->distinct()->pluck('institution')->toArray();


    return view('welcome', compact('masterplans', 'dimensions', 'quickwins', 'booklets', 'igas'));
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
    $assessments = Assessment::orderBy('year')->get();
    return view('penilaian', compact('assessments'));
}
}
