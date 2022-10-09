@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Pelatih</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Pelatih</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                <a href="{{ route('data-pelatih.create') }}" class="btn btn-primary btn-lg">Add Pelatih</a>
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
                        <table id="t_pelatih" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISP</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>No HP</th>
                                    <th>FB</th>
                                    <th>Twitter</th>
                                    <th>IG</th>
                                    <th>Sabuk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($pelatih as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nisp }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td><img src="{{ url('foto/pelatih/'.$item->foto) }}"
                                            style="width: 100px; height: 100px;"></td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tempat_lahir }}</td>
                                    <td>{{ $item->tgl_lahir }}</td>
                                    <td>{{ $item->no_hp }}</td>
                                    <td>{{ $item->fb }}</td>
                                    <td>{{ $item->twitter }}</td>
                                    <td>{{ $item->fb }}</td>
                                    <td>{{ $item->level->nama_sabuk }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('data-pelatih.edit', $item->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="{{ route('data-pelatih.destroy', $item->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash">Hapus</i>
                                            </button>
                                        </form>
                                    </td>
                                    @empty
                                <tr>
                                    <td colspan="13">Data tidak ada.</td>
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
        $("#t_pelatih").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_barang_wrapper .col-md-15:eq(0)');
    });

</script>
@endsection