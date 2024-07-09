<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel SAW</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Laravel SAW</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kriteria.index') }}">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('alternatif.index') }}">Alternatif</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="{{ route('saw.index') }}">Perhitungan SAW</a> --}}
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content mt-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
