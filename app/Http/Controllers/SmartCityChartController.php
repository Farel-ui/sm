<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SmartCityChart;

class SmartCityChartController extends Controller
{
    /**
     * Menampilkan semua data chart (halaman admin)
     */
    public function index()
    {
        $charts = SmartCityChart::orderBy('tahun', 'asc')->get();
        return view('admin.chart.index', compact('charts'));
    }

    /**
     * Menampilkan form tambah data chart
     */
    public function create()
    {
        return view('admin.chart.create');
    }

    /**
     * Simpan data chart baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        SmartCityChart::create([
            'tahun' => $request->tahun,
            'nilai' => $request->nilai,
        ]);

        return redirect()->route('chart.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit chart berdasarkan ID
     */
    public function edit($id)
    {
        $chart = SmartCityChart::findOrFail($id);
        return view('admin.chart.edit', compact('chart'));
    }

    /**
     * Simpan update dari chart yang diedit
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer|min:1900|max:' . date('Y'),
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        $chart = SmartCityChart::findOrFail($id);
        $chart->update($request->only(['tahun', 'nilai']));

        return redirect()->route('chart.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Menghapus data chart
     */
    public function destroy($id)
    {
        $chart = SmartCityChart::findOrFail($id);
        $chart->delete();

        return redirect()->route('chart.index')->with('success', 'Data berhasil dihapus');
    }

    /**
     * Menampilkan grafik ke halaman publik
     */
    public function publicChart()
    {
        $charts = SmartCityChart::orderBy('tahun', 'asc')->get();
        return view('penilaian', compact('charts'));
    }
}
