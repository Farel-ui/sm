<?php

namespace App\Http\Controllers;

use App\Models\Quickwin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminQuickwinController extends Controller
{
    public function index()
    {
        $quickwins = Quickwin::paginate(6);

        return view('Admin.Quickwin.index',[
            'quickwins' => $quickwins
        ]);
    }

    public function create()
    {
        return view('admin.quickwin.create_qw');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:draft,publish',
            'image'       => 'required|image|max:10240', // 10MB
        ]);

        $filename = null;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/quickwins'), $filename);
        }

        Quickwin::create([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'image'       => $filename,
        ]);

        return redirect()->route('admin.quickwin.index')->with('success', 'QuickWin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $quickwin = Quickwin::findOrFail($id);
        return view('admin.quickwin.edit_qw', compact('quickwin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'status'      => 'required|in:draft,publish',
            'image'       => 'nullable|image|max:10240',
        ]);

        $quickwin = Quickwin::findOrFail($id);
        $filename = $quickwin->image;

        if ($request->hasFile('image')) {
            $oldPath = public_path('images/quickwins/' . $quickwin->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/quickwins'), $filename);
        }

        $quickwin->update([
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'image'       => $filename,
        ]);

        return redirect()->route('admin.quickwin.index')->with('success', 'QuickWin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $quickwin = Quickwin::findOrFail($id);

        $filepath = public_path('images/quickwins/' . $quickwin->image);
        if (File::exists($filepath)) {
            File::delete($filepath);
        }

        $quickwin->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }
}
