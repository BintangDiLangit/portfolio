<!doctype html>
<html lang="en">

@include('layouts.landing.head')

<body>
    <!--================ Start Header Area =================-->
    @include('layouts.landing.header')
    <!--================ End Header Area =================-->

    <!--================ Start Banner Area =================-->
    {{-- <section class="banner_area">
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
    </section> --}}
    <!--================ End Banner Area =================-->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area section_gap_top">
        <div class="container">
            <div class="row">
                @foreach ($latest as $blg)
                    <div class="col-lg-4">
                        <div class="categories_post">
                            <img src="{{ asset('../blog-images/' . $blg->imageHeader) }}" alt="post">
                            <a href="{{ 'blog/' . $blg->link_route }}">
                                <div class="categories_details">
                                    <div class="categories_text">
                                        <h5>{{ $blg->title }}</h5>
                                        <div class="border_line"></div>
                                        <p>{{ $blg->creator }}</p>
                                    </div>
                                </div>
                            </a>
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
                                            <li><a href="#">{{ $blg->creator }}<i class="lnr lnr-user"></i></a>
                                            </li>
                                            <li><a href="#">{{ $blg->updated_at }}<i
                                                        class="lnr lnr-calendar-full"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    @foreach ($blg->tags as $tag)
                                        <a href="/tag/{{ $tag->id }}"
                                            class="btn badge badge-pill badge-info">{{ $tag->tag_name }}</a>
                                    @endforeach
                                    <div class="blog_post mt-3">
                                        <img width="555px" height="280px"
                                            src="{{ asset('../blog-images/' . $blg->imageHeader) }}" loading="lazy"
                                            alt="">
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
                                <input type="text" onclick="myFunction()" class="form-control" name="keyword"
                                    placeholder="Search Posts">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" onclick="myFunction()"><i
                                            class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div>

                            <!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" height="120px"
                                src="{{ asset('satner/img/blog/author2.png') }}" alt="">
                            <h4>Bintang Miftaqul Huda</h4>
                            <p>Owner</p>
                            <div class="social_icon">
                                <a href="https://www.linkedin.com/in/bintangmfhd/"><i class="fa fa-linkedin"></i></a>
                                <a href="https://github.com/BintangDiLangit"><i class="fa fa-github"></i></a>
                                <a href="https://bintangmfhd.medium.com/"><i class="fa fa-medium"></i></a>
                                <a href="https://www.instagram.com/bintangmf_hd/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <p>Stories of experiences and journeys that we write on this blog.
                                We got a lot of knowledge. We goal is to write on this blog so that I don't forget and
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


    <!--================ Contributor Area =================-->
    <div class="testimonial_area section_gap_bottom mt-5" id="testimoni">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="main_title">
                        <h2>Contributors</h2>
                        <p>the contributors who contribute to writing on this blog</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testi_slider owl-carousel">
                    @foreach ($contributor as $ctb)
                        <div class="testi_item">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img style="width: 135px!important; height: 135px!important; border-radius:50%"
                                        src="{{ asset('storage/' . $ctb->profile_photo_path) }}" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <div class="testi_text">
                                        <h4>{{ $ctb->name }}</h4>
                                        <p>{{ $ctb->bio }}</p>
                                        <div class="social_icon">
                                            @if ($ctb->linkedinLink != null)
                                                <a href="{{ $ctb->linkedinLink }}"><i class="fa fa-linkedin"
                                                        style="color:blue"></i></a>
                                            @endif
                                            @if ($ctb->linkedinLink != null)
                                                <a href="{{ $ctb->githubLink }}"><i class="fa fa-github"
                                                        style="color:black"></i></a>
                                            @endif
                                            @if ($ctb->linkedinLink != null)
                                                <a href="{{ $ctb->igLink }}"><i class="fa fa-instagram"
                                                        style="color:red"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--================ Contributor Area =================-->

    <!--================Footer Area =================-->
    @include('layouts.landing.footer')
    <!--================End Footer Area =================-->
</body>

</html>
