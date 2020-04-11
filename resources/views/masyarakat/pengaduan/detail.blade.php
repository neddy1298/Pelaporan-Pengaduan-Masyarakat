@extends('layouts.front.app', ['page' => 'Pengaduan', 'total', '0'])

@section('content')

<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">

        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Detail Pengaduan {{ $pengaduan->id_pengaduan }}​</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->
<!--================Blog Area =================-->
<section class="blog_area single-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset("asset") }}/pengaduan/{{ $pengaduan->foto }}" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $pengaduan->judul }}
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a><i class="fa fa-user"></i> {{ $pengaduan->nama }}</a></li>
                            @if ($pengaduan->status == '0')
                            <li><a class="text-danger">Belum di Konfirmasi</a></li>
                            @elseif ($pengaduan->status == 'proses')
                            <li><a><i class="fa fa-comments"></i> {{ $tanggapans->count() }} Tanggapan</a></li>
                            <li><a class="text-warning">Dalam Proses</a></li>
                            @elseif ($pengaduan->status == 'selesai')
                            <li><a><i class="fa fa-comments"></i> {{ $tanggapans->count() }} Tanggapan</a></li>
                            <li><a class="text-success">Selesai di Tanggapi</a></li>
                            @endif
                        </ul>
                        <p class="excert">
                            {!! $pengaduan->isi_laporan !!}
                        </p>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                            people like this</p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a><i class="fab fa-facebook-f"></i></a></li>
                            <li><a><i class="fab fa-twitter"></i></a></li>
                            <li><a><i class="fab fa-dribbble"></i></a></li>
                            <li><a><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            @if ($prevContent)
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                <div class="thumb">
                                    <a href="{{ route('masyarakat.pengaduan.detail', $prevContent->id_pengaduan) }}">
                                        <img class="img-fluid"
                                            src="{{ asset("asset") }}/pengaduan/{{ $prevContent->foto }}" alt=""
                                            width="50px">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('masyarakat.pengaduan.detail', $prevContent->id_pengaduan) }}">
                                        <span class="lnr text-white ti-arrow-left"></span>
                                    </a>
                                </div>
                                <div class="detials">
                                    <p>Prev Post</p>
                                    <a href="{{ route('masyarakat.pengaduan.detail', $prevContent->id_pengaduan) }}">
                                        <h4>{{ $prevContent->judul }}</h4>
                                    </a>
                                </div>
                            </div>
                            @else
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            </div>
                            @endif
                            @if($nextContent)
                            <div
                                class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                <div class="detials">
                                    <p>Next Post</p>
                                    <a href="{{ route('masyarakat.pengaduan.detail', $nextContent->id_pengaduan) }}">
                                        <h4>{{ $nextContent->judul }}</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('masyarakat.pengaduan.detail', $nextContent->id_pengaduan) }}">
                                        <span class="lnr text-white ti-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="thumb">
                                    <a href="{{ route('masyarakat.pengaduan.detail', $nextContent->id_pengaduan) }}">
                                        <img src="{{ asset("asset") }}/pengaduan/{{ $nextContent->foto }}" alt=""
                                            width="50px">
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="media align-items-center">
                        <img src="{{ asset("front") }}/img/blog/author.png" alt="">
                        <div class="media-body">
                            <a>
                                <h4>{{ $pengaduan->nama }}</h4>
                            </a>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum eaque sit aliquid quod recusandae voluptas ipsam ratione, ex quas? Itaque error rerum architecto nisi animi culpa quasi voluptatum laborum at.</p>
                        </div>
                    </div>
                </div>
                @if ($pengaduan->status == '0')
                <div class="comments-area">
                    <h4 class="text-danger">Tanggapan Belum di Konfirmasi</h4>
                </div>
                @else
                <div class="comments-area">
                    <h4>{{ $tanggapans->count() }} Tanggapan</h4>
                    @foreach ($tanggapans as $tanggapan)
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="{{ asset("front") }}/img/comment/comment_3.png" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        {{ $tanggapan->tanggapan }}
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a>{{ $tanggapan->nama_petugas }}</a>
                                            </h5>
                                            <p class="date">{{ $tanggapan->tgl_tanggapan->format('d F, Y') }}</p>
                                        </div>
                                        <div class="reply-btn">
                                            <a class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
                @if ($pengaduan->status == 'proses')
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                        placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text"
                                        placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
                                Message</button>
                        </div>
                    </form>
                </div>
                @endif
            </div>
            @include('layouts.front.pengaduan')
        </div>
    </div>
</section>
<!--================ Blog Area end =================-->
@endsection
