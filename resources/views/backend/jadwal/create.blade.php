@extends('layouts.app')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Create Data jadwal</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Data jadwal</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="">
        <div class="">
            <a href="{{ route('data-jadwal.index') }}" class="btn btn-warning btn-md">Back</a>
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
                        <h3 class="card-title">Form Add jadwal</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('data-jadwal.store')}}" id="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <input type="text" name="hari" class="form-control @error('hari') is-invalid @enderror"
                                    id="hari" value="{{ old('hari') ?: '' }}" placeholder="Masukkan Hari">
                                @if ($errors->has('hari'))
                                <div class="invalid-feedback">{{
                                    $errors->first('hari') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="mulai">Mulai Latihan</label>
                                <input type="time" name="mulai"
                                    class="form-control @error('mulai') is-invalid @enderror" id="mulai"
                                    value="{{ old('mulai') ?: '' }}" placeholder="" min="00:00" max="23:59">
                                @if ($errors->has('mulai'))
                                <div class="invalid-feedback">{{
                                    $errors->first('mulai') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="berhenti">Berhenti Latihan</label>
                                <input type="time" name="berhenti"
                                    class="form-control @error('berhenti') is-invalid @enderror" id="berhenti"
                                    value="{{ old('berhenti') ?: '' }}" placeholder="Masukkan Berhenti Latihan"
                                    min="00:00" max="23:59">
                                @if ($errors->has('berhenti'))
                                <div class="invalid-feedback">{{
                                    $errors->first('berhenti') }}</div>
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