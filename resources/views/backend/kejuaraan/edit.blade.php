@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Data Siswa</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="">
            <div class="">
                <a href="{{ route('datasiswa.index') }}" class="btn btn-warning btn-md">Back</a>
            </div>
        </div>
    </section>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Nama Kejuaraan: {{ $kejuaraan->nama_kejuaraan }} <b>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('data-kejuaraan.update', $kejuaraan->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nama_kejuaraan">Nama Kejuaraan</label>
                                <input type="text" name="nama_kejuaraan"
                                    class="form-control @error('nama_kejuaraan') is-invalid @enderror"
                                    id="nama_kejuaraan" autocomplete="off" placeholder=""
                                    value="{{ $kejuaraan->nama_kejuaraan }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tgl_kejuaraan">Tanggal Kejuaraan</label>
                                <input type="text" name="tgl_kejuaraan"
                                    class="form-control @error('tgl_kejuaraan') is-invalid @enderror" id="tgl_kejuaraan"
                                    autocomplete="off" placeholder="Masukkan Nomer Induk"
                                    value="{{ $kejuaraan->tgl_kejuaraan }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tingkatan_kejuaraan">Tingkatan Kejuaraan</label>
                                <input type="text" name="tingkatan_kejuaraan"
                                    class="form-control @error('tingkatan_kejuaraan') is-invalid @enderror"
                                    id="tingkatan_kejuaraan" autocomplete="off" placeholder=""
                                    value="{{ $kejuaraan->tingkatan_kejuaraan }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="tempat_kejuaraan">Tempat Kejuaraan</label>
                                <input type="text" name="tempat_kejuaraan"
                                    class="form-control @error('tempat_kejuaraan') is-invalid @enderror"
                                    id="tempat_kejuaraan" autocomplete="off" placeholder=""
                                    value="{{ $kejuaraan->tempat_kejuaraan }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" id="keterangan"
                                    value="{{ old('keterangan') ?: '' }}">{{ $kejuaraan->keterangan }}</textarea>
                                @if ($errors->has('keterangan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('keterangan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status')=='true' ? 'selected' : '' }}>
                                        Aktif
                                    </option>
                                    <option value="0" {{ old('status')=='false' ? 'selected' : '' }}>
                                        Non Aktif
                                    </option>
                                </select>
                                @if ($errors->has('status'))
                                <div class="invalid-feedback">{{
                                    $errors->first('status') }}</div>
                                @endif
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection

@section('tablejs')
<script>
    ClassicEditor
.create( document.querySelector( '#keterangan' ) )
.catch( error => {
console.error( error );
} );
</script>
@endsection