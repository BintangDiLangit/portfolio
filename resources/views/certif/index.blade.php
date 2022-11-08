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
            <div class="filters portfolio-filter">
                <ul>
                    <li class="active" data-filter="*">all</li>
                    <li data-filter=".popular">security</li>
                    <li data-filter=".following">software</li>
                    <li data-filter=".upcoming">softskill</li>
                </ul>
            </div>
            <div class="filters-content">
                <div class="row portfolio-grid justify-content-center">
                    @foreach ($security as $sec)
                        <div class="col-lg-4 col-md-6 all popular">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100" loading="lazy"
                                        src="https://bintangmfhd.com/certificate-images/{{ $sec->imgCert }}"
                                        alt="">
                                    <div class="overlay"></div>
                                    <a href="{{ asset('../certificate-images/' . $sec->imgCert) }}" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4>{{ $sec->name }}</a>
                                    </h4>
                                    @if ($sec->linkCert != null)
                                        <p><a href="{{ $sec->linkCert }}">Credential Link</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($software as $sfw)
                        <div class="col-lg-4 col-md-6 all following">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100" loading="lazy"
                                        src="https://bintangmfhd.com/certificate-images/{{ $sfw->imgCert }}"
                                        alt="">
                                    <div class="overlay"></div>
                                    <a href="{{ asset('../certificate-images/' . $sfw->imgCert) }}" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4>{{ $sfw->name }}</a>
                                    </h4>
                                    @if ($sfw->linkCert != null)
                                        <p><a href="{{ $sfw->linkCert }}">Credential Link</a></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @foreach ($softskill as $sft)
                        <div class="col-lg-4 col-md-6 all upcoming">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100" loading="lazy"
                                        src="https://bintangmfhd.com/certificate-images/{{ $sft->imgCert }}"
                                        alt="">
                                    <div class="overlay"></div>
                                    <a href="{{ asset('../certificate-images/' . $sft->imgCert) }}" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4>{{ $sft->name }}</a>
                                    </h4>
                                    @if ($sft->linkCert != null)
                                        <p><a href="{{ $sft->linkCert }}">Credential Link</a></p>
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
    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->
</body>

</html>
