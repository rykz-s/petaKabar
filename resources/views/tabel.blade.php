@extends('layouts.master', ['title'=>''])

@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Peta Kabar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Peta Kabar</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Peta Kabar</h3>
                    <div class="float-right">
                        <a class="btn btn-success" href="/nopane">Buka Peta!</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Kategori</th><!-- column 2 -->
                                <th>Kejadian</th> <!-- column 34567 -->
                                <th>Waktu Berita</th>
                                <th>Orang Terlibat</th>
                                <th>Provinsi</th> <!-- column 891011 -->
                                <th>Kabupaten</th>
                                <th>Kecamatan</th>
                                <th>Tingkat Keparahan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($response as $respons)
                            <tr style="text-transform: capitalize">
                                <td>{{$respons['kategori']}}</td>
                                <td>{{$respons['nama']}}</td>
                                <td>{{$respons['waktu']}}</td>
                                <td>{{$respons['orang_terlibat']}}</td>
                                <td>{{$respons['provinsi']}}</td>
                                <td>{{$respons['kabupaten']}}</td>   
                                <td>{{$respons['kecamatan']}}</td>   
                                <td>{{$respons['tingkat_keparahan']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection

<!-- CSS tertentu jika ingin beda dari page yang lain -->
@push('css')
<style>
    .btn-red {
        background-color: red;
        color: white;
    }
</style>
@endpush

<!-- JS tertentu jika ingin beda dari page yang lain -->
@push('js')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
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


@endpush