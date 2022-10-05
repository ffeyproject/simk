@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Profile</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('datasiswa.index') }}">Data Siswa</a></li>
                    <li class="breadcrumb-item active">Profile Siswa</li>
                </ol>
            </div>
        </div>
        <div class="mb-2 row">
            <div class="col-sm-6">
                <a href="{{ route('mydata.index') }}" class="btn btn-primary btn-lg">Back My Data</a>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="{{ url('foto/user/'.$student->user['avatar']) }}" alt="User profile picture">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalEdit{{$student->user_id}}">
                                Ganti Foto
                            </button>
                        </div>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.foto', $student->user_id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalEdit{{$student->user_id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Foto Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <input type="hidden" value="{{ $student->user_id }}">
                                                {{-- <label>Foto Siswa</label><br>
                                                <img src="{{ url('foto/user/'.$student->user['avatar']) }}"
                                                    style="width: 100px; height: 100px;"><br>
                                                <label>*) Jika Foto Tidak Di Ganti, biarkan saja.</label><br> --}}
                                                {{-- <label for="avatar">Gantikan Foto</label>
                                                <input type="file" id="avatar" name="avatar"
                                                    class="@error('avatar') is-invalid @enderror"
                                                    value="{{ $student->user['avatar'] }}"> --}}

                                                <label for="avatar">Upload Foto</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="avatar"
                                                            name="avatar" class="@error('avatar') is-invalid @enderror"
                                                            value="{{ $student->user['avatar'] }}">
                                                        <label class="custom-file-label" for="avatar">Pilih
                                                            Foto</label>
                                                    </div>
                                                </div>
                                                @if ($errors->has('avatar'))
                                                <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                                                @endif
                                                <p class="help-block">Max.1500kb</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <h3 class="profile-username text-center">{{ $student->user->name }}</h3>
                        @if ($student->jenis_kelamin == 'L')
                        <p class="text-muted text-center">Laki - Laki</p>
                        @else
                        <p class="text-muted text-center">Perempuan</p>
                        @endif

                    </div>

                </div>


                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <div class="card-body">
                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                        <p class="text-muted">{{ $student->tempat_lahir }}
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalTempat{{$student->id}}"><i class="fa fa-edit"></i>
                            </a>
                        </p>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.tempat', $student->id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalTempat{{$student->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tempat Lahir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                    id="tempat_lahir" autocomplete="off" placeholder=""
                                                    value="{{ $student->tempat_lahir }}" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <strong><i class="fas fa-book mr-1"></i> Tanggal Lahir</strong>
                        <p class="text-muted">
                            {{$student->tgl_lahir}}
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalTtl{{$student->id}}"><i class="fa fa-edit"></i>
                            </a>
                        </p>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.gttl', $student->id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalTtl{{$student->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tanggal lahir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    id="tgl_lahir" autocomplete="off" value="{{ $student->tgl_lahir }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal Gabung</strong>
                        <p class="text-muted">
                            {{ $student->tahun_masuk }}
                        </p>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.gttl', $student->id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalTtl{{$student->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tanggal lahir</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tgl_lahir">Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir"
                                                    class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                    id="tgl_lahir" autocomplete="off" value="{{ $student->tgl_lahir }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                        <p class="text-muted">No HP : {{ $student->no_hp }}
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalNohp{{$student->id}}"><i class="fa fa-edit"></i>
                            </a>
                        </p>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.nohp', $student->id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalNohp{{$student->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit No Hp</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="no_hp">No Hp</label>
                                                <input type="text" name="no_hp"
                                                    class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                                    autocomplete="off" placeholder="" value="{{ $student->no_hp }}"
                                                    autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <p class="text-muted">Nama Orang tua : {{ $student->nama_ortu }}
                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#modalNamaortu{{$student->id}}"><i class="fa fa-edit"></i>
                            </a>
                        </p>
                        <form method="POST" role="form" action="{{ route('datasiswa.update.namaortu', $student->id) }}"
                            id="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="modal fade" id="modalNamaortu{{$student->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Nama Orang Tua</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="nama_ortu">Nama Orang Tua</label>
                                                <input type="text" name="nama_ortu"
                                                    class="form-control @error('nama_ortu') is-invalid @enderror"
                                                    id="nama_ortu" autocomplete="off" placeholder=""
                                                    value="{{ $student->nama_ortu }}" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data
                                    Absen</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">History
                                    Sabuk</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">

                                <table id="t_absen" class="table table-bordered table-striped" border="1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Hadir</th>
                                            <th>Nama Siswa</th>
                                            <th>Jadwal Latihan</th>
                                            <th>Foto</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <?php $no = 1 ?>
                                    <tbody>
                                        @forelse ($absen as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->tgl_hadir }}</td>
                                            <td>{{ $item->student->user->name }}</td>
                                            <td>{{ $item->jadwal->hari }}</td>
                                            <td><img src="{{ url('foto/absen/'.$item->foto) }}"
                                                    style="width: 150px; height: 150px;">
                                            </td>
                                            <td>{!! $item->keterangan !!}</td>
                                            @empty
                                        <tr>
                                            <td colspan="12">Data tidak ada.</td>
                                        </tr>
                                        </tr>

                                    </tbody>
                                    @endforelse
                                </table>
                            </div>


                            <div class="tab-pane" id="settings">
                                <div class="card-body">
                                    <table id="t_absen" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Kenaikan</th>
                                                <th>Nama Sabuk</th>
                                            </tr>
                                        </thead>
                                        <?php $no = 1 ?>
                                        <tbody>
                                            @forelse ($history as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->tgl_level }}</td>
                                                <td>{{ $item->level->nama_sabuk }}</td>
                                                @empty
                                            <tr>
                                                <td colspan="12">Data tidak ada.</td>
                                            </tr>
                                            </tr>
                                        </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
<!-- /.content -->

@endsection

@section('tablejs')
<script>
    $(function () {
        $("#t_absen").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_absen_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection