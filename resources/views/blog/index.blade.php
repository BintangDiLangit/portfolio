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
                    <h2>Blog</h2>
                    <div class="page_link">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="{{ route('blog') }}">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Banner Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area section_gap_top">
        <div class="container">
            <div class="row">
                @foreach ($latest as $blg)
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{ asset('../blog-images/' . $blg->imageHeader) }}" alt="post">
                            <div class="categories_details">
                                <div class="categories_text">
                                    <a href="{{ 'blog/' . $blg->link_route }}">
                                        <h5>{{ $blg->title }}</h5>
                                    </a>
                                    <div class="border_line"></div>
                                    <p>bintangmfhd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Start Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                        @foreach ($blogs as $blg)
                            <article class="row blog_item">
                                <div class="col-md-3">
                                    <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                            <li><a href="#">Bintang Miftaqul Huda<i class="lnr lnr-user"></i></a></li>
                                            <li><a href="#">{{ $blg->updated_at }}<i
                                                        class="lnr lnr-calendar-full"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img width="555px" height="280px"
                                            src="{{ asset('../blog-images/' . $blg->imageHeader) }}" alt="">
                                        <div class="blog_details">
                                            <a href="{{ route('blg.show', ['title' => $blg->link_route]) }}">
                                                <h2>{{ $blg->title }}</h2>
                                            </a>
                                            <p>{!! substr_replace($blg->content, '...', 100) !!}</p>
                                            <br>
                                            <a href="{{ route('blg.show', ['title' => $blg->link_route]) }}"
                                                class="primary_btn"><span>View More</span></a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <div class="pull-left">>
                            showing
                            {{ $blogs->firstItem() }}
                            to
                            {{ $blogs->lastItem() }}
                        </div>
                        <div class="pull-right">
                            {!! $blogs->links() !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" height="120px"
                                src="{{ asset('../satner/img/blog/author2.png') }}" alt="">
                            <h4>Bintang Miftaqul Huda</h4>
                            <p>Blog writer</p>
                            <div class="social_icon">
                                <a href="https://www.linkedin.com/in/bintangmfhd/"><i class="fa fa-linkedin"></i></a>
                                <a href="https://github.com/BintangDiLangit"><i class="fa fa-github"></i></a>
                                <a href="https://bintangmfhd.medium.com/"><i class="fa fa-medium"></i></a>
                                <a href="https://www.instagram.com/bintangmf_hd/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <p>Stories of experiences and journeys that i write on this blog.
                                I got a lot of knowledge. My goal is to write on this blog so that I don't forget and
                                can be real evidence.
                            </p>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Blog Area =================-->

    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->
</body>

</html>
