@extends('layouts.app')
@section('content')

<div class="bg-light p-4 rounded">
    <h1>Show user</h1>
    <div class="lead">

    </div>

    <div class="container mt-4">
        <div>
            Name: {{ $user->name }}
        </div>
        <div>
            Email: {{ $user->email }}
        </div>
        <div>
            Username: {{ $user->username }}
        </div>
    </div>

</div>
<div class="mt-4">
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
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