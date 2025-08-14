<?php

namespace App\Http\Controllers;

use App\Models\Masterplan;
use Illuminate\Http\Request;

class AdminMasterplanController extends Controller
{
    public function index()
    {
        // Ambil data masterplan paginated
        $masterplans = Masterplan::orderBy('period')->paginate(7);

        // Kirim ke view admin.masterplan.index
        return view('admin.masterplan.index', compact('masterplans'));
    }
}
