<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Print Kartu Anggota</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        table,
        th,
        td {
            border: 0px solid black;
            border-collapse: collapse;
        }

        ,
        p {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <h3 class="text-center">Kartu Anggota</h3>
    <h5 class="text-center">BKC Dojo Utama</h5>
    <hr>
    <table style="width:100%">
        <tr>
            <th rowspan="3"><img src="{{ public_path('foto/user/'.$student->user['avatar']) }}" alt=""
                    style="width:100px; height:100px;"></th>
            <td>No. Pendaftaran</td>
            <td>:</td>
            <td><strong>{{ $student->nisk }}</strong></td>
            <td rowspan="3">
                {!!
                DNS2D::getBarcodeHTML(
                $student->nisk.'-'.
                $student->user->name.'-'.
                $student->jenis_kelamin.'-'.
                $student->tempat_lahir.','.
                $student->tgl_lahir.'-'.
                $student->created_at.'-'.
                $student->user->status
                ,'QRCODE',4,4)
                !!}
            </td>
        </tr>
        <tr>
            <td>Nama Anggota</td>
            <td>:</td>
            <td><strong>{{ $student->user->name }}</strong></td>
        </tr>
        <tr>
            <td>Tempat, Tanggal lahir</td>
            <td>:</td>
            <td><strong>{{ $student->tempat_lahir }}, {{
                    \Carbon\Carbon::createFromTimestamp(strtotime($student->tgl_lahir))->format('d-m-Y')
                    }}</strong></td>
        </tr>
    </table>
    <br><br><br>
    <p class="text-right">
        <strong>Dicetak Pada : {{Carbon::now()->format('d-m-Y h:i:s')}} </strong>
    </p>

    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>