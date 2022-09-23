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
                    <h3 class="card-title">Update Profile Siswa: <b>{{ $student->user->name }}
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('datasiswa.update', $student->id)}}" id="form"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <h3>
                                <label for="nisk">Nomer Induk : </label>
                                <label>{{ $student->nisk }}</label>
                            </h3>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label>Foto Siswa</label><br>
                            <img src="{{ url('foto/user/'.$student->user['avatar']) }}"
                                style="width: 100px; height: 100px;"><br>
                            <label>*) Jika Foto Tidak Di Ganti, biarkan saja.</label><br>
                            <label for="avatar">Masukkan Foto</label>
                            <input type="file" id="avatar" name="avatar" class="@error('avatar') is-invalid @enderror"
                                value="{{ $student->user['avatar'] }}">
                            @if ($errors->has('avatar'))
                            <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                            @endif
                            <p class="help-block">Max.1500kb</p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="user_id">Nama Siswa</label>
                            <select name="user_id" id="user_id"
                                class="form-control @error('user_id') is-invalid @enderror">
                                @foreach ($user as $item )
                                <option value="{{ $item->id }}" {{ $student->user_id==$item->id ?
                                    'selected="selected"':''}}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                {{-- <option value="L" {{ old('jenis_kelamin')=='L' ? 'selected' : '' }}>
                                    Laki - Laki
                                </option>
                                <option value="P" {{ old('jenis_kelamin')=='P' ? 'selected' : '' }}>
                                    Perempuan
                                </option> --}}

                                <option value="L" @if(old('jenis_kelamin',$student->jenis_kelamin)=='L' ) selected
                                    @endif>
                                    Laki - Laki
                                </option>
                                <option value="P" @if(old('jenis_kelamin',$student->jenis_kelamin)=='P' ) selected
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
                                value="{{ $student->tempat_lahir }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir"
                                class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir"
                                autocomplete="off" value="{{ $student->tgl_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk">Tanggal Masuk</label>
                            <input type="date" name="tahun_masuk"
                                class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk"
                                autocomplete="off" placeholder="Masukkan Nomer Induk"
                                value="{{ $student->tahun_masuk }}" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                id="no_hp" autocomplete="off" placeholder="" value="{{ $student->no_hp }}"
                                autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="nama_ortu">Nama Ortu</label>
                            <input type="text" name="nama_ortu"
                                class="form-control @error('nama_ortu') is-invalid @enderror" id="nama_ortu"
                                autocomplete="off" placeholder="" value="{{ $student->nama_ortu }}" autocomplete="off">
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
              placeholder: 'Pilih Siswa',
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