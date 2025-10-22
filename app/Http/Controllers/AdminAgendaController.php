<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AdminAgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agendas = Agenda::paginate(3);

        return view('admin.agenda.index', [
            'agendas' => $agendas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agenda.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        Agenda::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('dashboard')->with('success', 'Agenda berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', [
            'agenda' => $agenda
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $agenda = Agenda::findOrFail($id);
        $agenda->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
        ]);

        $page = $request->input('page', 1);

        return redirect()->route('dashboard', ['page' => $page])
                         ->with('success', 'Agenda berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return back()->with('success', 'Agenda berhasil dihapus.');
    }
}
