<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lokasi Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .map-container {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="fixed-sn white-skin">

        <!--Main Navigation-->
        <header>

            <!-- Sidebar navigation -->
            <nav class="navbar navbar-expand-lg bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('dist/img/logo.jpeg') }}" alt="Logo" width="30" height="24"
                            class="d-inline-block align-text-top">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('pendaftaran') }}">Pendaftaran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main class=" m-0 p-0">
            <div class="container-fluid m-0 p-0">

                <!--Google map-->
                <div id="map-container" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.874170498071!2d107.5335539!3d-6.9056469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5a3f0b9c3f1%3A0xe792308475eacfca!2sKantor%20Kelurahan%20Utama!5e0!3m2!1sen!2sid!4v1668394172797!5m2!1sen!2sid"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </main>
        <!--Main layout-->

        <!--Footer-->
        <footer class="page-footer pt-0 mt-0">

            <!--Copyright-->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2022 Dojo Utama:
                <a class="text-dark" href="http://dojo-utamacimahi.my.id/">Home</a>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>