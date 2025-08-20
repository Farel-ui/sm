<?php

namespace App\Http\Controllers;

use App\Models\Booklet; // Change to Booklet model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminBookletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booklet = Booklet::get(); // Change to Booklet model

        return view('Admin.Booklet', [
            'booklet' => $booklet // Change variable name
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_bk'); // Change view name
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'mimes:pdf|max:20480', // Assuming file is still needed
            'image' => 'nullable|image|max:2048' // Add image validation
        ]);

        $filename = null;
        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/booklets'), $filename); // Change directory
        }

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/booklets/images'), $imageName); // Change directory
        }

        $booklet = Booklet::create([
            'title' => $request->title,
            'file' => $filename,
            'image' => $imageName, // Save image name
        ]);

        return redirect()->route('booklet')->with('success', 'Dokumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booklet = Booklet::findOrFail($id); // Change to Booklet model
        return view('admin.edit_bk', [
            'booklet' => $booklet // Change variable name
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'nullable|mimes:pdf|max:20480', // optional
            'image' => 'nullable|image|max:2048' // Add image validation
        ]);

        $booklet = Booklet::findOrFail($id); // Change to Booklet model
        $filename = $booklet->file; // default: old file
        $imageName = $booklet->image; // default: old image

        // If user uploads a new file
        if ($request->hasFile('file')) {
            // Delete old file
            $oldFilePath = public_path('storage/booklets/' . basename($booklet->file));
            if (File::exists($oldFilePath)) {
                File::delete($oldFilePath);
            }

            // Upload new file
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/booklets'), $filename);
        }

        // If user uploads a new image
        if ($request->hasFile('image')) {
            // Delete old image
            $oldImagePath = public_path('images/' . basename($booklet->image));
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // Upload new image
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/booklets/images'), $imageName);
        }

        // Update database
        $booklet->update([
            'title' => $request->title,
            'file' => $filename,
            'image' => $imageName, // Update image name
        ]);

        return redirect()->route('booklet')->with('success', 'Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booklet = Booklet::findOrFail($id); // Change to Booklet model

        // Delete physical file from folder if exists
        $filePath = public_path('storage/booklets/' . basename($booklet->file));
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        // Delete physical image from folder if exists
        $imagePath = public_path('storage/booklets/images/' . basename($booklet->image));
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Delete data from database
        $booklet->delete();

        return redirect()->route('booklet')->with('success', 'Dokumen berhasil dihapus.');
    }
}
