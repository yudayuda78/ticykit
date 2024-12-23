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
            vertical-align: middle;
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
            width: 30px; /* Adjust width as needed */
            height: auto;
        }

        .circle {
            display: inline-block;
            width: 14px;
            height: 14px;
            border:#000 solid 2px;
            border-radius: 50%;
            background-color: transparent;
            margin-right: 20px;
        }
        td img {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div style="margin-top: 20px; width: 100%;">
        <table style="width: 100%; border: none;">
            <tr>
                <td style="text-align: left;">
                    <strong>Nama: </strong>
                </td>
                <td style="border-bottom: 1px solid #000; width: 50%;"></td>
                <td style="text-align: right;">
                    <strong>Absen: </strong>
                </td>
                <td style="border-bottom: 1px solid #000; width: 50%;"></td>
            </tr>
        </table>
    </div>

    <div style="text-align: center; font-size: 25px; margin-top: 30px; margin-bottom: 30px; text-transform: capitalize;">
        <strong>{{ $judul }}</strong>
    </div>

    <table style="width: 100%; margin-top: 10px;">
        @foreach($soal as $index => $item)
            <tr style="width: 100%; ">
                <!-- Iteration number column -->
                <td class="iteration-number" style="text-align: center; width: 5%; padding: 0; margin: 0; padding-bottom: 1.5rem">
                    {{ $loop->iteration }}).
                </td>

                <!-- Image column based on item count -->
                <td style="display: flex; justify-content: center; padding: 0; margin: 0; width: 23rem; white-space: nowrap; padding-bottom: 1.5rem">
                    @for ($i = 0; $i < $item; $i++)
                        @php
                            $imageIndex = $index % 5; // Reset every 5 items
                        @endphp
                        @switch($imageIndex)
                            @case(0)
                                <img class="fruit-img" src="{{ public_path('/img/icon_buah/apple.png') }}" alt="Apple">
                                @break
                            @case(1)
                                <img class="fruit-img" src="{{ public_path('/img/icon_buah/orange.png') }}" alt="Orange">
                                @break
                            @case(2)
                                <img class="fruit-img" src="{{ public_path('/img/icon_buah/watermelon.png') }}" alt="Watermelon">
                                @break
                            @case(3)
                                <img class="fruit-img" src="{{ public_path('/img/icon_buah/bananas.png') }}" alt="Bananas">
                                @break
                            @default
                                <img class="fruit-img" src="{{ public_path('/img/icon_buah/grapes.png') }}" alt="Grapes">
                        @endswitch
                    @endfor
                </td>

                <!-- Circle columns with increased spacing -->
                <td style="padding: 0; margin: 0; width: 60%; text-align: left; padding-bottom: 1.5rem">
                    <div class="circle"></div>
                </td>
                <td style="padding: 0; margin: 0; width: 1%; text-align: right; padding-bottom: 1.5rem">
                    <div class="circle"></div>
                </td>

                <!-- Answer column -->
                <td style="padding: 0; margin: 0; width: 3%; text-align: center; font-weight: bold; padding-bottom: 1.5rem">
                    {{ $jawaban[$index] }}
                </td>
            </tr>
        @endforeach
    </table>

    <footer style="margin-top: 20px; position: absolute; bottom: 0; width: 100%;">
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
