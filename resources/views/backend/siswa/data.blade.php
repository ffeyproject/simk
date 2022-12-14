@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Hallo, <b>{{ Auth::user()->name }}</b></h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                @foreach ($student as $menu )
                <a href="{{ route('siswa-absen.create', $menu->id) }}" target="_blank" class="btn btn-warning btn-lg"><i
                        class="fa fa-camera" aria-hidden="true"></i> Absen Disini</a>
                <a href="{{ route('profilesiswa.index', $menu->id) }}" target="_blank" class="btn btn-primary btn-lg"><i
                        class="fa fa-folder-open" aria-hidden="true"></i> Lihat Detail</a>
                <a href="{{ route('download.kartu', $menu->id) }}" target="_blank" class="btn btn-info btn-lg"><i
                        class="fa fa-id-card" aria-hidden="true"></i> Print Kartu</a>
                @endforeach
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</section>



<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Information</h3>
            </div>

            <div class="card-body">

                <div id="accordion">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                    Jadwal Latihan
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th style="width: 40px">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1 ?>
                                    <tbody>
                                        @foreach ( $jadwal as $waktu )
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $waktu->hari }}</td>
                                            <td>
                                                <span class="badge bg-warning">{{ $waktu->mulai }} WIB - {{
                                                    $waktu->berhenti
                                                    }} WIB</span>
                                            </td>
                                            <td>{!! $waktu->keterangan !!}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card card-warning">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                <a class="d-block w-100" data-toggle="collapse" href="#kejuaraan">
                                    Jadwal Pertandingan / Kejuaraan
                                </a>
                            </h4>
                        </div>
                        <div id="kejuaraan" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <table id="t_kejuaraan" class="table table-bordered table-striped" border="1">
                                    <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th width="100px">Tanggal</th>
                                            <th width="100px">Nama</th>
                                            <th width="100px">Tingkatan</th>
                                            <th width="100px">Tempat</th>
                                            <th width="100px">Note</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1 ?>
                                    <tbody>
                                        @forelse ($kejuaraan as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{$item->tgl_kejuaraan }}</td>
                                            <td>{{ $item->nama_kejuaraan }}</td>
                                            <td>{{ $item->tingkatan_kejuaraan }}</td>
                                            <td>{{ $item->tempat_kejuaraan }}</td>
                                            <td>{!! $item->keterangan !!}</td>
                                            @empty
                                        <tr>
                                            <td colspan="12">Data tidak ada.</td>
                                        </tr>
                                        </tr>

                                    </tbody>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Galeri Kegiatan</h3>
            </div>

            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($galleri as $image )
                        <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                            <img class="d-block w-100" src="{{ url('image/galeri/'.$image->image) }}"
                                style="width: 100px; height: 350px;" alt="First slide">
                        </div>
                        @endforeach
                        {{-- <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ url('image/galeri/logo.jpeg') }}"
                                style="width: 100px; height: 350px;" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('image/galeri/bersama.jpeg') }}"
                                style="width: 100px; height: 350px;" alt="Second slide">
                        </div> --}}
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-custom-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-4 mb-2">5 Data Absen Terakhir</h5>
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="t_absen" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Hadir</th>
                                    <th>Nama Siswa</th>
                                    <th>Jadwal Latihan</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($absen as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->tgl_hadir }}</td>
                                    <td>{{ $item->student->user->name }}</td>
                                    <td>{{ $item->jadwal->hari }}</td>
                                    <td><img src="{{ url('foto/absen/'.$item->foto) }}"
                                            style="width: 150px; height: 150px;">
                                    </td>
                                    <td>{!! $item->keterangan !!}</td>
                                    @empty
                                <tr>
                                    <td colspan="12">Data tidak ada.</td>
                                </tr>
                                </tr>

                            </tbody>
                            @endforelse
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('tablejs')

<script>
    $(function () {
        $("#t_sabuk").DataTable({
        }).buttons().container().appendTo('#t_sabuk_wrapper .col-md-2:eq(0)');
    });

</script>

<script>
    $(function () {
        $("#t_kejuaraan").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#t_kejuaraan_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection