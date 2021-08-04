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
                    <h2>Blog Details</h2>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="{{ route('blog') }}">Blog</a>
                        <a href="{{ route('blg.show', ['title' => $blog]) }}">Blog Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" width="322px" height="650px"
                                    src="{{ asset('../blog-images/' . $blog->imageHeader) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a href="#">Bintang Miftaqul Huda<i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#">{{ $blog->updated_at }}<i class="lnr lnr-calendar-full"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $blog->title }}</h2>

                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mt-25">
                                    {!! $blog->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Latest Posts</h3>
                            @for ($i = 0; $i < $countLatest; $i++)
                                <div class="media post_item">
                                    <img width="100px" height="60px"
                                        src="{{ asset('../blog-images/' . $latest[$i]->imageHeader) }}" alt="post">
                                    <div class="media-body">
                                        <a href="{{ $latest[$i]->link_route }}">
                                            <h3>{{ $latest[$i]->title }}</h3>
                                        </a>
                                        <p>{{ $result[$i] }}</p>
                                    </div>
                                </div>
                                <div class="br"></div>
                            @endfor
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->

</body>

</html>
