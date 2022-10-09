@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Form Data Absensi</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Form Data Absensi</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('siswa-absen.index') }}" class="btn btn-warning btn-md">Back</a>
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
                        <h3 class="card-title">Silahkan Isi absen</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('siswa-absen.store')}}" id="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="student_id" value="{{ $student->id }}" hidden>
                            <br>
                            <div class="form-group">
                                <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" value="{{ old('foto') ?: '' }}" placeholder="">
                                @if ($errors->has('foto'))
                                <div class="invalid-feedback">{{
                                    $errors->first('foto') }}</div>
                                @endif
                                <p class="help-block">Max.20MB</p>
                            </div>
                            <div class="form-group">
                                <label for="jadwal_id">Pilih Jadwal</label>
                                <select name="jadwal_id" id="jadwal_id"
                                    class="form-control @error('jadwal_id') is-invalid @enderror">
                                    <option value="{{ old('jadwal_id') ?: '' }}"></option>
                                    @foreach($jadwal as $item)
                                    <option value="{{ $item->id }}">{{ $item->hari }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('jadwal_id'))
                                <div class="invalid-feedback">{{
                                    $errors->first('jadwal_id') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tgl_hadir">Tanggal Hadir</label>
                                <input type="date" name="tgl_hadir"
                                    class="form-control @error('tgl_hadir') is-invalid @enderror" id="tgl_hadir"
                                    value="{{ date('Y-m-d') }}" placeholder="Masukkan Berhenti Latihan" min="00:00"
                                    max="23:59">
                                @if ($errors->has('tgl_hadir'))
                                <div class="invalid-feedback">{{
                                    $errors->first('tgl_hadir') }}</div>
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
    $(document).ready(function(){
          $('#jadwal_id').select2({
              placeholder: 'Pilih Jadwal',
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

<script>
    $(function () {
        $("#t_absen").DataTable({
        }).buttons().container().appendTo('#t_absen_wrapper .col-md-2:eq(0)');
    });

</script>

@endsection