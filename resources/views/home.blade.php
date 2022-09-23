@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container"><br>

        <div class="row"><br>
            {{-- <div class="col-sm-6">
                <h2>Grafik Asal Masalah per Tanggal : {{ $now }}</h2>
            </div> --}}
            <h4>Total Per Tahun {{ Carbon::now()->format('Y') }}</h4>

        </div>

    </div>
</div>


@endsection