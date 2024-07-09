{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Alternatif</h1>
    <a href="{{ route('alternatif.create') }}" class="btn btn-primary">Tambah Alternatif</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            {{ $message }}
        </div>
    @endif
    <table class="table table-bordered mt-2">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            @foreach ($kriterias as $kriteria)
                <th>{{ $kriteria->nama }}</th>
            @endforeach
            <th>Aksi</th>
        </tr>
        @foreach ($alternatifs as $alt)
        <tr>
            <td>{{ $alt->id }}</td>
            <td>{{ $alt->nama }}</td>
            @foreach ($kriterias as $kriteria)
                <td>{{ $alt->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? '-' }}</td>
            @endforeach
            <td>
                <a href="{{ route('alternatif.show', $alt->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection --}}


@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Alternative & Score</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <a href="{{ route('alternatif.create') }}" class='btn btn-primary'> <span
                                    class='fa fa-plus'></span> Add Alternative</a>

                            <br>
                            <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="example1" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        @foreach ($kriterias as $kriteria)
                                            <th>{{ $kriteria->nama }}</th>
                                        @endforeach
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatifs as $alt)
                                    <tr>
                                        <td>{{ $alt->id }}</td>
                                        <td>{{ $alt->nama }}</td>
                                        @foreach ($kriterias as $kriteria)
                                            <td>{{ $alt->kriterias()->where('kriteria_id', $kriteria->id)->first()->pivot->nilai ?? '-' }}</td>
                                        @endforeach
                                        <td>
                                            <a href="{{ route('alternatif.show', $alt->id) }}" class="btn btn-info">Lihat</a>
                                            <a href="{{ route('alternatif.edit', $alt->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('alternatif.destroy', $alt->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

@section('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('#mytable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection
