@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h1>Video Opening</h1><br>
            </div>
        </div>
        @include('components.alert')
        @include('sweetalert::alert')
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- <iframe width="1200" height="500" src="https://www.youtube.com/watch?v=8JHPwlt4xQw">
        </iframe> --}}

        <iframe width="1200" height="500" src="https://www.youtube.com/embed/8JHPwlt4xQw?autoplay=1&mute=0"
            title="YouTube video player" frameborder="0" allowfullscreen></iframe>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('tablejs')
@endsection