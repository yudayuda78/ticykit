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

    </style>
</head>
<body>
    <div style="margin-top: 20px; width: 100%;">
        <table style="width: 100%; border: none;">
            <tr style="padding-left: 20px; padding-right: 20px;">
                <!-- Left Side -->
                <td style="text-align: left; padding: 0; height: 5px; padding-right: 5px;">
                    <strong>Nama: </strong>
                </td>
                <td style="width: 50%; height: 5px; border-bottom: 1px solid #000; padding: 0; ">
                </td>
                <!-- Right Side -->
                <td style="text-align: right; padding: 0; height: 5px; padding-left: 18px">
                    <strong>Absen: </strong>
                </td>
                <td style="width: 50%; height: 5px; border-bottom: 1px solid #000; padding: 0;">
                </td>
            </tr>
        </table>
    </div>

    {{-- Jika ingin menggunakan logo di tengah, hilangkan komen dibawah ini --}}

    {{-- <div style="text-align: center; margin-top: 30px;">
        <img src="{{ public_path('img/Ticykit panjang.png') }}" alt="Ticykit panjang image" class="logo-img">
    </div> --}}
    {{-- <div style="text-align: center; font-size: 25px; margin-top: 20px; text-transform: capitalize;">
        <strong>{{ $judul }}</strong>
    </div> --}}

    {{-- End logo Tengah --}}

    <div style="text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 30px; text-transform: capitalize;">
        <strong>{{ $judul }}</strong>
    </div>

    <table style="margin-top: 20px; padding: 0;">
        @foreach($hasilData['datapertama'] as $index => $dataPertama)
            @if($loop->iteration % 5 == 1)
                <tr>
            @endif
            <td class="iteration-number" style="text-align: left; padding: 0; margin: 0;">{{ $loop->iteration }}).</td>

            @if(isset($hasilData['hasil']))
                <td style="text-align: right; padding: 0; padding-bottom: 30px;">
            @else
                <td style="text-align: right; padding: 0; padding-bottom: 65px;">
            @endif

                <p style="padding: 0; margin:0 ; padding-bottom: 5px;">{{ $dataPertama }}</p>
                <p style="padding: 0; margin:0 ; padding-bottom: 5px; ">{{ $hasilData['datakedua'][$index] }}</p>
                <p style="padding: 0; padding-bottom: 0.1rem; margin:0 ; width: 5.7rem; border-bottom: 1px solid #000;"></p>
                @if(isset($hasilData['hasil']))
                    <p style="padding: 0; margin:0 ; padding-top: 5px;">{{ $hasilData['hasil'][$index] }}</p>
                @endif
            </td>
            <td>
                <p></p>
                <p>+</p>
                <p></p>
            </td>
            @if($loop->iteration % 5 == 0 || $loop->last)
                </tr>
            @endif
        @endforeach
    </table>


    <footer style="margin-top: 20px; position: absolute; bottom: 0; width: 100%;">
        <table style="width: 100%; border: none; padding-left: 10px; padding-right: 10px">
            <tr>
                <td style="width: 50%; text-align: left;">
                    <img   src="{{ public_path('img/Ticykit panjang.png') }}" alt="Ticykit panjang image" class="footer-logo">
                </td>
                <td style="width: 50%; text-align: right;">
                    <p style="margin-top: 60px;">Produk dapat diakses di www.ticykit.com <span style="margin-left: 4px;">&copy;2024</span></p>
                </td>
            </tr>
        </table>
    </footer>
</body>
</html>
