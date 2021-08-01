<!doctype html>
<html lang="en">
@include('layouts.landing.head')

<body>

    <!--================ Start Header Area =================-->
    @include('layouts.landing.header')
    <!--================ End Header Area =================-->

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="banner_content">
                            <h3 class="text-uppercase">Hell0</h3>
                            <h1 class="text-uppercase">I am Bintang Miftaqul Huda</h1>
                            <h5 class="text-uppercase">Junior Fullstack web developer</h5>
                            <div class="d-flex align-items-center">
                                <a class="primary_btn" href="https://www.linkedin.com/in/bintangmfhd/"
                                    target="_blank"><span>LinkedIn</span></a>
                                <a class="primary_btn tr-bg" href="{{ asset('file-cv/cv.pdf') }}"
                                    target="_blank"><span>Get
                                        CV</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="home_right_img">
                            <img class="" src="{{ asset('../satner/img/banner/home-right.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start About Us Area =================-->
    <section class="about_area section_gap" id="about">
        <div class="container">
            <div class="row justify-content-start align-items-center">
                <div class="col-lg-5">
                    <div class="about_img">
                        <img class="" src="{{ asset('../satner/img/about-us.png') }}" alt="">
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-5">
                    <div class="main_title text-left">
                        <h2>let’s <br>
                            Introduce about <br>
                            myself</h2>
                        <p>
                            Whose given. Were gathered. There first subdue greater. Bearing you Whales heaven
                            midst their. Beast creepeth. Fish days.
                        </p>
                        <p>
                            Is give may shall likeness made yielding spirit a itself together created after sea
                            is in beast beginning signs open god you're gathering whose gathered cattle let.
                            Creature whales fruit unto meat the life beginning all in under give two.
                        </p>
                        <a class="primary_btn" href="#contact"><span>Reach me</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Us Area =================-->

    <!--================ Start Features Area =================-->
    <section class="features_area" id="skills">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>skills </h2>
                        <p>
                            Is give may shall likeness made yielding spirit a itself togeth created
                            after sea <br> is in beast beginning signs open god you're gathering ithe
                        </p>
                    </div>
                </div>
            </div>
            <div class="row feature_inner">
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{ asset('../satner/img/services/s1.png') }}" alt="">
                        <h4>Laravel Web Developing</h4>
                        <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{ asset('../satner/img/services/s22.png') }}" alt="">
                        <h4>Ruby on Rails Web Developing</h4>
                        <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{ asset('../satner/img/services/s5.png') }}" alt="">
                        <h4>NodeJs Web Developing</h4>
                        <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature_item">
                        <img src="{{ asset('../satner/img/services/s4.png') }}" alt="">
                        <h4>fast learning</h4>
                        <p>Creeping for female light years that lesser can't evening heaven isn't bearing tree</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Features Area =================-->

    <!--================ Start Testimonial Area =================-->
    <div class="testimonial_area section_gap_bottom" id="testimoni">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>client say about me</h2>
                        <p>Is give may shall likeness made yielding spirit a itself togeth created after sea is in beast
                            <br>
                            beginning signs open god you're gathering ithe
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testi_slider owl-carousel">
                    @foreach ($messages as $msg)
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img style="width: 135px!important; height: 180px;"
                                        src="{{ asset('../client-images/' . $msg->photo) }}" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>{{ $msg->name }}</h4>
                                        <p>{{ $msg->clientMessage }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--================ End Testimonial Area =================-->

    @include('layouts.landing.footer')
</body>

</html>
