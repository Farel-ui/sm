<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

class AdminEvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evaluasis = Evaluasi::orderBy('tahun', 'desc')->paginate(6);

        return view('admin.evaluasi.index', [
            'evaluasis' => $evaluasis
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.evaluasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 5) . '|unique:evaluasis,tahun',
            'baseline' => 'nullable|numeric|min:0|max:4',
            'output' => 'nullable|numeric|min:0|max:4',
            'outcome' => 'nullable|numeric|min:0|max:4',
            'impact' => 'nullable|numeric|min:0|max:4',
            'quick_wins' => 'nullable|numeric|min:0|max:4',
        ]);

        Evaluasi::create([
            'tahun' => $request->tahun,
            'baseline' => $request->baseline,
            'output' => $request->output,
            'outcome' => $request->outcome,
            'impact' => $request->impact,
            'quick_wins' => $request->quick_wins,
        ]);

        return redirect()->route('dashboard')->with('success', 'Data evaluasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        return view('admin.evaluasi.edit', [
            'evaluasi' => $evaluasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 5) . '|unique:evaluasis,tahun,' . $id,
            'baseline' => 'nullable|numeric|min:0|max:4',
            'output' => 'nullable|numeric|min:0|max:4',
            'outcome' => 'nullable|numeric|min:0|max:4',
            'impact' => 'nullable|numeric|min:0|max:4',
            'quick_wins' => 'nullable|numeric|min:0|max:4',
        ]);

        $evaluasi = Evaluasi::findOrFail($id);
        $evaluasi->update([
            'tahun' => $request->tahun,
            'baseline' => $request->baseline,
            'output' => $request->output,
            'outcome' => $request->outcome,
            'impact' => $request->impact,
            'quick_wins' => $request->quick_wins,
        ]);

        $page = $request->input('page', 1);

        return redirect()->route('admin.evaluasi.index', ['page' => $page])
                         ->with('success', 'Data evaluasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);
        $evaluasi->delete();

        return back()->with('success', 'Data evaluasi berhasil dihapus.');
    }
}
