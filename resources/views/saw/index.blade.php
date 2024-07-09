@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perhitungan SAW</h1>
    <h2>Matriks Keputusan</h2>
    <table class="table table-bordered mt-2">
        <tr>
            <th>Alternatif</th>
            @foreach ($kriterias as $kriteria)
                <th>{{ $kriteria->nama }}</th>
            @endforeach
        </tr>
        @foreach ($matrix as $altName => $row)
        <tr>
            <td>{{ $altName }}</td>
            @foreach ($row as $nilai)
                <td>{{ $nilai }}</td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <h2>Matriks Normalisasi</h2>
    <table class="table table-bordered mt-2">
        <tr>
            <th>Alternatif</th>
            @foreach ($kriterias as $kriteria)
                <th>{{ $kriteria->nama }}</th>
            @endforeach
        </tr>
        @foreach ($normalized as $altName => $row)
        <tr>
            <td>{{ $altName }}</td>
            @foreach ($row as $nilai)
                <td>{{ $nilai }}</td>
            @endforeach
        </tr>
        @endforeach
    </table>

    <h2>Hasil Akhir</h2>
    <table class="table table-bordered mt-2">
        <tr>
            <th>Alternatif</th>
            <th>Skor</th>
        </tr>
        @foreach ($results as $altName => $score)
        <tr>
            <td>{{ $altName }}</td>
            <td>{{ $score }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
