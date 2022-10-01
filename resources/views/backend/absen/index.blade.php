@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>My Data Siswa : <b>{{ Auth::user()->name }}</b></h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Siswa</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            {{-- <div class="col-sm-6">
                @foreach ($student as $menu )
                <a href="{{ route('siswa-absen.create', $menu->id) }}" class="btn btn-primary btn-lg">Show
                    Profile</a>
                @endforeach
            </div> --}}
        </div>
        @include('sweetalert::alert')
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h5 class="mt-4 mb-2">History Absen</h5>
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
                                    <th>Aksi</th>
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
                                            style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{!! $item->keterangan !!}</td>
                                    <td>
                                        <div class="container">
                                            <form action="{{route('datasiswa.edit', $item->id)}}" id="form">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-mouse">
                                                        Edit </i></button>
                                            </form>
                                            <form action="{{ route('datasiswa.delete', $item->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash">Hapus</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
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
        $("#t_absen").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true
        }).buttons().container().appendTo('#t_absen_wrapper .col-md-2:eq(0)');
    });

</script>
@endsection