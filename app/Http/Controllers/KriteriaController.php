<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric|min:0|max:1',
            'jenis' => 'required|in:benefit,cost',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function show(Kriteria $kriteria)
    {
        return view('kriteria.show', compact('kriteria'));
    }

    public function edit(Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required|numeric|min:0|max:1',
            'jenis' => 'required|in:benefit,cost',
        ]);

        $kriteria->update($request->all());

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy(Kriteria $kriteria)
    {
        $kriteria->delete();

        return redirect()->route('kriteria.index')
                         ->with('success', 'Kriteria berhasil dihapus.');
    }
}
