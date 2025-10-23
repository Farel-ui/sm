<?php

namespace App\Http\Controllers;

use App\Models\Masterplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminMasterplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Urutkan dari yang terbaru berdasarkan tanggal dibuat
        $masterplan = Masterplan::orderByDesc('created_at')->paginate(6);

        return view('admin.masterplan.index', [
            'masterplan' => $masterplan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masterplan.create_mp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'period' => 'required|string|max:50',
            'type'   => 'required|in:buku,paparan',
            'status' => 'required|in:draft,publish',
            'tanggal' => 'nullable|date',
            'tahun' => 'nullable|integer|min:2000|max:2100',
            'file'   => 'nullable|mimes:pdf|max:20480',
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/masterplans/'), $filename);
        }

        Masterplan::create([
            'title'  => $request->title,
            'period' => $request->period,
            'type'   => $request->type,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'file'   => $filename,
        ]);

        return redirect()->route('admin.masterplan.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $masterplan = Masterplan::findOrFail($id);
        return view('admin.masterplan.edit_mp', [
            'masterplan' => $masterplan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'  => 'required|string|max:255',
            'period' => 'required|string|max:50',
            'type'   => 'required|in:buku,paparan',
            'status' => 'required|in:draft,publish',
            'tanggal' => 'nullable|date',
            'tahun' => 'nullable|integer|min:2000|max:2100',
            'file'   => 'nullable|mimes:pdf|max:10240'
        ]);

        $masterplan = Masterplan::findOrFail($id);
        $filename = $masterplan->file;

        if ($request->hasFile('file')) {
            $oldPath = public_path('storage/masterplans/' . basename($masterplan->file));
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/masterplans'), $filename);
        }

        $masterplan->update([
            'title'  => $request->title,
            'period' => $request->period,
            'type'   => $request->type,
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'file'   => $filename,
        ]);

        $page = $request->input('page', 1);

        return redirect()->route('admin.masterplan.index', ['page' => $page])
                         ->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $masterplan = Masterplan::findOrFail($id);

        $filepath = public_path('storage/masterplans/' . basename($masterplan->file));

        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $masterplan->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
