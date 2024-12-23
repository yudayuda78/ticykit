<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>
    <style>
        .container {
            width: 100%;
            margin: 0 auto;
        }

        .grid-container {
            display: table;
            width: 100%;
        }

        .grid-column {
            display: table-cell;
            width: 42%;
            vertical-align: center;
        }

        .grid-row {
            margin: 0;
            padding: 0;
            margin-bottom: 1.6rem; /* Atur jarak antar row */
            display: flex; /* Membuat elemen dalam baris yang bisa disejajarkan */
            align-items: center; /* Menyelaraskan elemen vertikal di tengah */
        }
        .grid-row .HurufBesar {
            display: inline-block;
            position: relative;
            bottom: 0.5rem;
            margin: 0;
            padding: 0;
        }
        .grid-row .HurufBesar strong {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .grid-row span {
            display: inline-block;
            margin: 0 0.7rem 0 0.7rem;
            padding: 0.5rem;
            border: 1px solid #000;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            line-height: 20px;
            text-align: center;
            font-size: 1.2rem;
        }



        .footer-logo {
            width: 100px;
            height: auto;
            margin-top: 55px;
        }

        footer {
            margin-top: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        footer p {
            letter-spacing: 0.5px;
        }

        .header-text {
            text-align: center;
            font-size: 25px;
            margin-top: 30px;
            text-transform: capitalize;
            letter-spacing: 0.5px;
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
    <div class="container">
        <div class="header-text">
            <strong>{{ $judul }}</strong>
        </div>

        <table style="margin: 0; padding: 0; border-spacing: 0.4rem;">
            @foreach($angkasatuArray as $index => $item)
                <tr>
                    <!-- Soal (question) column -->
                    <td style="line-height: 3rem; padding: 0; padding-left: 0.3 rem; padding-top: 1rem; margin: 0; width: 80%; text-transform: uppercase; font-size: 2rem; font-weight: bold;">
                        {{ $item }} + {{ $angkaduaArray[$index] }} =
                    </td>

                    @for ($i = 0; $i < 9; $i++)
                        @if ($i === 0)
                            <td style="line-height: 3rem; padding: 0; padding-left: 0.3rem; padding-top: 1rem; margin: 0; width: 80%;">
                                <img style="width: 55px; height: auto;" src="{{ public_path('/img/hitungwarna/withColor.png') }}" alt="Gambar dengan warna">
                            </td>
                        @else
                            <td style="line-height: 3rem; padding: 0; padding-left: 0.3rem; padding-top: 1rem; margin: 0; width: 80%;">
                                <img style="width: 55px; height: auto;" src="{{ public_path('/img/hitungwarna/noColor.png') }}" alt="Gambar hitam putih">
                            </td>
                        @endif
                    @endfor
                </tr>
            @endforeach
        </table>

        <!-- Footer -->
        <footer>
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
    </div>
</body>

</html>
