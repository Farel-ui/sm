<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterplan;

class MasterplanController extends Controller
{
    public function index()
    {
        // Ambil data masterplan
        $masterplan = Masterplan::paginate(10);

        // Hitung statistik
        $totalMasterplan = Masterplan::count();
        $aktif = Masterplan::where('status','aktif')->count();
        $tidakAktif = Masterplan::where('status','tidak aktif')->count();
        $bulanIni = Masterplan::whereMonth('created_at', now()->month)->count();

        // Kirim ke view
        return view('masterplan.index', compact('masterplan','totalMasterplan','aktif','tidakAktif','bulanIni'));
    }

    

}
