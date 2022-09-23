@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data Kejuaraan</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data Kejuaraan</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('data-kejuaraan.index') }}" class="btn btn-warning btn-md">Back</a>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Add Kejuaraan</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('data-kejuaraan.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_kejuaraan">Nama Kejuaraan</label>
                                <input type="text" name="nama_kejuaraan"
                                    class="form-control @error('nama_kejuaraan') is-invalid @enderror"
                                    id="nama_kejuaraan" value="{{ old('nama_kejuaraan') ?: '' }}"
                                    placeholder="Masukkan Nama Kejuaraan">
                                @if ($errors->has('nama_kejuaraan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('nama_kejuaraan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tgl_kejuaraan">Tanggal Kejuaraan</label>
                                <input type="date" name="tgl_kejuaraan"
                                    class="form-control @error('tgl_kejuaraan') is-invalid @enderror" id="tgl_kejuaraan"
                                    value="{{ old('tgl_kejuaraan') ?: '' }}" placeholder="">
                                @if ($errors->has('tgl_kejuaraan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tgl_kejuaraan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tempat_kejuaraan">Tempat Kejuaraan</label>
                                <input type="text" name="tempat_kejuaraan"
                                    class="form-control @error('tempat_kejuaraan') is-invalid @enderror"
                                    id="tempat_kejuaraan" value="{{ old('tempat_kejuaraan') ?: '' }}"
                                    placeholder="Masukkan Tempat Kejuaraan">
                                @if ($errors->has('tempat_kejuaraan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tempat_kejuaraan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tingkatan_kejuaraan">Tingkatan Kejuaraan</label>
                                <input type="text" name="tingkatan_kejuaraan"
                                    class="form-control @error('tingkatan_kejuaraan') is-invalid @enderror"
                                    id="tingkatan_kejuaraan" value="{{ old('tingkatan_kejuaraan') ?: '' }}"
                                    placeholder="Masukkan Tingkatan Kejuaraan">
                                @if ($errors->has('tingkatan_kejuaraan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tingkatan_kejuaraan') }}</div>
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
</section>

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