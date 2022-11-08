<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('satner/img/logo.png') }}" type="image/png">
    <title id="val"></title>
    <meta name="description" content="Bintang Miftaqul Huda, Professional portfolio, freelancers or software engineer.">
    <meta name="keywords" content="bintangmfhd, resume, cv, vCard, portfolio, responsive, software engineer, programmer">
    <meta name="robots" content="index, follow, noodp">
    <meta name="googlebot" content="index, follow">
    <meta name="google" content="notranslate">
    <meta property="og:title" content="Bintang - Software Engineer ">
    <meta property="og:description"
        content="Bintang Miftaqul Huda, Professional portfolio, freelancers or software engineer.">
    <meta property="og:image" content="https://bintangmfhd.com/assets/images/preview.png">
    <meta property="og:url" content="https://bintangmfhd.com/">
    <script language=javascript>
        var rev = "fwd";

        function titlebar(val) {
            var msg = "Bintang Miftaqul Huda";
            var res = " ";
            var speed = 100;
            var pos = val;
            msg = "   |-" + msg + "-|";
            var le = msg.length;
            if (rev == "fwd") {
                if (pos < le) {
                    pos = pos + 1;
                    scroll = msg.substr(0, pos);
                    document.title = scroll;
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                } else {
                    rev = "bwd";
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                }
            } else {
                if (pos > 0) {
                    pos = pos - 1;
                    var ale = le - pos;
                    scrol = msg.substr(ale, le);
                    document.title = scrol;
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                } else {
                    rev = "fwd";
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                }
            }
        }
        titlebar(0);
    </script>
    {{-- Google Ads --}}
    <script data-ad-client="ca-pub-4093590736685357" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('satner/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('satner/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('satner/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('satner/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('satner/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('satner/vendors/nice-select/css/nice-select.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('satner/css/style.css') }}">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
