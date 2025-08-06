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
        $masterplan = Masterplan::get();

        return view('Admin.Masterplan',[
            'masterplan' => $masterplan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_mp');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required',
                'period' => 'required',
                'file' => 'mimes:pdf|max:20480'
            ],
        );
        $filename = null;
        if ($request->hasFile('file')){
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/masterplans'), $filename);
        }
        $masterplan = Masterplan::create([
            'title' => $request->title,
            'period' => $request->period,
            'file'=> $filename,
        ]);
        
        return redirect()->route('masterplan')->with('succes', 'Dokumen Berhasil Ditambahkeun');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $masterplan = Masterplan::findOrfail($id);
        return view('admin.edit_mp', [
            'masterplan' => $masterplan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'period' => 'required',
        'file' => 'nullable|mimes:pdf|max:20480', // optional
    ]);

    $masterplan = Masterplan::findOrFail($id);
    $filename = $masterplan->file; // default: file lama

    // Jika user upload file baru
    if ($request->hasFile('file')) {
        // Hapus file lama
        $oldPath = public_path('storage/masterplans/' . basename($masterplan->file));
        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        // Upload file baru
        $filename = time() . '_' . $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('storage/masterplans'), $filename);
    }

    // Update database
    $masterplan->update([
        'title' => $request->title,
        'period' => $request->period,
        'file' => $filename,
    ]);

    return redirect()->route('masterplan')->with('success', 'Dokumen berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $masterplan = Masterplan::findOrFail($id);

    // Hapus file fisik dari folder jika ada
    $filepath = public_path('storage/masterplans/' . basename($masterplan->file));

    if (File::exists($filepath)) {
        File::delete($filepath);
    }

    // Hapus data dari database
    $masterplan->delete();

    return redirect()->route('masterplan')->with('success', 'Dokumen berhasil dihapus.');
}
}
