<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('../satner/img/logo.png') }}" type="image/png">
    <title id="val"></title>
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('../satner/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('../satner/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('../satner/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../satner/vendors/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../satner/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('../satner/vendors/nice-select/css/nice-select.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('../satner/css/style.css') }}">

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js"
        integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

    </style>
</head>
