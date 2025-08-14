<?php

namespace App\Http\Controllers;

use App\Models\Dimension; // Change to Dimension model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminDimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dimensions = Dimension::all(); // Fetch all dimensions

        return view('Admin.Dimension', [
            'dimensions' => $dimensions // Pass dimensions to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_dm'); // Return the create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Optional image
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480' // Optional video
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/dimensions/images'), $imageName);
        }

        $videoName = null;
        if ($request->hasFile('video')) {
            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('storage/dimensions/videos'), $videoName);
        }

        Dimension::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'video' => $videoName,
        ]);

        return redirect()->route('dimension')->with('success', 'Dimension berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dimension = Dimension::findOrFail($id); // Find the dimension by ID
        return view('admin.edit_dm', [
            'dimension' => $dimension // Pass the dimension to the edit view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048', // Optional image
            'video' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480' // Optional video
        ]);

        $dimension = Dimension::findOrFail($id); // Find the dimension by ID

        // Store old file names
        $oldImage = $dimension->image;
        $oldVideo = $dimension->video;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($oldImage) {
                $oldImagePath = public_path('storage/dimensions/images/' . basename($oldImage));
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/dimensions/images'), $imageName);
            $dimension->image = $imageName; // Update image name
        }

        // Handle video upload
        if ($request->hasFile('video')) {
            // Delete old video if exists
            if ($oldVideo) {
                $oldVideoPath = public_path('storage/dimensions/videos/' . basename($oldVideo));
                if (File::exists($oldVideoPath)) {
                    File::delete($oldVideoPath);
                }
            }
            $videoName = time() . '_' . $request->file('video')->getClientOriginalName();
            $request->file('video')->move(public_path('storage/dimensions/videos'), $videoName);
            $dimension->video = $videoName; // Update video name
        }

        // Update other fields
        $dimension->name = $request->name;
        $dimension->description = $request->description;
        $dimension->save(); // Save the updated dimension

        return redirect()->route('dimension')->with('success', 'Dimension berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dimension = Dimension::findOrFail($id); // Find the dimension by ID

        // Delete physical image if exists
        if ($dimension->image) {
            $imagePath = public_path('storage/dimensions/images/' . basename($dimension->image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete physical video if exists
        if ($dimension->video) {
            $videoPath = public_path('storage/dimensions/videos/' . basename($dimension->video));
            if (File::exists($videoPath)) {
                File::delete($videoPath);
            }
        }

        // Delete the dimension from the database
        $dimension->delete();

        return redirect()->route('dimension')->with('success', 'Dimension berhasil dihapus.');
    }
}
