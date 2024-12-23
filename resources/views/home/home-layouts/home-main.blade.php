<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Belajar Era Digital</title>
    <link rel="icon" type="x-icon" href="{{ asset('asset/bedlogo.webp') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}">

    <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="{{ url('https://code.jquery.com/jquery-3.7.1.min.js') }}"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" croFssorigin="anonymous"></script>
    <script type="text/javascript" src="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js') }}">
    </script>
    <link rel="stylesheet" href="{{ asset('home-resource/css/style.css?v=19.1.25a') }}">
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css"
        href="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css') }}" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css"
        href="{{ url('//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css') }}" />

    {{-- Animate on Scroll --}}
    <link href="{{ url('https://unpkg.com/aos@2.3.1/dist/aos.css') }}" rel="stylesheet">

    <link rel="preconnect" href="{{ url('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ url('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap') }}"
        rel="stylesheet">

    <!-- Link icon -->
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') }}"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ url('https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Sora&display=swap" rel="stylesheet">
    <link href="{{ url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css') }}">

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9697129609724227"
        crossorigin="anonymous"></script>

</head>

<body>

    @yield('container')
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js') }}"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ url('home-resource/js/script.js?v=19.1.24a') }}"></script>
    <script src="{{ url('https://unpkg.com/aos@2.3.1/dist/aos.js') }}"></script>

    <script>
        AOS.init();
    </script>
</body>

</html>
