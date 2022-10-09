@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Data Pelatih</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Pelatih</li>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Profile Pelatih: <b>{{ $pelatih->nama }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('data-pelatih.update', $pelatih->id)}}" id="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="mb-3">
                            <label>Foto Pelatih</label><br>
                            <img src="{{ url('foto/pelatih/'.$pelatih->foto) }}"
                                style="width: 100px; height: 100px;"><br>
                            <label>*) Jika Foto Tidak Di Ganti, biarkan saja.</label><br>
                            <label for="foto">Masukkan Foto</label>
                            <input type="file" id="foto" name="foto" class="@error('foto') is-invalid @enderror"
                                value="{{ $pelatih->foto }}">
                            @if ($errors->has('foto'))
                            <div class="invalid-feedback">{{ $errors->first('foto') }}</div>
                            @endif
                            <p class="help-block">Max.5000kb</p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="nama">Nama Pelatih</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                id="nama" autocomplete="off" placeholder="" value="{{ $pelatih->nama }}"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="level_id">Nama Pelatih</label>
                            <select name="level_id" id="level_id"
                                class="form-control @error('level_id') is-invalid @enderror">
                                @foreach ($level as $item )
                                <option value="{{ $item->id }}" {{ $pelatih->level_id==$item->id ?
                                    'selected="selected"':''}}>
                                    {{ $item->nama_sabuk }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="L" @if(old('jenis_kelamin',$pelatih->jenis_kelamin)=='L' ) selected
                                    @endif>
                                    Laki - Laki
                                </option>
                                <option value="P" @if(old('jenis_kelamin',$pelatih->jenis_kelamin)=='P' ) selected
                                    @endif>
                                    Perempuan
                                </option>
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
                                autocomplete="off" placeholder="Masukkan Nomer Induk"
                                value="{{ $pelatih->tempat_lahir }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir"
                                class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                autocomplete="off" value="{{ $pelatih->tgl_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" autocomplete="off" placeholder="Masukkan Nomer Induk"
                                value="{{ $pelatih->no_hp }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="fb">Fb</label>
                            <input type="text" name="fb" class="form-control @error('fb') is-invalid @enderror" id="fb"
                                autocomplete="off" placeholder="" value="{{ $pelatih->fb }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter"
                                class="form-control @error('twitter') is-invalid @enderror" id="twitter"
                                autocomplete="off" placeholder="" value="{{ $pelatih->twitter }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="ig">Ig</label>
                            <input type="text" name="ig" class="form-control @error('ig') is-invalid @enderror" id="ig"
                                autocomplete="off" placeholder="" value="{{ $pelatih->ig }}" autocomplete="off">
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
    $(document).ready(function(){
          $('#user_id').select2({
              placeholder: 'Pilih Pelatih',
              minimumInputLength: 1,
              allowClear: true
        });
       });
</script>
<script>
    $(document).ready(function(){
          $('#jenis_kelamin').select2({
              placeholder: 'Pilih Gender',
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