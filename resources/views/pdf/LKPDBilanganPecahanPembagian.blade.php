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
            padding: 0;
            margin: 0;
        }
        .content-table{
            border-spacing: 0.2rem 0.5rem;
        }
        td, th {
            margin: 0;
            padding: 0;
            vertical-align: middle;
            text-align: center; /* Center text in td and th */
        }

        tbody {
            margin: 0;
            padding: 0;
            text-align: center; /* Center text for tbody */
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
            margin: 0;
            padding: 0;
            font-weight: bold;
            text-align: left;
        }

        .data-item {
            margin-bottom: 10px;
        }

        .operator {
            padding: 0;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            vertical-align: middle;
        }

        /* Footer styling */
        .footer {
            margin-top: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .bold {
            font-weight: bold; /* Global bold class */
        }

        .text-center {
            text-align: center; /* Centralize text */
        }

        .table-bordered {
            border: 2px solid rgb(144, 139, 139);
            border-radius: 0.5rem;
            padding: 0;
            margin: 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div style="margin-top: 20px; width: 100%;">
        <table style="width: 100%; border: none; border-collapse: collapse;">
            <tr>
                <td style="text-align: left; vertical-align: top; padding: 8px;">
                    <strong>Nama: </strong>
                </td>
                <td style="padding: 8px; vertical-align: top; border-bottom: 1px solid #000; width: 50%;"></td>
                <td style="padding: 8px; vertical-align: top; text-align: right;">
                    <strong>Absen: </strong>
                </td>
                <td style="padding: 8px; vertical-align: top; border-bottom: 1px solid #000; width: 50%;"></td>
            </tr>
        </table>
    </div>

    <div style="text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 20px; text-transform: capitalize;">
        <strong>{{ $judul }}</strong>
    </div>

    <table class="content-table">
        <tbody>
            @foreach($pembilangsatuArray as $index => $pembilangsatu)
                @if($loop->iteration % 4 == 1)
                    <tr>
                @endif
                <td style="width: 20%; padding: 10px">
                    <div class="table-bordered">
                        <table class="content-table" style="width: 100%;">
                            <tbody>
                                <tr>
                                    <th colspan="5" class="bold" style="text-align: left; border-bottom: 1px solid black">
                                        &nbsp;{{ $loop->iteration }}.
                                    </th>
                                </tr>
                                <tr style="margin: 0; padding: 0 0.3rem;">
                                    <td style="width: 20%;">{{ $pembilangsatu }}</td>
                                    <td style="width: 20%" rowspan="3" class="bold">&divide;</td>
                                    <td style="width: 20%">{{ $pembilangduaArray[$index] }}</td>
                                    <td style="width: 20%" rowspan="3" class="bold">&equals;</td>
                                    @if (isset($hasilPembilang[$index]))
                                        <td style="width: 20%;">{{ $hasilPembilang[$index] }}</td>
                                    @endif
                                </tr>
                                <tr style="margin: 0; padding: 0 0.3rem;">
                                    <td style="margin: 0; padding: 0;">
                                        <hr style="border: 1px solid black; margin: 0 0.3rem; padding: 0;">
                                    </td>
                                    <td style="margin: 0; padding: 0;">
                                        <hr style="border: 1px solid black; margin: 0 0.3rem; padding: 0;">
                                    </td>
                                    <td style="margin: 0; padding: 0;">
                                        <hr style="border: 1px solid black; margin: 0 0.3rem; padding: 0;">
                                    </td>
                                </tr>

                                <tr>
                                    <td>{{ $penyebutsatuArray[$index] }}</td>
                                    <td>{{ $penyebutduaArray[$index] }}</td>
                                    @if (isset($hasilPenyebut[$index]))
                                        <td style="width: 20%;">{{ $hasilPenyebut[$index] }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>

                @if($loop->iteration % 4 == 0 || $loop->last)
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <footer class="footer">
        <table style="width: 100%; border: none;">
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
