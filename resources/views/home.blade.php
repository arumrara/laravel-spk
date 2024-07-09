@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Selamat Datang di Sistem Pendukung Keputusan :)</h3>
                            </div>
                        </div>
                        <div class="card-body">
                          Sistem ini dapat membantu seseorang untuk mengambil keputusan dengan menggunakan Simple Additive Weighting Algorithm.
                            <br> Cara Penggunaan:
                            <ol>
                                <li>Masuk ke menu Kriteria & Bobot untuk menambahkan kriteria keputusan beserta bobotnya (kepentingan kriteria).</li>
                                <li>Kemudian masuk ke menu Alternatif untuk menambahkan alternatif (kandidat) dan memberikan nilai pada masing-masing kriteria.</li>
                                <li>Lalu masuk ke menu Normalisasi Dan Rank untuk melihat hasilnya.</li>
                                
                            </ol>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
