@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Pendaftaran</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Pendaftar</li>
                </ol>
            </div>
        </div>
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
                                    <th>No Pendaftaran</th>
                                    <th>Tanggal Pendaftaran</th>
                                    <th>Nama Pendaftaran</th>
                                    <th>Email</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status</th>
                                    <th>Tanggal Verifikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($daftar as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->no_pendaftaran }}</td>
                                    <td>{{ $item->tgl_pendaftaran }}</td>
                                    <td>{{ $item->nama_pendaftaran }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->metode_pembayaran }}</td>
                                    <td><img src="{{ url('image/pendaftaran/'.$item->bukti_pembayaran) }}"
                                            style="width: 50px; height: 50px;">
                                    </td>
                                    <td>
                                        @if ($item->status == 'PENDING')
                                        <span class="badge bg-warning">{{ $item->status }}
                                            @else
                                            <span class="badge bg-primary">{{ $item->status }}
                                                @endif
                                    </td>
                                    <td>{{ $item->tgl_verifikasi }}</td>
                                    <td>
                                        <div class="container">
                                            <form method="post" action="{{route('datapendaftaran.status', $item->id)}}"
                                                id="form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success"><i class="fa fa-mouse">
                                                        Verifikasi </i></button>
                                            </form>
                                            {{-- <a href="{{ route('datapendaftaran.status', $item->id) }}"
                                                class="btn btn-warning"><i class="fa fa-edit"></i></a> --}}
                                            <form action="{{ route('datapendaftaran.destroy', $item->id) }}"
                                                method="POST" style="display: inline-block;">
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
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_barang_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection