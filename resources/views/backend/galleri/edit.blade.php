@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Data Galeri</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Galeri</li>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Nama Galeri: {{ $galleri->nama_gambar }} <b>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{route('data-galeri.update', $galleri->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="categorie_id">Nama Categori</label>
                                <select name="categorie_id" id="categorie_id"
                                    class="form-control @error('categorie_id') is-invalid @enderror">
                                    @foreach ($categori as $item )
                                    <option value="{{ $item->id }}" {{ $galleri->categorie_id==$item->id ?
                                        'selected="selected"':''}}>
                                        {{ $item->nama_categori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_gambar">Nama Galeri</label>
                                <input type="text" name="nama_gambar"
                                    class="form-control @error('nama_gambar') is-invalid @enderror" id="nama_gambar"
                                    autocomplete="off" placeholder="" value="{{ $galleri->nama_gambar }}">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Image</label><br>
                                    <img src="{{ url('image/galeri/'.$galleri->image) }}"
                                        style="width: 100px; height: 100px;"><br>
                                    <label>*) Jika Image Tidak Di Ganti, biarkan saja.</label><br>
                                    <label for="image">Masukkan Image</label>
                                    <input type="file" id="image" name="image"
                                        class="@error('image') is-invalid @enderror" value="{{ $galleri->image }}">
                                    @if ($errors->has('image'))
                                    <div class="invalid-feedback">{{ $errors->first('image') }}</div>
                                    @endif
                                    <p class="help-block">Max.3500kb</p>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                        name="keterangan" id="keterangan"
                                        value="{{ old('keterangan') ?: '' }}">{{ $galleri->keterangan }}</textarea>
                                    @if ($errors->has('keterangan'))
                                    <div class="invalid-feedback">{{
                                        $errors->first('keterangan') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="1" @if(old('status',$galleri->status)=='1' ) selected @endif>
                                            Aktif
                                        </option>
                                        <option value="0" @if(old('status',$galleri->status)=='0' ) selected @endif>
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

<script>
    $(document).ready(function(){
          $('#categorie_id').select2({
              placeholder: 'Pilih Categori',
              minimumInputLength: 1,
              allowClear: true
        });
       });
</script>
@endsection