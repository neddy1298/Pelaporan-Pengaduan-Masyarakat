@extends('layouts.front.app', ['page' => 'Pengaduan'])

@section('content')


<!-- Slider Area Start-->
<div class="services-area">
    <div class="container">
        <!-- Section-tittle -->
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="section-tittle text-center mb-80">
                    <h2>Daftar Pengaduan Kamu</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Slider Area End-->

<!--================Blog Area =================-->
<section class="blog_area section-paddingr">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">

                    @foreach ($pengaduans as $pengaduan)

                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ asset('asset') }}/pengaduan/{{ $pengaduan->foto }}"
                                alt="" width="100%">
                            <a href="#" class="blog_item_date">
                                <h3>{{$pengaduan->tgl_pengaduan->format('d')}}</h3>
                                <p>{{$pengaduan->tgl_pengaduan->format('M Y')}}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block"
                                href="{{ route('masyarakat.pengaduan.detail', $pengaduan->id_pengaduan) }}">
                                <h2>{{ $pengaduan->judul }}</h2>
                            </a>
                            <p>{{ substr($pengaduan->isi_laporan, 0,200) }}...</p>
                            <ul class="blog-info-link">
                                <li><a href="{{ route('masyarakat.pengaduan.detail', $pengaduan->id_pengaduan) }}"><i
                                            class="fa fa-user"></i> {{ Auth::user()->nama }}</a></li>
                                @if ($pengaduan->status == '0')
                                <li><a class="text-danger" href="#">Belum di Konfirmasi</a></li>
                                @elseif ($pengaduan->status == 'proses')
                                <li><a class="text-warning" href="#">Dalam Proses</a></li>
                                @elseif ($pengaduan->status == 'selesai')
                                <li><a class="text-success" href="#">Selesai di Tanggapi</a></li>
                                @endif
                            </ul>
                        </div>
                    </article>

                    @endforeach

                    {{ $pengaduans->onEachSide(5)->links("layouts.front.paginate") }}
                </div>
            </div>
            {{-- Sidebar --}}
            @include('layouts.front.pengaduan')
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection
