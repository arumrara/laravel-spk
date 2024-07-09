<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;

class SAWController extends Controller
{
    public function index()
{
    $kriterias = Kriteria::all(); // Ambil semua kriteria untuk perhitungan SAW
    $alternatifs = Alternatif::with('kriterias')->get();

    // Matriks keputusan
    $matrix = [];
    foreach ($alternatifs as $alt) {
        $row = [];
        foreach ($kriterias as $kriteria) {
            $row[] = $alt->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? 0;
        }
        $matrix[$alt->nama] = $row;
    }

    // Matriks normalisasi
    $normalized = [];
    foreach ($matrix as $altName => $row) {
        $normalizedRow = [];
        foreach ($row as $index => $nilai) {
            if ($kriterias[$index]->jenis === 'cost') {
                $min = min(array_column($matrix, $index));
                $normalizedRow[] = $min / $nilai;
            } else {
                $max = max(array_column($matrix, $index));
                $normalizedRow[] = $nilai / $max;
            }
        }
        $normalized[$altName] = $normalizedRow;
    }

    // Hasil akhir
    $results = [];
    foreach ($normalized as $altName => $row) {
        $score = 0;
        foreach ($row as $index => $nilai) {
            $score += $nilai * $kriterias[$index]->bobot;
        }
        $results[$altName] = $score;
    }

    return view('rank', compact('kriterias', 'matrix', 'normalized', 'results'));
}
}
