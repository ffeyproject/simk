@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Galeri</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Galeri</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                <a href="{{ route('data-galeri.create') }}" class="btn btn-primary btn-lg">Add Galeri</a>
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
                        <table id="t_galeri" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Categori</th>
                                    <th>Nama Gambar</th>
                                    <th>Image</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($galleri as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->categori->nama_categori }}</td>
                                    <td>{{ $item->nama_gambar }}</td>
                                    <td><img src="{{ url('image/galeri/'.$item->image) }}"
                                            style="width: 100px; height: 100px;"></td>
                                    <td>{!! $item->keterangan !!}</td>
                                    <td>@if ($item->status == '1')
                                        <span class="badge bg-warning">Aktif</span>
                                        @else
                                        <span class="badge bg-danger">Non Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{route('data-galeri.edit', $item->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <form action="{{ route('data-galeri.destroy', $item->id) }}" method="POST"
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
        $("#t_galeri").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_barang_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection