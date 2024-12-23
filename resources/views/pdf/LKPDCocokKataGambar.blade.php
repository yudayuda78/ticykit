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
        .fruit-img {
            width: 80px; /* Adjust width as needed */
            height: auto;
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

    <table style="margin-left: 1.1rem; padding: 0; border-spacing: 0 18rem;">
        @foreach($soal as $index => $item)
            <tr>
                <!-- Iteration number column -->
                <td class="iteration-number" style="line-height: 4rem; text-align: left; padding: 0; margin: 0; text-transform: uppercase;">
                    {{ $loop->iteration }}).
                </td>

                <!-- Soal (question) column -->
                <td style="line-height: 4rem; padding: 0; padding-left: 0.5rem; margin: 0; width: 80%; text-transform: uppercase;">
                    {{ $item }}
                </td>

                <!-- First circle column -->
                <td style="line-height: 4rem; padding: 0; margin: 0; width: 80%;">
                    <div style="padding: 0; margin: 0; margin-top: 2.2rem; margin-right: 0.5rem; width: 10px; height: 10px; border: 1px solid #000; border-radius: 50%; background-color: transparent;"></div>
                </td>

                <!-- Second circle column -->
                <td style="line-height: 4rem; padding: 0; margin: 0; width: 1%;">
                    <div style="padding: 0; margin: 0; margin-top: 2.2rem; margin-right: 2rem; width: 10px; height: 10px; border: 1px solid #000; border-radius: 50%; background-color: transparent;"></div>
                </td>

                <!-- Jawaban (answer) column -->
                <td style="line-height: 4rem; padding: 0; margin: 0; width: 50%; text-transform: uppercase;">
                    <img class="fruit-img" src="{{ public_path('CocokGambar/' . $jawaban[$index] . '.png') }}" alt="{{ 'Gambar ' . $jawaban[$index] }}">
                </td>
            </tr>
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
