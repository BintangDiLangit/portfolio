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
                    <h2>Portfolio Details</h2>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="{{ route('portofolio') }}">Portfolio</a>
                        <a href="{{ route('porto.show', ['id' => $porto]) }}">Portfolio Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

    <!--================Start Portfolio Details Area =================-->
    <section class="portfolio_details_area section_gap">
        <div class="container">
            <div class="portfolio_details_inner">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="left_img">
                            <img class="img-fluid" src="{{ asset('../portofolio-images/' . $porto->image) }}" alt="">
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-5">
                        <div class="portfolio_right_text mt-30">
                            <h4 class="text-uppercase">{{ $porto->title }}</h4>
                            <p>
                                {{ $porto->description }}
                            </p>
                            <ul class="list">
                                <li><span>Rating</span>:
                                    @for ($i = 0; $i < $countRating; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor

                                </li>
                                <li><span>Client</span>: {{ $porto->client }}</li>
                                <li><span>Source</span>: <a href="{{ $porto->linkPorto }}" target="_blank">Source
                                        Portofolio</a></li>
                                <li><span>Completed</span>: {{ $porto->completed }} (YY/MM/DD)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p>{{ $porto->additional_description }}</p>
            </div>
        </div>
    </section>
    <!--================End Portfolio Details Area =================-->

    <!--================ Start Newsletter Area =================-->
    <!--================ End Newsletter Area =================-->

    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->

</body>

</html>
