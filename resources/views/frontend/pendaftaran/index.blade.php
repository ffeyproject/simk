<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Menu Pendaftaran Dojo Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Icons font CSS-->
    <link href="{{ asset('frontend/pendaftaran/vendor/mdi-font/css/material-design-iconic-font.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('frontend/pendaftaran/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{ asset('frontend/pendaftaran/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('frontend/pendaftaran/vendor/datepicker/daterangepicker.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('frontend/pendaftaran/css/main.css') }}" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            @include('sweetalert::alert')
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Pendaftaran </h2>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Petunjuk Pendaftaran
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Silahkan Dibaca</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Setelah melakukan Pendaftaran diwajibkan memberi bukti / chat ke Wa :
                                        089509009798</p>
                                    <p>1. Setelah melakukan pengiriman bukti admin akan memproses data pendaftar.</p>
                                    <p>2. Jika admin sudah melakukan verifikasi, maka admin akan mengirimkan akun login
                                        ke sistem. </p>
                                    <p>3. Pastikan nomer yang dilakukan verifikasi bisa menerima pesan Wa.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{route('pendaftaran.store')}}" id="form" enctype="multipart/form-data">
                        @csrf
                        <br>
                        {{-- <input class="nput--style-1" type="hidden" name="tgl_pendaftaran" value=""> --}}
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="NAMA PENDAFTAR *"
                                name="nama_pendaftaran">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="EMAIL PENDAFTAR *" name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="number" placeholder="NO TELP PENDAFTAR *"
                                name="no_telp">
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="metode_pembayaran">
                                    <option disabled="disabled" selected="selected">METODE PEMBAYARAN *</option>
                                    <option value="cash">CASH</option>
                                    <option value="transfer">TRANSFER</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="">BUKTI PEMBAYARAN</label>
                            <input class="input--style-1" type="file" placeholder="" name="bukti_pembayaran">
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <!-- Jquery JS-->
    <script src="{{ asset('frontend/pendaftaran/vendor/jquery/jquery.min.js') }}"></script>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/pendaftaran/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/pendaftaran/vendor/datepicker/moment.min.js') }}"></script>
    <script src="{{ asset('frontend/pendaftaran/vendor/datepicker/daterangepicker.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('frontend/pendaftaran/js/global.js') }}"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->