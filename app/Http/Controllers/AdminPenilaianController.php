<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaians = Penilaian::paginate(6);

        return view('admin.penilaian', [ 
            'penilaians' => $penilaians
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_pn'); // form tambah penilaian
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required',
            'score' => 'required|numeric',
            'year'  => 'required|integer',
        ]);

        // buat penilaian baru
        $penilaian = Penilaian::create([
            'color' => $request->color,
            'score' => $request->score,
            'year'  => $request->year,
        ]);

        return redirect()->route('penilaian')->with('success', 'Penilaian berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penilaian = Penilaian::findOrFail($id);
        return view('admin.edit_pn', [
            'penilaian' => $penilaian
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'color' => 'required',
            'score' => 'required|numeric',
            'year'  => 'required|integer',
        ]);

        $penilaian = Penilaian::findOrFail($id);

        $penilaian->update([
            'color' => $request->color,
            'score' => $request->score,
            'year'  => $request->year,
        ]);

        return redirect()->route('penilaian')->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $penilaian->delete();

        return redirect()->route('penilaian')->with('success', 'Penilaian berhasil dihapus.');
    }
}
