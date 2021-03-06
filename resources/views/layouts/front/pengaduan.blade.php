<div class="col-lg-4">
    <div class="blog_right_sidebar">
        <aside class="single_sidebar_widget search_widget">
            <form action="#">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder='Search Keyword'
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                        <div class="input-group-append">
                            <button class="btns" type="button"><i class="ti-search"></i></button>
                        </div>
                    </div>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Search</button>
            </form>
        </aside>

        <aside class="single_sidebar_widget post_category_widget">
            <h4 class="widget_title">Category</h4>
            <ul class="list cat-list">
                <li>
                    <a href="{{ route('masyarakat.pengaduan.user') }}" class="d-flex">
                        <p>Pengaduan Kamu</p>
                        <p> ({{ $countKu->count() }})</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('masyarakat.pengaduan') }}" class="d-flex">
                        <p>Pengaduan Semua Orang</p>
                        <p> ({{$countSem->count() }})</p>
                    </a>
                </li>
            </ul>
        </aside>

        <aside class="single_sidebar_widget popular_post_widget">
            <h3 class="widget_title">Pengaduan Terbaru</h3>
            @foreach ($countSem->take(4) as $count)
            <div class="media post_item">
                <img src="{{ asset('asset') }}/pengaduan/{{ $count->foto }}" alt="post" width="40%">
                <div class="media-body">
                    <a href="{{ route( 'masyarakat.pengaduan.detail', $count->id_pengaduan) }}">
                        <h3>{{$count->judul }}</h3>
                    </a>
                    <p>{{ $count->tgl_pengaduan->format('d M, Y') }}</p>
                </div>
            </div>
            @endforeach
        </aside>
        <aside class="single_sidebar_widget tag_cloud_widget">
            <h4 class="widget_title">Tag Clouds</h4>
            <ul class="list">
                <li>
                    <a href="#">project</a>
                </li>
                <li>
                    <a href="#">love</a>
                </li>
                <li>
                    <a href="#">technology</a>
                </li>
                <li>
                    <a href="#">travel</a>
                </li>
                <li>
                    <a href="#">restaurant</a>
                </li>
                <li>
                    <a href="#">life style</a>
                </li>
                <li>
                    <a href="#">design</a>
                </li>
                <li>
                    <a href="#">illustration</a>
                </li>
            </ul>
        </aside>


        <aside class="single_sidebar_widget instagram_feeds">
            <h4 class="widget_title">Instagram Feeds</h4>
            <ul class="instagram_row flex-wrap">
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_5.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_6.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_7.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_8.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_9.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img class="img-fluid" src="{{ asset('front') }}/img/post/post_10.png" alt="">
                    </a>
                </li>
            </ul>
        </aside>


        <aside class="single_sidebar_widget newsletter_widget">
            <h4 class="widget_title">Newsletter</h4>

            <form action="#">
                <div class="form-group">
                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                </div>
                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                    type="submit">Subscribe</button>
            </form>
        </aside>
    </div>
</div>
