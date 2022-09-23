@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Siswa</h1><br>
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
                <a href="{{ route('datasiswa.create') }}" class="btn btn-primary btn-lg">Add Siswa</a>
            </div>
        </div>
        @include('components.alert')
        @include('sweetalert::alert')
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="t_barang" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Induk Siswa</th>
                                    <th>Foto Siswa</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Nomer Hp</th>
                                    <th>Nama Ortu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($student as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nisk }}</td>
                                    <td><img src="{{ url('foto/user/'.$item->user['avatar']) }}"
                                            style="width: 100px; height: 100px;"></td>
                                    <td>{{ $item->user['name'] }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>
                                        @if ($item->tgl_lahir == null)
                                        <span class="badge bg-info text-dark">Belum Terisi</span>
                                        @else
                                        {{ $item->tgl_lahir }}
                                        @endif
                                    </td>
                                    <td>{{ $item->tahun_masuk }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->nama_ortu }}</td>
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
        $("#t_barang").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_barang_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection