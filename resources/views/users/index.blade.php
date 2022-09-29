@extends('layouts.app')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Master User</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                <a href="{{ route('users.create') }}" class="btn btn-warning btn-lg">Tambah User </a>
            </div>
        </div>
        @include('components.alert')
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Roles</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == '1')
                                        <label for="">Aktif</label>
                                        @else
                                        <label for="">Non Aktif</label>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $user->status }}</td> --}}
                                    <td>
                                        @foreach($user->roles as $role)
                                        <span class="badge bg-primary">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="container">
                                            @if ($user->status == '1')
                                            <form method="post" action="{{route('users.non', $user->id)}}" id="form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-close">
                                                        Non Aktif</i></button>
                                            </form>
                                            @elseif ($user->status == '0')
                                            <form method="post" action="{{route('users.aktif', $user->id)}}" id="form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-close">
                                                        Aktif</i></button>
                                            </form>
                                            @endif
                                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning"><i
                                                    class="fas fa-info-circle"></i></a>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i
                                                    class="fa fa-edit"></i></a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
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
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_barang_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection