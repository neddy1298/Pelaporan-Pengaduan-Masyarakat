<div class="header-area header-transparrent ">
    <div class="main-header header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <!-- Logo -->
                <div class="col-xl-2 col-lg-2 col-md-2">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('front') }}/img/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-10 col-md-10">
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li class="active"><a href="index.html"> Home</a></li>
                                @if (Auth::guest())
                                <li><a href="{{ route('masyarakat.register') }}">Daftar</a></li>
                                <li><a href="{{ route('masyarakat.login') }}">Masuk</a></li>
                                @else
                                <li><a href="#">Hi, {{ Auth::user()->nama }}</a>
                                    <ul class="submenu">
                                        <li><a href="blog.html">Profile</a></li>
                                        <li class="mt-2"><a class="text-danger" {{ route('masyarakat.logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i
                                                    class="fas fa-sign-out-alt"></i>
                                                Logout</a>
                                        </li>
                                        <form id="logout-form" action="{{ route('masyarakat.logout') }}" method="GET"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
