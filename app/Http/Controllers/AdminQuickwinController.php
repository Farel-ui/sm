<?php

namespace App\Http\Controllers;

use App\Models\Quickwin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QuickwinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quickwins = Quickwin::all();

        return view('Admin.Quickwin',[
            'quickwin' => $quickwin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quickwin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|max:10240', // 10MB
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/quickwins'), $filename);
        }

        Quickwin::create([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $filename,
        ]);

        return redirect()->route('quickwin.index')->with('success', 'QuickWin berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quickwin = Quickwin::findOrFail($id);
        return view('admin.quickwin.edit', compact('quickwin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:10240',
        ]);

        $quickwin = Quickwin::findOrFail($id);
        $filename = $quickwin->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('storage/quickwins/' . $quickwin->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('storage/quickwins'), $filename);
        }

        $quickwin->update([
            'title'       => $request->title,
            'description' => $request->description,
            'image'       => $filename,
        ]);

        return redirect()->route('quickwin.index')->with('success', 'QuickWin berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quickwin = Quickwin::findOrFail($id);

        $filepath = public_path('storage/quickwins/' . $quickwin->image);
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $quickwin->delete();

        return redirect()->route('quickwin.index')->with('success', 'QuickWin berhasil dihapus.');
    }
}
