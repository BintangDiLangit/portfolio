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
                    <h2>Portfolio</h2>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="{{ route('portofolio') }}">Portfolio</a>
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
                        <h2>quality work <br>
                            Recently done project </h2>
                    </div>
                </div>
            </div>
            <div class="filters portfolio-filter">
                <ul>
                    <li class="active" data-filter="*">all</li>
                    <li data-filter=".popular">popular</li>
                    <li data-filter=".latest"> latest</li>
                    <li data-filter=".following">following</li>
                    <li data-filter=".upcoming">upcoming</li>
                </ul>
            </div>
            <div class="filters-content">
                <div class="row portfolio-grid justify-content-center">
                    @foreach ($portofolios as $porto)
                        <div class="col-lg-4 col-md-6 all latest">
                            <div class="portfolio_box">
                                <div class="single_portfolio">
                                    <img class="img-fluid w-100"
                                        src="{{ asset('../portofolio-images/' . $porto->image) }}" alt="">
                                    <div class="overlay"></div>
                                    <a href="{{ asset('../portofolio-images/' . $porto->image) }}" class="img-gal">
                                        <div class="icon">
                                            <span class="lnr lnr-cross"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="short_info">
                                    <h4><a
                                            href="{{ route('porto.show', ['id' => $porto]) }}">{{ $porto->title }}</a>
                                    </h4>
                                    <p>
                                        @php
                                            $text = $porto->description;
                                            if (str_word_count($text, 0) > 10) {
                                                $words = str_word_count($text, 2);
                                                $pos = array_keys($words);
                                                $text = substr($text, 0, $pos[10]) . '...';
                                            }
                                            echo $text;
                                        @endphp
                                    </p>
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
