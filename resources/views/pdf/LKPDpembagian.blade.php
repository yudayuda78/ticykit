<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        .logo-img {
            width: 250px;
            height: auto;
        }
        .footer-logo {
            width: 100px;
            height: auto;
            margin-top: 55px;
        }
        .iteration-number {
            font-weight: bold;
        }
        .data-item {
            margin-bottom: 10px;
        }
        .parallelogram-container {
            position: relative;
            padding: 10px;
            color: #000;
            transform: skew(-20deg);
            display: inline-block;
            width: 75%;
            overflow: hidden;
        }

        .parallelogram-container::before,
        .parallelogram-container::after {
            content: "";
            position: absolute;
            background-color: #000;
        }

        .parallelogram-container::before {
            top: 0;
            left: 0;
            width: 1px;
            height: 100%;
        }

        .parallelogram-container::after {
            top: 0;
            left: 0;
            height: 1px;
            width: 100%;
            transform: skew(-20deg);
        }

        .parallelogram-content {
            transform: skew(20deg); /* Un-skew content inside the parallelogram */
        }

        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 10px;
        }

        .left-content {
            flex: 1;
        }

        .right-content {
            flex: 1;
        }
    </style>
</head>
<body>
    <div style="margin-top: 20px; width: 100%;">
        <table style="width: 100%; border: none;">
            <tr style="padding-left: 20px; padding-right: 20px;">
                <td style="text-align: left; padding: 0; height: 5px; padding-right: 5px;">
                    <strong>Nama: </strong>
                </td>
                <td style="width: 50%; height: 5px; border-bottom: 1px solid #000; padding: 0; ">
                </td>
                <td style="text-align: right; padding: 0; height: 5px; padding-left: 18px">
                    <strong>Absen: </strong>
                </td>
                <td style="width: 50%; height: 5px; border-bottom: 1px solid #000; padding: 0;">
                </td>
            </tr>
        </table>
    </div>
    <div style="text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 30px; text-transform: capitalize;">
        <strong>{{ $judul }}</strong>
    </div>

    <table style="margin-top: 20px;">
        @foreach($hasilData['datapertama'] as $index => $dataPertama)
            @if($loop->iteration % 4 == 1)
                <tr>
            @endif

            <td class="iteration-number" style=" margin: 0; padding:0; text-align: right; width: 2.7rem;">{{ $loop->iteration }}).</td>
            <td style="width: 0.5rem; " >
                <p style="margin: 0; padding:0; padding-top: 2.5rem; padding-right: 0.3rem;">{{ $hasilData['datakedua'][$index] }}</p>
            </td>
            @if(isset($hasilData['hasil']))
                <td colspan="2" style="padding: 0; padding-bottom: 40px; ">
            @else
                <td colspan="2" style="padding: 0; padding-bottom: 100px; ">
            @endif

                <div style="text-align: left;">
                    <div class="content-wrapper">
                        <div class="left-content">
                            @if(isset($hasilData['hasil'][$index]))
                                <p style="margin: 0; font-weight: bold; padding-left: 0.7rem;">{{ $hasilData['hasil'][$index] }}</p>
                            @endif
                        </div>

                        <div class="right-content">
                            <div class="parallelogram-container">
                                <div class="parallelogram-content">
                                    <p style="margin: 0;">{{ $dataPertama }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>

            @if($loop->iteration % 4 == 0 || $loop->last)
                </tr>
            @endif
        @endforeach
    </table>

    <footer style="margin-top: 20px; position: absolute; bottom: 0; width: 100%;">
        <table style="width: 100%; padding: 10px;">
            <tr>
                <td style="width: 50%; text-align: left;">
                    <img src="{{ public_path('img/Ticykit panjang.png') }}" alt="Ticykit panjang image" class="footer-logo">
                </td>
                <td style="width: 50%; text-align: right;">
                    <p style="margin-top: 60px;">Produk dapat diakses di www.ticykit.com <span style="margin-left: 4px;">&copy;2024</span></p>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>
