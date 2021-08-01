<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="/#"><img src="{{ asset('../satner/img/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item {{ Request::path() === '#' ? 'active' : '' }}">
                            <a class="nav-link" href="/#">Home</a>
                        </li>
                        <li class="nav-item {{ Request::path() === '#about' ? 'active' : '' }}">
                            <a class="nav-link" href="/#about">About</a>
                        </li>
                        <li class="nav-item {{ Request::path() === '#skills' ? 'active' : '' }}">
                            <a class="nav-link" href="/#skills">Skills</a>
                        </li>
                        <li class="nav-item {{ Request::path() === '#testimoni' ? 'active' : '' }}">
                            <a class="nav-link" href="/#testimoni">Testimonial</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a>
                        </li>
                        <li class="nav-item {{ Request::path() === 'portofolio' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('portofolio') }}">Portfolio</a>
                        </li>
                        <li class="nav-item {{ Request::path() === 'achievement' ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('achievement') }}">Achievement</a>
                        </li>
                        @auth
                            <li class="nav-item {{ Request::path() === 'dashboard' ? 'active' : '' }}">
                                <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item {{ Request::path() === 'login' ? 'active' : '' }}">
                                <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
