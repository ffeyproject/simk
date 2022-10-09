@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data Pelatih</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data Pelatih</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('data-pelatih.index') }}" class="btn btn-warning btn-md">Back</a>
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
                        <h3 class="card-title">Form Add Pelatih</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('data-pelatih.store')}}" id="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" value="{{ old('foto') ?: '' }}" placeholder="">
                                @if ($errors->has('foto'))
                                <div class="invalid-feedback">{{
                                    $errors->first('foto') }}</div>
                                @endif
                                <p class="help-block">Max.5MB</p>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pelatih</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    id="nama" value="{{ old('nama') ?: '' }}" placeholder="">
                                @if ($errors->has('nama'))
                                <div class="invalid-feedback">{{
                                    $errors->first('nama') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="level_id">Sabuk</label>
                                <select name="level_id" id="level_id"
                                    class="form-control @error('level_id') is-invalid @enderror">
                                    <option value="{{ old('level_id') ?: '' }}"></option>
                                    @foreach($level as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sabuk }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('level_id'))
                                <div class="invalid-feedback">{{
                                    $errors->first('level_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin"
                                    class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                    <option value=""></option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @if ($errors->has('jenis_kelamin'))
                                <div class="invalid-feedback">{{
                                    $errors->first('jenis_kelamin') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                                    value="{{ old('tempat_lahir') ?: '' }}" placeholder="">
                                @if ($errors->has('tempat_lahir'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tempat_lahir') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir"
                                    class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                    value="{{ old('tgl_lahir') ?: '' }}" placeholder="">
                                @if ($errors->has('tgl_lahir'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tgl_lahir') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" name="no_hp"
                                    class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                    value="{{ old('no_hp') ?: '' }}" placeholder="">
                                @if ($errors->has('no_hp'))
                                <div class="invalid-feedback">{{
                                    $errors->first('no_hp') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="fb">FB</label>
                                <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror"
                                    id="fb" value="{{ old('fb') ?: '' }}" placeholder="">
                                @if ($errors->has('fb'))
                                <div class="invalid-feedback">{{
                                    $errors->first('fb') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter"
                                    class="form-control @error('twitter') is-invalid @enderror" id="twitter"
                                    value="{{ old('twitter') ?: '' }}" placeholder="">
                                @if ($errors->has('twitter'))
                                <div class="invalid-feedback">{{
                                    $errors->first('twitter') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="ig">IG</label>
                                <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror"
                                    id="ig" value="{{ old('ig') ?: '' }}" placeholder="">
                                @if ($errors->has('ig'))
                                <div class="invalid-feedback">{{
                                    $errors->first('ig') }}</div>
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
          $('#level_id').select2({
              placeholder: 'Pilih Pelatih',
              minimumInputLength: 1,
              allowClear: true
        });
       });
</script>
<script>
    $(document).ready(function(){
          $('#jenis_kelamin').select2({
              placeholder: 'Jenis Kelamin',
              allowClear: true
        });
       });
</script>
<script>
    $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>


</script>
@endsection