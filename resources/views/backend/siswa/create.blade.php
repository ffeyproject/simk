@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data Siswa</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data Siswa</li>
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
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Form Add Siswa</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('datasiswa.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="user_id">Nama Siswa</label>
                                <select name="user_id" id="user_id"
                                    class="form-control @error('user_id') is-invalid @enderror">
                                    <option value="{{ old('user_id') ?: '' }}"></option>
                                    @foreach($user as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('user_id'))
                                <div class="invalid-feedback">{{
                                    $errors->first('user_id') }}</div>
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
                                <label for="tahun_masuk">Tanggal Masuk</label>
                                <input type="date" name="tahun_masuk"
                                    class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk"
                                    value="{{ old('tahun_masuk') ?: '' }}" placeholder="">
                                @if ($errors->has('tahun_masuk'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tahun_masuk') }}</div>
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