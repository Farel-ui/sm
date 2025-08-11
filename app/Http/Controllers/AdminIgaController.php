<?php

namespace App\Http\Controllers;

use App\Models\Iga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminIgaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $iga = Iga::get();

        return view('Admin.Iga', [
            'iga' => $iga
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_ig');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'institution' => 'required',
            'image' => 'required|image|max:10240' // 10MB
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/iga'), $filename);
        }

        Iga::create([
            'title' => $request->title,
            'institution' => $request->institution,
            'image' => $filename,
        ]);

        return redirect()->route('iga')->with('success', 'Dokumen Berhasil Ditambahkeun');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $iga = Iga::findOrFail($id);
        return view('admin.edit_ig', [
            'iga' => $iga
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'institution' => 'required',
            'image' => 'nullable|image|max:10240', // optional
        ]);

        $iga = Iga::findOrFail($id);
        $filename = $iga->image; // default: old image

        // If user uploads a new image
        if ($request->hasFile('image')) {
            // Delete old image
            $oldPath = public_path('images/iga/' . basename($iga->image));
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // Upload new image
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/igas'), $filename);
        }

        // Update database
        $iga->update([
            'title' => $request->title,
            'institution' => $request->institution,
            'image' => $filename,
        ]);

        return redirect()->route('iga')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $iga = Iga::findOrFail($id);

        // Delete physical file from folder if it exists
        $filepath = public_path('images/iga/' . basename($iga->image));

        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        // Delete data from database
        $iga->delete();

        return redirect()->route('iga')->with('success', 'Dokumen berhasil dihapus.');
    }
}
