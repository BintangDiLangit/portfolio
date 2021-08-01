<!doctype html>
<html lang="en">

@include('layouts.landing.head')

<body>

    <!--================ Start Header Area =================-->
    @include('layouts.landing.header')
    <!--================ End Header Area =================-->

    <!--================ Start Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Achievements</h2>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="{{ route('achievement') }}">Achievements</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

    <!--================Start Portfolio Area =================-->
    <section class="portfolio_area section_gap_top" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main_title text-left">
                        <h2>some of <br>
                            my achievements </h2>
                    </div>
                </div>
            </div>
            <div class="filters-content">
                <div class="row portfolio-grid justify-content-center">
                    @foreach ($achievements as $ach)
                        <div class="col-lg-4 col-md-6 all latest">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('../certificate-images/' . $ach->imgCert) }}" alt="">
                                    <div class="overlay"></div>
                                    <a href="{{ asset('../certificate-images/' . $ach->imgCert) }}" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4>{{ $ach->name }}</a>
                                    </h4>
                                    @if ($ach->linkCert != null)
                                        <p><a href="{{ $ach->linkCert }}">Credential Link</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--================End Portfolio Area =================-->

    <!--================ Start Newsletter Area =================-->
    <!--================ End Newsletter Area =================-->

    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->
</body>

</html>
