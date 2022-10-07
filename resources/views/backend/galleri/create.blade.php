@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data Galeri</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data Galeri</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('data-galeri.index') }}" class="btn btn-warning btn-md">Back</a>
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
                        <h3 class="card-title">Form Add Galeri</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('data-galeri.store')}}" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categorie_id">Nama Categori</label>
                                <select name="categorie_id" id="categorie_id"
                                    class="form-control @error('categorie_id') is-invalid @enderror">
                                    <option value="{{ old('categorie_id') ?: '' }}"></option>
                                    @foreach($categori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_categori }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categorie_id'))
                                <div class="invalid-feedback">{{
                                    $errors->first('categorie_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama_gambar">Nama Gambar</label>
                                <input type="text" name="nama_gambar"
                                    class="form-control @error('nama_gambar') is-invalid @enderror" id="nama_gambar"
                                    value="{{ old('nama_gambar') ?: '' }}" placeholder="">
                                @if ($errors->has('nama_gambar'))
                                <div class="invalid-feedback">{{
                                    $errors->first('nama_gambar') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Upload Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image"
                                    value="{{ old('image') ?: '' }}" placeholder="">
                                @if ($errors->has('image'))
                                <div class="invalid-feedback">{{
                                    $errors->first('image') }}</div>
                                @endif
                                <p class="help-block">Max.3.5MB</p>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
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
    $(document).ready(function(){
          $('#categorie_id').select2({
              placeholder: 'Pilih Categori',
              minimumInputLength: 1,
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

@endsection