<?php

namespace App\Http\Controllers;

use App\Models\Masterplan;
use App\Models\Dimension;
use App\Models\QuickWin;
use App\Models\Booklet;
use App\Models\Iga;
use App\Models\Assessment;

class AdminController extends Controller
{
    public function index()
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

