@extends('layouts.app')
@section('content')

<div class="bg-light p-4 rounded">
    <h1>Update user</h1>
    <div class="lead">

    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                    required>

                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                    placeholder="Email address" required>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" name="role" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'selected': '' }}>{{
                        $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label>Foto</label><br>
                <img src="{{ url('foto/user/'.$user->avatar) }}" style="width: 100px; height: 100px;"><br>
                <label>*) Jika Gambar Tidak Di Ganti, biarkan saja.</label><br>
                <label for="avatar">Masukkan Foto</label>
                <input type="file" id="avatar" name="avatar" class="@error('avatar') is-invalid @enderror"
                    value="{{ $user->avatar }}">
                @if ($errors->has('avatar'))
                <div class="invalid-feedback">{{ $errors->first('avatar') }}</div>
                @endif
                <p class="help-block">Max.800kb</p>
            </div>

            {{-- <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" name="status" required>
                    @if ($user->status == 0)
                    <option value="{{ $user->status ? 'selected': '' }}">Non Aktif</option>
                    @else
                    <option value="{{ $user->status ? 'selected': '' }}">Aktif</option>
                    @endif
                    @if ($user->status == 0)
                    <option value="1">Aktif</option>
                    @else
                    <option value="0">Non Aktif</option>
                    @endif
                </select>
                @if ($errors->has('status'))
                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                @endif
            </div> --}}

            <button type="submit" class="btn btn-primary">Update user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
        </form>
    </div>

</div>


@endsection

@section('tablejs')
<script>
    $(function () {
        $("#t_user").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#t_user_wrapper .col-md-6:eq(0)');
    });

</script>
@endsection