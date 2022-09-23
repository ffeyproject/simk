@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data Sabuk</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data Sabuk</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('data-sabuk.index') }}" class="btn btn-warning btn-md">Back</a>
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
                        <h3 class="card-title">Form Add Sabuk</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('data-sabuk.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_sabuk">Nama Sabuk</label>
                                <input type="text" name="nama_sabuk"
                                    class="form-control @error('nama_sabuk') is-invalid @enderror" id="nama_sabuk"
                                    value="{{ old('nama_sabuk') ?: '' }}" placeholder="Masukkan Nama Sabuk">
                                @if ($errors->has('nama_sabuk'))
                                <div class="invalid-feedback">{{
                                    $errors->first('nama_sabuk') }}</div>
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