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
                            <h5 class="text-uppercase">Software Engineer</h5>
                            <div class="d-flex align-items-center">
                                <a class="primary_btn" href="https://www.linkedin.com/in/bintangmfhd/"
                                    target="_blank"><span>LinkedIn</span></a>
                                <a class="primary_btn tr-bg" href="https://bintangmfhd.com"
                                    target="_blank"><span>Portfolio V2</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="home_right_img">
                            <img class="___class_+?14___" src="{{ asset('satner/img/banner/home-right.png') }}"
                                loading="lazy" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Newsletter Area =================-->
    @include('layouts.landing.newsletter')
    <!--================ End Newsletter Area =================-->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4093590736685357"
        crossorigin="anonymous"></script>
    <!-- Ads_V1 -->
    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4093590736685357" data-ad-slot="4366925422"
        data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    @include('layouts.landing.footer')
</body>

</html>
