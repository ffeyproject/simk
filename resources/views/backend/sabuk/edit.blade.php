@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Data Sabuk</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Sabuk</li>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Nama Sabuk: {{ $level->nama_sabuk }} <b>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('data-sabuk.update', $level->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="nama_sabuk">Nama Sabuk</label>
                                <input type="text" name="nama_sabuk"
                                    class="form-control @error('nama_sabuk') is-invalid @enderror" id="nama_sabuk"
                                    autocomplete="off" placeholder="" value="{{ $level->nama_sabuk }}"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" id="keterangan"
                                    value="{{ old('keterangan') ?: '' }}">{{ $level->keterangan }}</textarea>
                                @if ($errors->has('keterangan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('keterangan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" @if(old('status',$level->status)=='1' ) selected @endif>
                                        Aktif
                                    </option>
                                    <option value="0" @if(old('status',$level->status)=='0' ) selected @endif>
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