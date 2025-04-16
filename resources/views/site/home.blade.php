@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{-- {{ url('' . $banners[0]->image->path) }} --}}
@endsection
@section('css')
    <style>
        .gradient-icon {
            display: inline-block;
            width: 24px;
            height: 24px;
            font-size: 24px;
            border-radius: 6px;
            background: linear-gradient(270deg, #d53c00 0%, #dd6333 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col-12">
                <div class="section_slider swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($banners as $banner)
                            <div class="swiper-slide">
                                <a href="{{ $banner->link }}" class="a_tow_slide" title="{{ $banner->title }}">
                                    <picture>
                                        <source media="(min-width: 1200px)" srcset="{{ $banner->image->path }}">
                                        <source media="(min-width: 992px)" srcset="{{ $banner->image->path }}">
                                        <source media="(min-width: 569px)" srcset="{{ $banner->image->path }}">
                                        <source media="(max-width: 480px)" srcset="{{ $banner->image->path }}">
                                        <img width="1920" height="750" src="{{ $banner->image->path }}"
                                            alt="{{ $banner->title }}" class="img-responsive center-block" loading="lazy" />
                                    </picture>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        @foreach ($banners as $banner)
                        @php
                            $intro = explode("\n", $banner->intro);
                        @endphp
                            <div class="swiper-slide">
                                <div class="title_one_slide">
                                    @foreach ($intro as $item)
                                        {{ $item }}<br>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-12">
                <div class="row row-electric">
                    @foreach ($smallBanners as $smallBanner)
                        <div class="col-lg-12 col-md-12 col-sm-6 col-xs-6 col-6">
                            <a class="banner_slide_1" href="{{ $smallBanner->link }}" title="{{ $smallBanner->title }}">
                                <img width="500" height="220" src="{{ $smallBanner->image->path }}"
                                    alt="{{ $smallBanner->title }}" loading="lazy" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 4,
                slidesPerView: 0,
                spaceBetween: 0,
                freeMode: true,
                lazy: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                hashNavigation: true,
                slideToClickedSlide: true,
                breakpoints: {
                    260: {
                        slidesPerView: 2
                    },
                    300: {
                        slidesPerView: 3
                    },
                    500: {
                        slidesPerView: 3
                    },
                    640: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1024: {
                        slidesPerView: 4
                    },
                    1199: {
                        slidesPerView: 4
                    },
                    1600: {
                        slidesPerView: 4
                    }
                }
            });
            var galleryTop = new Swiper('.section_slider', {
                spaceBetween: 0,
                lazy: true,
                navigation: {
                    nextEl: '.section_slider .swiper-button-next',
                    prevEl: '.section_slider .swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs
                }
            });
        });
    </script>
    <section class="section_brand">
        <div class="container">
            <div class="gird-brand">
                @foreach ($partners as $item)
                    <a href="{{ $item->link }}" class="item_brand" title="{{ $item->name }}">
                        <img width="250" height="54" class="lazyload"
                            src="data:image/png;base64,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"
                            data-src="{{ $item->image ? $item->image->path : '' }}" alt="{{ $item->name }}"
                            loading="lazy" />
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @if ($categorySpecialFlashsale)
        <section class="section_flash_sale container">
            <div class="box-deal">
                <div class="row time_box">
                    <div class="col-md-12 col-sm-12 col-12 col-lg-9 col-xl-10">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-lg-3">
                                <h2 class="title">
                                    <a href="{{ route('front.show-product-category', $categorySpecialFlashsale->slug) }}"
                                        title="{{ $categorySpecialFlashsale->name }}">
                                        {{ $categorySpecialFlashsale->name }}
                                        <img width="64" height="64" alt="{{ $categorySpecialFlashsale->name }}"
                                            src="/site/images/flash.png" loading="lazy">
                                    </a>
                                </h2>
                            </div>
                            <div class="col-12 col-sm-12 col-lg-9">
                                <div class="swiper_fade_text swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide text-center">
                                            <a class="modal-open text-white line_1" href="javascript:void(0)"
                                                title="Giảm ngay 120k (áp dụng cho các đơn hàng trên 500k)">Giảm ngay
                                                120k (áp dụng cho các đơn hàng trên 500k)
                                            </a>
                                        </div>
                                        <div class="swiper-slide text-center">
                                            <a class="modal-open text-white line_1" href="javascript:void(0)"
                                                title="Giảm ngay 20% tổng giá trị đơn hàng. Số lượng có hạn">Giảm ngay
                                                20% tổng giá trị đơn hàng. Số lượng có hạn
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="count-down">
                        <div class="timer-view" data-countdown="countdown"
                            data-date="{{ date('Y-m-d-H-i-s', strtotime($categorySpecialFlashsale->end_date)) }}">
                        </div>
                    </div>
                </div>
                <div class="swi_deal_pro swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($categorySpecialFlashsale->products as $product)
                            <div class="item_product_main swiper-slide">
                                @include('site.products.product_item', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif
    <script>
        $(document).ready(function() {
            var mew_text_fade = new Swiper('.swiper_fade_text', {
                loop: true,
                speed: 5000,
                spaceBetween: 0,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: true,
                },
                slidesPerView: 1,
                effect: 'linear'
            });
            var swiperdeal = new Swiper('.swi_deal_pro', {
                slidesPerView: 4,
                spaceBetween: 15,
                slidesPerGroup: 1,
                pagination: {
                    el: '.swi_deal_pro .swiper-pagination',
                    clickable: true
                },
                breakpoints: {
                    280: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    },
                    992: {
                        slidesPerView: 4,
                        spaceBetween: 15
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 15
                    },
                    1026: {
                        slidesPerView: 4,
                        spaceBetween: 15
                    }
                }
            });
        });
    </script>
    @foreach ($categorySpecial as $category)
        <section class="section_air_conditioner container">
            <div class="title_index">
                <h2 class="h2_title">
                    {{-- @if ($category->image)
                <img width="32" height="32"
                    src="{{ $category->image->path }}"
                    alt="{{ $category->name }}" loading="lazy"/>
                @endif --}}
                    <a class="main-title" href="{{ route('front.show-product-category', $category->slug) }}"
                        title="{{ $category->name }}">{{ $category->name }}</a>
                </h2>
                <ul class="link_title">
                    <li><a href="{{ route('front.show-product-category', $category->slug) }}" title="Máy lạnh âm trần">Xem
                            thêm</a></li>
                </ul>
            </div>
            @if ($category->image)
                <a class="banner_air_conditioner" href="{{ route('front.show-product-category', $category->slug) }}"
                    title="{{ $category->name }}">
                    <img width="1200" height="314" class="lazyload"
                        src="data:image/png;base64,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"
                        data-src="{{ $category->image->path }}" alt="{{ $category->name }}" loading="lazy" />
                </a>
            @endif
            <div class="row">
                @foreach ($category->products as $product)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-xs-6 col-6">
                        <div class="item_product_main ">
                            @include('site.products.product_item', ['product' => $product])
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
    @foreach ($categorySpecialPost as $category)
        <section class="secttion_blogs container">
            <div class="title_blog_box">
                <h2 class="title_pro">{{ $category->name }}</h2>
                <a href="javascript:void(0);" title="Xem tất cả" class="see_all">
                    Xem tất cả
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                        <path fill="#0074bf"
                            d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                        </path>
                    </svg>
                </a>
            </div>
            <div class="item_blog_mall">
                <div class="video_big">
                    <div class="img_video">
                        <img width="600" height="378"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="{{ $category->posts[0]->image->path ?? '' }}"
                            alt="{{ $category->posts[0]->name }}" class="lazyload img-responsive" />
                    </div>
                    <a href="{{ route('front.detail-blog', $category->posts[0]->slug) }}"
                        title="{{ $category->posts[0]->name }}" class="title_video">
                        <h3>{{ $category->posts[0]->name }}</h3>
                    </a>
                </div>
                <div class="video_small">
                    @foreach ($category->posts as $key => $post)
                    @if ($key > 0)
                    <div class="video_small_item">
                        <div class="img_video">
                            <img width="600" height="378"
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                data-src="{{ $post->image->path ?? '' }}" alt="{{ $post->name }}"
                                class="lazyload img-responsive" />
                        </div>
                        <a href="{{ route('front.detail-blog', $post->slug) }}" title="{{ $post->name }}"
                            class="title_video">
                            <h3>{{ $post->name }}</h3>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach
    <section class="section_policy container">
        <div class="row promo-box">
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="icon">
                        <img width="50" height="50" class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="/site/images/ser_1.png?1740037266911" alt="{{ $config->web_title }}" />
                    </div>
                    <div class="info">Vận chuyển <span>MIỄN PHÍ</span> <br> Trong khu vực <span>TP.HCM</span></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="icon">
                        <img width="50" height="50" class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="/site/images/ser_2.png?1740037266911" alt="{{ $config->web_title }}" />
                    </div>
                    <div class="info">Đổi trả <span>MIỄN PHÍ</span> <br> Trong vòng <span>30 NGÀY</span></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="icon">
                        <img width="50" height="50" class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="/site/images/ser_3.png?1740037266911" alt="{{ $config->web_title }}" />
                    </div>
                    <div class="info">Tiến hành <span>THANH TOÁN</span> <br> Với nhiều <span>PHƯƠNG THỨC</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                <div class="promo-item">
                    <div class="icon">
                        <img width="50" height="50" class="lazyload"
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                            data-src="/site/images/ser_4.png?1740037266911" alt="{{ $config->web_title }}" />
                    </div>
                    <div class="info"><span>100% HOÀN TIỀN</span><br> nếu sản phẩm lỗi</div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
@endpush
