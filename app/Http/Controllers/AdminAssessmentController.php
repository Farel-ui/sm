<?php

namespace App\Http\Controllers;

use App\Models\Assessment; // Change to Assessment model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assessments = Assessment::get(); // Fetch assessments

        return view('Admin.Assessment', [
            'assessments' => $assessments // Pass assessments to the view
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_as'); // Change to create_assessment view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'color' => 'required', // Change to color
            'score' => 'required|numeric', // Change to score
            'year' => 'required|integer', // Add year validation
        ]);

        // Create assessment
        $assessment = Assessment::create([
            'color' => $request->color,
            'score' => $request->score,
            'year' => $request->year,
        ]);

        return redirect()->route('assessment')->with('success', 'Penilaian berhasil ditambahkan.');
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
        $assessment = Assessment::findOrFail($id); // Fetch assessment
        return view('admin.edit_as', [
            'assessment' => $assessment // Pass assessment to the view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'color' => 'required', // Change to color
            'score' => 'required|numeric', // Change to score
            'year' => 'required|integer', // Add year validation
        ]);

        $assessment = Assessment::findOrFail($id); // Fetch assessment

        // Update database
        $assessment->update([
            'color' => $request->color,
            'score' => $request->score,
            'year' => $request->year,
        ]);

        return redirect()->route('assessment')->with('success', 'Penilaian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $assessment = Assessment::findOrFail($id); // Fetch assessment

        // Delete assessment from database
        $assessment->delete();

        return redirect()->route('assessment')->with('success', 'Penilaian berhasil dihapus.');
    }
}
