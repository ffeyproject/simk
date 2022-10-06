@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Data Categori</b></h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Categori</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">
                    Tambah Categori
                </button>
            </div>

            @include('sweetalert::alert')
        </div>

        <form method="post" action="{{route('data-categori.store')}}" id="form">
            @csrf
            <!-- Modal -->
            <div id="myModal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
                style="overflow:hidden;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="modal-header">
                            <h5 class="modal-title">Add Categori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="overflow: hidden;">
                            <div class="form-group">
                                <label for="nama_categori">Nama Categori</label>
                                <input type="text" name="nama_categori"
                                    class="form-control @error('nama_categori') is-invalid @enderror" id="nama_categori"
                                    value="{{ old('nama_categori') ?: '' }}" placeholder="Nama Categori">
                                @if ($errors->has('nama_categori'))
                                <div class="invalid-feedback">{{
                                    $errors->first('nama_categori') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label> Keterangan </label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" id="keterangan" value="{{ old('keterangan') ?: '' }}"></textarea>
                                @if ($errors->has('keterangan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('keterangan') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-success " id="ajaxSubmit">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
                        <table id="t_categori" class="table table-bordered table-striped" border="1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Naik</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $no = 1 ?>
                            <tbody>
                                @forelse ($categori as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_categori }}</td>
                                    <td>{!! $item->keterangan !!}</td>
                                    <td>
                                        <div class="container">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modalEdit{{$item->id}}">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <form method="POST" role="form"
                                                action="{{ route('data-categori.update', $item->id) }}" name=""
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')

                                                <div class="modal fade" id="modalEdit{{$item->id}}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Form Edit
                                                                    Data Customer</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_categori">Nama Categori</label>
                                                                    <input type="text" name="nama_categori"
                                                                        class="form-control @error('nama_categori') is-invalid @enderror"
                                                                        id="nama_categori" autocomplete="off"
                                                                        value="{{ $item->nama_categori }}" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <textarea
                                                                        class="form-control @error('keterangan') is-invalid @enderror"
                                                                        name="keterangan" id="eketerangan"
                                                                        value="{{ old('keterangan') ?: '' }}">{{ $item->keterangan }}</textarea>
                                                                    @if ($errors->has('keterangan'))
                                                                    <div class="invalid-feedback">{{
                                                                        $errors->first('keterangan') }}</div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <form action="{{ route('data-categori.destroy', $item->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"> Hapus</i>
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
        $("#t_categori").DataTable({
        }).buttons().container().appendTo('#t_absen_wrapper .col-md-2:eq(0)');
    });
</script>

<script>
    $(document).ready(function(){
    $('#student_id').select2({
    dropdownParent: $("#myModal"),
    placeholder: 'Pilih Siswa',
    width: '100%',
    allowClear: true
    });
    });
</script>

<script>
    $(document).ready(function(){
    $('#level_id').select2({
    dropdownParent: $("#myModal"),
    placeholder: 'Pilih Sabuk',
    width: '100%',
    allowClear: true
    });
    });
</script>

<script>
    ClassicEditor
.create( document.querySelector( '#keterangan' ) )
.catch( error => {
console.error( error );
} );
</script>
<script>
    ClassicEditor
.create( document.querySelector( '#eketerangan' ) )
.catch( error => {
console.error( error );
} );
</script>
@endsection