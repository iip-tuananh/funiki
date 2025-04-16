@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
<link href="/site/css/breadcrumb_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
<link href="/site/css/blog_article_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
<link href="/site/css/sidebar_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
    <section class="bread-crumb">
        <div class="container">
            <ul class="breadcrumb">
                <li class="home">
                    <a href="{{ route('front.home-page') }}" title="Trang chủ"><span>Trang chủ</span></a>
                    <span class="mr_lr">
                        &nbsp;
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                            class="svg-inline--fa fa-chevron-right fa-w-10">
                            <path fill="currentColor"
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                class=""></path>
                        </svg>
                        &nbsp;
                    </span>
                </li>
                <li><strong><span>Tin tức</span></strong></li>
            </ul>
        </div>
    </section>
    <div class="blog_wrapper layout-blog" itemscope itemtype="https://schema.org/Blog">
        <div class="container">
            <div class="row">
                <div class="right-content col-lg-9 col-12">
                    <h1 class="title-page">Tin tức</h1>
                    <section class="list-blogs blog-main listmain_blog clearfix">
                        <div class="row_blog_responsive">
                            <div class="row clearfix">
                                @foreach ($blogs as $blog)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="item_blog_index clearfix ">
                                        <div class="img-blog">
                                            <a class="image-blog"
                                                href="{{ route('front.detail-blog', $blog->slug) }}"
                                                title="{{ $blog->name }}">
                                                <img width="600" height="378"
                                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                    data-src="{{ $blog->image ? $blog->image->path : '' }}"
                                                    alt="{{ $blog->name }}"
                                                    class="lazyload img-responsive" />
                                            </a>
                                        </div>
                                        <div class="blog_content">
                                            <h3><a href="{{ route('front.detail-blog', $blog->slug) }}"
                                                    title="{{ $blog->name }}">{{ $blog->name }}</a></h3>
                                            <p class="update_date clearfix">
                                                <span class="user_date">
                                                    <svg aria-hidden="true" focusable="false" data-prefix="fal"
                                                        data-icon="clock" role="img" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 512 512" class="svg-inline--fa fa-clock fa-w-16">
                                                        <path fill="currentColor"
                                                            d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm216 248c0 118.7-96.1 216-216 216-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216zm-148.9 88.3l-81.2-59c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h14c6.6 0 12 5.4 12 12v146.3l70.5 51.3c5.4 3.9 6.5 11.4 2.6 16.8l-8.2 11.3c-3.9 5.3-11.4 6.5-16.8 2.6z"
                                                            class=""></path>
                                                    </svg>
                                                    {{ $blog->created_at->format('d/m/Y') }}
                                                </span>
                                            </p>
                                            <p class="blog_description">{!! $blog->intro !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right pageinate-page-blog section clearfix">
                                <nav class="clearfix relative nav_pagi w_100 ">
                                    {{ $blogs->links() }}
                                </nav>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="blog_left_base col-lg-3 col-12">
                    <div class="side-right-stick">
                        <div class="aside-content aside-content-blog">
                            <div class="title-head">
                                Danh mục
                            </div>
                            <nav class="nav-category">
                                <ul class="navbar-pills-blog">
                                    @foreach ($productCategories as $category)
                                    <li class="nav-item  relative">
                                        <a title="{{ $category->name }}" href="{{ route('front.show-product-category', $category->slug) }}" class="nav-link pr-5">{{ $category->name }}</a>
                                        @if ($category->childs->count() > 0)
                                        <i class="open_mnu down_icon"></i>
                                        <ul class="menu_down" style="display:none;">
                                            @foreach ($category->childs as $child)
                                            <li class="dropdown-submenu nav-item  relative">
                                                <a title="{{ $child->name }}" class="nav-link pr-5"
                                                    href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a>
                                                <i class="open_mnu down_icon"></i>
                                                <ul class="menu_down" style="display:none;">
                                                    @foreach ($child->childs as $childChild)
                                                    <li class="nav-item">
                                                        <a title="{{ $childChild->name }}" class="nav-link pl-4"
                                                            href="{{ route('front.show-product-category', $childChild->slug) }}">{{ $childChild->name }}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    @foreach ($postCategories as $category)
                                    <li class="nav-item relative">
                                        <a title="{{ $category->name }}" class="nav-link" href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                    <li class="nav-item  relative">
                                        <a title="Liên hệ" class="nav-link" href="{{ route('front.contact-us') }}">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <script>
                            $(".open_mnu").click(function() {
                                $(this).toggleClass('cls_mn').next().slideToggle();
                            });
                        </script>
                        <div class="blog_noibat">
                            <h2 class="h2_sidebar_blog">
                                <a href="javascript:void(0)" title="Tin tức nổi bật">Tin tức nổi bật</a>
                            </h2>
                            <div class="blog_content">
                                @foreach ($newBlogs as $blog)
                                <div class="item clearfix">
                                    <div class="post-thumb">
                                        <a class="image-blog scale_hover"
                                            href="{{ route('front.detail-blog', $blog->slug) }}"
                                            title="{{ $blog->name }}">
                                            <img class="img_blog lazyload"
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                                                data-src="{{ $blog->image ? $blog->image->path : '' }}"
                                                alt="{{ $blog->name }}">
                                        </a>
                                    </div>
                                    <div class="contentright">
                                        <h3><a title="{{ $blog->name }}"
                                                href="{{ route('front.detail-blog', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                        <p class="time-post">
                                            <span>{{ $blog->created_at->format('d/m/Y') }}</span>
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
