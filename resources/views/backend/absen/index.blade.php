@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Absen Siswa</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Absen Siswa</li>
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
        <h5 class="mt-4 mb-2">Data Absen</h5>
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header d-flex p-0">
                        <h3 class="card-title p-3">Menu Data Manage Absen</h3>
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link " href="#tab_1" data-toggle="tab">History
                                    Keselurahan</a>
                            </li>
                            <li class="nav-item"><a class="nav-link active" href="#tab_2" data-toggle="tab">History
                                    Pending</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane" id="tab_1">
                                <table id="t_absen" class="table table-bordered table-striped" border="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Hadir</th>
                                            <th>Nama Siswa</th>
                                            <th>Jadwal Latihan</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
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
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                @if ($item->status == 'PENDING')
                                                <form action="{{route('data-absen.hadir', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-check">
                                                            Hadir</i></button>
                                                </form>
                                                <form action="{{ route('data-absen.non', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm" href=""><i
                                                            class="fas fa-times">
                                                            Tidak Hadir</i>
                                                    </button>
                                                </form>
                                                @elseif ($item->status == 'HADIR')
                                                <form action="{{ route('data-absen.non', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm" href=""><i
                                                            class="fas fa-times">
                                                            Tidak Hadir</i>
                                                    </button>
                                                </form>
                                                @else
                                                <form action="{{route('data-absen.hadir', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-check">
                                                            Hadir</i></button>
                                                </form>
                                                @endif

                                                <form action="{{ route('siswa-absen.destroy', $item->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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

                            <div class="tab-pane active" id="tab_2">
                                <table id="t_pending" class="table table-bordered table-striped" border="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Hadir</th>
                                            <th>Nama Siswa</th>
                                            <th>Jadwal Latihan</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1 ?>
                                    <tbody>
                                        @forelse ($pending as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->tgl_hadir }}</td>
                                            <td>{{ $item->student->user->name }}</td>
                                            <td>{{ $item->jadwal->hari }}</td>
                                            <td><img src="{{ url('foto/absen/'.$item->foto) }}"
                                                    style="width: 100px; height: 100px;">
                                            </td>
                                            <td>{!! $item->keterangan !!}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <form action="{{route('data-absen.hadir', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                                            class="fas fa-check">
                                                            Hadir</i></button>
                                                </form>
                                                <form action="{{ route('data-absen.non', $item->id) }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm" href=""><i
                                                            class="fas fa-times">
                                                            Tidak Hadir</i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('siswa-absen.destroy', $item->id) }}"
                                                    method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
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

                        </div>

                    </div>
                </div>

            </div>

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
           "responsive": false,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#t_absen_wrapper .col-md-6:eq(0)');
    });

</script>
<script>
    $(function () {
        $("#t_pending").DataTable({
           "responsive": false,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#t_pending_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection