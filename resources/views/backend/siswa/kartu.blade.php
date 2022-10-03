<!--=================================================-->
<!--Pen by Margus Lillemägi | codepen.io/VisualAngle/-->
<!--=================================================-->
<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kartu Anggota</title>
    <meta name="author" content="Margus Lillemagi, codepen.io/VisualAngle/">
    <link rel="stylesheet" href="css/style.css">
    <!--Link to Google fonts => Ubuntu-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:500">
    <style>
        body {
            background-color: #fbfeff;
            /* background color for demo only */
        }

        body,
        html {
            /* for demo only */
            heigth: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
        }

        #container {
            /* center for demo only */
            max-width: 300px;
            width: 100%;
            overflow: hidden;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
            border: 10px solid #FF0000;
        }

        .bc-wrapper {
            position: relative;
        }

        .bc-size {
            width: 300px;
            height: 600px;
        }

        .bc-style {
            background-image: none;
            text-align: center;
            background-color: #efefef;
            color: #303030;
            overflow: hidden;
            /* avoid elements to spill outside of the VC edge */
        }

        .bc-content {
            position: absolute;
            background-color: transparent;
        }

        .text,
        button {
            font-family: 'Ubuntu', sans-serif;
        }

        .header-txt {
            position: absolute;
            width: 280px;
            left: 10px;
            top: 26px;
            color: #FF0000;
            font-size: 28px;
            font-weight: 600;
            line-height: .9em;
            letter-spacing: -0.010em;
            text-transform: uppercase;
        }

        .name-txt {
            position: absolute;
            width: 280px;
            left: 10px;
            top: 370px;
            color: #4285f4;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: -0.010em;
            text-transform: uppercase;
        }

        .qualification-txt {
            position: absolute;
            width: 280px;
            left: 10px;
            top: 400px;
            color: #303030;
            font-size: 16px;
            font-weight: 400;
            letter-spacing: -0.050em;
        }

        .black-txt {
            color: #303030;
        }

        .image-wrapper {
            position: absolute;
            left: 10px;
            top: 100px;
            width: 280px;
            height: 240px;
            /* To clip bottom of the image */
            overflow: hidden;
        }

        .image-barcode {
            position: absolute;
            text-align: center;
            left: 100px;
            top: 420px;
            width: 280px;
            height: 300px;
            /* To clip bottom of the image */
            overflow: hidden;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        img {
            position: absolute;
            top: 0;
            left: 0;
            width: 280px;
            height: 280px;
            border-radius: 50%;
        }

        button {
            position: absolute;
            left: 30px;
            top: 520px;
            width: 240px;
            height: 50px;
            display: block;
            padding: 10px 10px 10px 10px;
            background-color: #4285F4;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            outline: 0;
        }

        .button-txt {
            font-size: 1.5em;
            font-weight: 500;
            text-transform: uppercase;
            color: #efefef;
            letter-spacing: 0.05em;
        }
    </style>
</head>

<body>
    <!--BC main container-->
    <div id="container">
        <!--BC wrapper with size and style-->
        <div class="bc-wrapper bc-size bc-style">
            <!--BC content-->
            <div class="bc-content">
                <!--BC header text-->
                <div class="header-txt text">
                    <span class="black-txt">Kartu Anggota</span><br>
                    <span>BKC Dojo Utama</span>
                </div>
                <!--BC name text-->
                <div class="name-txt text">{{$student->user->name }}</div>
                <!--BC image wrapper with image-->
                <div class="image-wrapper">
                    <img src="{{ public_path('foto/user/'.$student->user['avatar']) }}">
                </div>
                <!--BC qualification text-->
                <div class="qualification-txt text">{{ $student->tempat_lahir }}, {{
                    \Carbon\Carbon::createFromTimestamp(strtotime($student->tgl_lahir))->format('d-m-Y')
                    }}
                </div>
                <div class="image-barcode">
                    {!!
                    DNS2D::getBarcodeHTML(
                    $student->nisk.'-'.
                    $student->user->name.'-'.
                    $student->jenis_kelamin.'-'.
                    $student->tempat_lahir.','.
                    $student->tgl_lahir.'-'.
                    $student->created_at.'-'.
                    $student->user->status
                    ,'QRCODE',3,3.5)
                    !!}
                </div>
                <!--BC call to action button and text-->
                <div id="cta">
                    <button type="button" onclick="alert('Thank you for clicking me!')">
                        <span class="button-txt">{{ $student->nisk }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>