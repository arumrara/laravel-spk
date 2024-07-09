<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $kriteria = Kriteria::count();
        
        $penduduk = Alternatif::count();
        // $penilaian = HasilView::count();
        $pengguna = User::count();
        return view('home', compact('kriteria','penduduk','pengguna'));
    }
}
