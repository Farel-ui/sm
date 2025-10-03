<?php

namespace App\Http\Controllers;

use App\Models\Implementasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminImplementasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $implementasi = Implementasi::get();

        return view('admin.implementasi', [
            'implementasi' => $implementasi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_im');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf|max:20480'
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/implemen'), $filename);
        }

        Implementasi::create([
            'title' => $request->title,
            'file' => $filename,
        ]);

        return redirect()->route('admin.implementasi')->with('success', 'Dokumen berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $implementasi = Implementasi::findOrFail($id);
        return view('admin.edit_im', [
            'implementasi' => $implementasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|mimes:pdf|max:204800'
        ]);

        $implementasi = Implementasi::findOrFail($id);
        $filename = $implementasi->file;

        if ($request->hasFile('file')) {
            $oldPath = public_path('storage/implemen/' . basename($implementasi->file));
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/implemen'), $filename);
        }

        $implementasi->update([
            'title' => $request->title,
            'file' => $filename,
        ]);

        return redirect()->route('admin.implementasi')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $implementasi = Implementasi::findOrFail($id);

        $filepath = public_path('storage/implemen/' . basename($implementasi->file));
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $implementasi->delete();

        return redirect()->route('admin.implementasi')->with('success', 'Dokumen berhasil dihapus.');
    }
}
