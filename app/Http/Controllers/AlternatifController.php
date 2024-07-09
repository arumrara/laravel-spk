<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatifs = Alternatif::all();
        $kriterias = Kriteria::all(); // Ambil semua kriteria untuk ditampilkan di tabel
        return view('alternatif.index', compact('alternatifs', 'kriterias'));
    }

    public function create()
    {
        $kriterias = Kriteria::all(); // Dapatkan semua kriteria untuk ditampilkan di form
        return view('alternatif.create', compact('kriterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kriteria' => 'required|array', // Validasi bahwa kriteria harus berupa array
            'kriteria.*' => 'required|numeric', // Validasi bahwa setiap nilai kriteria harus numerik
        ]);

        $alternatif = Alternatif::create($request->only('nama'));

        foreach ($request->kriteria as $kriteria_id => $nilai) {
            $alternatif->kriterias()->attach($kriteria_id, ['nilai' => $nilai]);
        }

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil ditambahkan.');
    }

    public function show(Alternatif $alternatif)
    {
        return view('alternatif.show', compact('alternatif'));
    }

    public function edit(Alternatif $alternatif)
    {
        $kriterias = Kriteria::all();
        return view('alternatif.edit', compact('alternatif', 'kriterias'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'nama' => 'required',
            'kriteria' => 'required|array',
            'kriteria.*' => 'required|numeric',
        ]);

        $alternatif->update($request->only('nama'));

        $alternatif->kriterias()->detach();
        foreach ($request->kriteria as $kriteria_id => $nilai) {
            $alternatif->kriterias()->attach($kriteria_id, ['nilai' => $nilai]);
        }

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil diperbarui.');
    }

    public function destroy(Alternatif $alternatif)
    {
        $alternatif->delete();

        return redirect()->route('alternatif.index')
                         ->with('success', 'Alternatif berhasil dihapus.');
    }
}
