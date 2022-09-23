@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <section class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h1>Edit Data Jadwal</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Data Jadwal</li>
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Update Hari: {{ $jadwal->hari }} <b>
                    </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{route('data-jadwal.update', $jadwal->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <input type="text" name="hari" class="form-control @error('hari') is-invalid @enderror"
                                    id="hari" autocomplete="off" placeholder="" value="{{ $jadwal->hari }}"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="mulai">Jam Mulai</label>
                                <input type="time" name="mulai"
                                    class="form-control @error('mulai') is-invalid @enderror" id="mulai"
                                    autocomplete="off" placeholder="Masukkan Nomer Induk" value="{{ $jadwal->mulai }}"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="berhenti">Jam Berhenti</label>
                                <input type="time" name="berhenti"
                                    class="form-control @error('berhenti') is-invalid @enderror" id="berhenti"
                                    autocomplete="off" placeholder="" value="{{ $jadwal->berhenti }}"
                                    autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control @error('keterangan') is-invalid @enderror"
                                    name="keterangan" id="keterangan"
                                    value="{{ old('keterangan') ?: '' }}">{{ $jadwal->keterangan }}</textarea>
                                @if ($errors->has('keterangan'))
                                <div class="invalid-feedback">{{
                                    $errors->first('keterangan') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ old('status')=='true' ? 'selected' : '' }}>
                                        Aktif
                                    </option>
                                    <option value="0" {{ old('status')=='false' ? 'selected' : '' }}>
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