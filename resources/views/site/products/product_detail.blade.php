@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {!! strip_tags($product->intro) !!}
@endsection
@section('image')
    {{ $product->image ? $product->image->path : $product->galleries[0]->image->path }}
@endsection

@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/product_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
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
                <li>
                    <a class="changeurl"
                        href="{{ route('front.show-product-category', ['categorySlug' => $product->category->slug]) }}"
                        title="{{ $product->category->name }}"><span>{{ $product->category->name }}</span></a>
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
                <li><strong><span>{{ $product->name }}</span></strong>
                <li>
            </ul>
        </div>
    </section>
    <section class="product layout-product" ng-controller="ProductDetailController">
        <div class="container">
            <div class="details-product">
                <div class="row">
                    <div class="col-lg-9 col-col-md-9 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="product-detail-left product-images col-12 col-md-6 col-lg-6">
                                <div class="product-image-block relative">
                                    <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper" id="lightgallery">
                                            <a class="swiper-slide" data-hash="0" href="{{ $product->image ? $product->image->path : ''}}"
                                                title="Click để xem">
                                                <img height="480" width="480" src="{{$product->image ? $product->image->path : ''}}"
                                                    alt="{{ $product->name }}" data-image="{{$product->image ? $product->image->path : ''}}"
                                                    class="img-responsive mx-auto d-block swiper-lazy" />
                                            </a>
                                            @foreach ($product->galleries as $key => $gallery)
                                                <a class="swiper-slide" data-hash="{{ $key }}"
                                                    href="{{ $gallery->image ? $gallery->image->path : '' }}" title="Click để xem">
                                                    <img height="480" width="480" src="{{ $gallery->image ? $gallery->image->path : '' }}"
                                                        alt="{{ $product->name }}"
                                                        data-image="{{ $gallery->image ? $gallery->image->path : '' }}"
                                                        class="img-responsive mx-auto d-block swiper-lazy" />
                                                </a>
                                            @endforeach

                                        </div>
                                    </div>
                                    <div class="swiper-container gallery-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide" data-hash="0">
                                                <div class="p-100">
                                                    <img height="80" width="80" src="{{$product->image ? $product->image->path : ''}}"
                                                        alt="{{ $product->name }}"
                                                        data-image="{{$product->image ? $product->image->path : ''}}" class="swiper-lazy" />
                                                </div>
                                            </div>
                                            @foreach ($product->galleries as $key => $gallery)
                                                <div class="swiper-slide" data-hash="{{ $key }}">
                                                    <div class="p-100">
                                                        <img height="80" width="80"
                                                            src="{{ $gallery->image ? $gallery->image->path : '' }}" alt="{{ $product->name }}"
                                                            data-image="{{ $gallery->image ? $gallery->image->path : '' }}" class="swiper-lazy" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="swiper-button-next"></div>
                                        <div class="swiper-button-prev"></div>
                                    </div>
                                    <div class="box-icon-ven">
                                        @if ($product->base_price > 0 && $product->price > 0)
                                            <div class="item-discount">
                                                {{ round((($product->base_price - $product->price) / $product->base_price) * 100) }}%
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="details-pro col-12 col-md-6 col-lg-6">
                                <h1 class="title-product">{{ $product->name }}</h1>
                                <div class="inventory_quantity">
                                    <span class="mb-break">
                                        <span class="stock-brand-title">Mã sản phẩm:</span>
                                        <span class="a-vendor">{{ $product->sku }}
                                        </span>
                                    </span>
                                    <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                    <span class="mb-break">
                                        <span class="stock-brand-title">Tình trạng:</span>
                                        <span class="a-stock">Còn hàng</span>
                                    </span>
                                </div>
                                <form enctype="multipart/form-data" data-cart-form id="add-to-cart-form"
                                    class="form-inline">
                                    <div class="price-box clearfix">
                                        @if ($product->price > 0 && $product->base_price > 0)
                                            <span class="special-price">
                                                Giá: <span
                                                    class="price product-price">{{ formatCurrency($product->price) }}</span>
                                            </span>
                                            <!-- Giá Khuyến mại -->
                                            <span class="old-price">
                                                Giá thị trường: <del class="price product-price-old">
                                                    {{ formatCurrency($product->base_price) }}
                                                </del>
                                            </span>
                                            <!-- Giás gốc -->
                                            <span class="save-price">Tiết kiệm:
                                                <span
                                                    class="price product-price-save">{{ formatCurrency($product->base_price - $product->price) }}
                                                    so với giá thị trường</span>
                                            </span> <!-- Tiết kiệm -->
                                        @elseif ($product->price == 0 && $product->base_price > 0)
                                            <span class="special-price">
                                                Giá: <span
                                                    class="price product-price">{{ formatCurrency($product->base_price) }}</span>
                                            </span>
                                        @else
                                            <span class="special-price">
                                                Giá: <span
                                                    class="price product-price">{{ formatCurrency($product->price) }}</span>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="var_tag_pr">
                                        <div class="items">
                                            @if (isset($product->attributes) && count($product->attributes) > 0)
                                                @foreach ($product->attributes as $index => $attribute)
                                                    <div class="product-attributes-title">
                                                        {{ $attribute['name'] }}
                                                    </div>
                                                    @foreach ($attribute['values'] as $value)
                                                        <div class="item active" data-value="{{ $value }}"
                                                            data-name="{{ $attribute['name'] }}"
                                                            data-index="{{ $index }}">
                                                            <a href="javascript:void(0)" title="">
                                                                <p class="tit_pr">
                                                                    {{ $value }}
                                                                </p>
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    @if ($isProductFlashsale)
                                    <div class="block-flashsale">
                                        <div class="heading-flash">
                                            <svg width="27" height="27" viewBox="0 0 27 27" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19.6962 8.63839C19.1335 8.02409 18.2587 7.19494 17.8866 9.06712C17.76 9.70368 17.4644 10.1944 17.211 10.5895C16.9379 9.20718 16.1161 7.77645 15.3419 6.81178C15.0522 6.45086 14.0242 5.01612 13.8267 2.61586C13.7972 2.25764 13.3717 2.08941 13.1055 2.33104C10.5621 4.63996 9.16597 7.81552 9.11413 11.3905C9.11413 11.3905 8.05501 10.4978 7.47963 8.83699C7.3247 8.38975 6.7251 8.30442 6.46497 8.69988C6.41503 8.77582 6.36873 8.85186 6.32696 8.92569C4.36456 12.3956 3.42056 16.6093 4.29326 20.5296C5.75242 27.0949 15.4046 28.9304 20.5145 24.804C25.514 20.7668 23.9248 13.2528 19.6962 8.63839Z"
                                                    fill="#ED694A" />
                                                <path
                                                    d="M5.65143 20.9418C4.78886 16.9796 5.7019 12.7248 7.61821 9.20061C7.56975 9.0837 7.52313 8.96278 7.47958 8.83706C7.32464 8.38982 6.72505 8.30449 6.46491 8.69995C6.41497 8.77589 6.36873 8.85193 6.32696 8.92576C4.36456 12.3957 3.42056 16.6094 4.29326 20.5297C4.95882 23.5243 7.32912 25.5342 10.1953 26.4438C7.95935 25.3607 6.20836 23.504 5.65143 20.9418Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M10.4792 11.3247C10.5851 8.08013 11.7587 5.17077 13.8591 2.93579C13.8446 2.8127 13.8339 2.70265 13.827 2.61912C13.7969 2.25783 13.387 2.07664 13.122 2.31616C10.6653 4.53722 9.16799 7.68067 9.11426 11.3904L9.57405 11.7475C9.80049 11.9234 10.1073 11.9157 10.3236 11.7546C10.4526 11.6452 10.4711 11.4802 10.4792 11.3247Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M18.1536 13.4376C17.738 12.9839 17.0919 12.3714 16.817 13.7543C16.7236 14.2244 16.5051 14.5869 16.318 14.8787C16.1163 13.8578 15.5094 12.801 14.9375 12.0885C14.7235 11.8219 13.9642 10.7622 13.8183 8.98921C13.7966 8.72459 13.4823 8.6004 13.2857 8.77885C11.4071 10.4842 10.3758 12.8299 10.3376 15.4704C10.3376 15.4704 9.55528 14.811 9.13035 13.5843C9.01592 13.2539 8.573 13.1909 8.38089 13.483C8.34403 13.5391 8.3098 13.5953 8.27895 13.6498C6.82944 16.2128 6.13219 19.3251 6.77676 22.2207C7.85455 27.07 14.9838 28.4257 18.7581 25.3778C22.4508 22.396 21.277 16.8459 18.1536 13.4376Z"
                                                    fill="#F4A32C" />
                                                <path
                                                    d="M8.12102 22.6012C7.55032 19.7706 8.14142 16.7334 9.39466 14.2042C9.29915 14.0172 9.20866 13.8105 9.1303 13.5844C9.01586 13.254 8.57295 13.191 8.38084 13.4831C8.34398 13.5391 8.30975 13.5953 8.2789 13.6499C6.82945 16.2129 6.13224 19.3252 6.77671 22.2208C7.278 24.4761 9.08843 25.9753 11.2613 26.6276C9.7175 25.8534 8.50197 24.4932 8.12102 22.6012Z"
                                                    fill="#E89528" />
                                                <path
                                                    d="M16.7451 17.8191C16.4638 17.512 16.0263 17.0973 15.8403 18.0335C15.777 18.3518 15.6291 18.5971 15.5024 18.7946C15.3659 18.1035 14.9551 17.3881 14.5679 16.9058C14.4231 16.7253 13.9091 16.008 13.8102 14.8078C13.7955 14.6287 13.5828 14.5446 13.4497 14.6654C12.178 15.8199 11.4799 17.4077 11.454 19.1952C11.454 19.1952 10.9244 18.7488 10.6368 17.9184C10.5593 17.6948 10.2595 17.6522 10.1295 17.8499C10.1045 17.8878 10.0814 17.9258 10.0605 17.9628C9.07928 19.6977 8.60726 21.8046 9.04358 23.7647C9.77316 27.0474 14.5993 27.9651 17.1542 25.9019C18.0291 25.1954 18.5716 24.1998 18.6816 23.0986C18.8476 21.4306 18.2057 19.413 16.7451 17.8191Z"
                                                    fill="#F4D44E" />
                                                <path
                                                    d="M15.4377 21.8851C15.281 21.714 15.0373 21.483 14.9336 22.0045C14.8984 22.1819 14.816 22.3186 14.7454 22.4286C14.6693 22.0436 14.4405 21.645 14.2248 21.3763C14.1441 21.2757 13.8577 20.8761 13.8026 20.2074C13.7944 20.1076 13.6759 20.0608 13.6018 20.1281C12.8933 20.7713 12.5043 21.6559 12.4899 22.6517C12.4899 22.6517 12.1949 22.403 12.0346 21.9404C11.9914 21.8158 11.8244 21.792 11.752 21.9022C11.7381 21.9234 11.7252 21.9446 11.7136 21.9651C11.167 22.9318 10.904 24.1055 11.1471 25.1976C11.7007 27.6883 16.2384 27.6128 16.5167 24.8264C16.6091 23.8972 16.2515 22.7731 15.4377 21.8851Z"
                                                    fill="#EAE9E8" />
                                                <path
                                                    d="M12.2007 25.6918C11.9576 24.7149 12.2206 23.6649 12.7672 22.8003C12.7788 22.7819 12.7917 22.763 12.8056 22.744C12.878 22.6455 13.0451 22.6667 13.0882 22.7781C13.2485 23.192 13.5435 23.4145 13.5435 23.4145C13.5554 22.6825 13.8205 22.0181 14.3075 21.4851C14.1986 21.3343 13.8654 20.9707 13.8026 20.2074C13.7944 20.1076 13.6759 20.0608 13.6018 20.1281C12.8933 20.7713 12.5043 21.6559 12.4899 22.6517C12.4899 22.6517 12.1949 22.403 12.0346 21.9405C11.9915 21.8158 11.8244 21.7921 11.752 21.9023C11.7381 21.9234 11.7252 21.9446 11.7136 21.9652C11.167 22.9318 10.904 24.1056 11.1471 25.1976C11.3721 26.2099 12.2963 26.8182 13.3181 26.965C12.7669 26.6944 12.3433 26.2657 12.2007 25.6918Z"
                                                    fill="#F7E7A1" />
                                                <path
                                                    d="M9.73473 3.58831C10.8751 2.66077 10.8726 0.925435 9.73473 0C8.59435 0.927492 8.59683 2.66287 9.73473 3.58831Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M23.4031 11.0328C24.5435 10.1052 24.5409 8.36989 23.4031 7.44446C22.8819 7.86834 22.2652 10.1073 23.4031 11.0328Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M3.20562 11.739C4.02748 11.0705 4.02569 9.81987 3.20562 9.15283C2.82999 9.45832 2.38555 11.072 3.20562 11.739Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M17.4399 6.1744C18.2618 5.50589 18.26 4.25529 17.4399 3.58826C16.6181 4.25672 16.6199 5.50742 17.4399 6.1744Z"
                                                    fill="#D8553A" />
                                                <path
                                                    d="M11.386 15.0464C11.5748 12.8183 12.4256 10.8371 13.8543 9.32673C13.8399 9.21725 13.8277 9.10488 13.8182 8.98933C13.7964 8.72471 13.4822 8.60052 13.2856 8.77898C11.7969 10.1303 10.8414 11.8841 10.4895 13.8677L10.489 13.8675C10.4629 14.0147 10.4305 14.229 10.41 14.3973C10.4101 14.3975 10.4101 14.3976 10.4102 14.3978C10.3675 14.7492 10.3427 15.1069 10.3374 15.4705C10.3772 15.4783 11.2772 15.9409 11.386 15.0464Z"
                                                    fill="#E89528" />
                                                <path
                                                    d="M10.3587 24.2304C9.97086 22.3992 10.3012 20.4465 11.0686 18.7545C10.9199 18.546 10.7572 18.266 10.6368 17.9184C10.5593 17.6948 10.2596 17.6521 10.1295 17.8498C10.1045 17.8877 10.0813 17.9258 10.0605 17.9627C9.07928 19.6977 8.60726 21.8045 9.04358 23.7647C9.3853 25.302 10.6255 26.3207 12.11 26.7574C11.2459 26.1837 10.5922 25.3346 10.3587 24.2304Z"
                                                    fill="#E8C842" />
                                                <path
                                                    d="M12.854 18.395C12.9826 17.4761 13.3584 16.4636 13.9501 15.6172C13.8856 15.3782 13.835 15.1081 13.8102 14.8078C13.7955 14.6287 13.5827 14.5446 13.4497 14.6654C12.6573 15.3848 12.0885 16.2727 11.7654 17.272L11.7646 17.2718C11.7138 17.4288 11.6419 17.6889 11.5983 17.8941C11.5987 17.894 11.5991 17.894 11.5994 17.8939C11.5102 18.3128 11.4606 18.7476 11.4541 19.1951C12.1656 19.2839 12.7542 19.1077 12.854 18.395Z"
                                                    fill="#E8C842" />
                                            </svg>
                                            Hot deal
                                        </div>
                                        @if ($dateFlashsale)
                                        <div class="count-down">
                                            <div class="timer-view" data-countdown="countdown"
                                                data-date="{{ date('Y-m-d-H-i-s', strtotime($dateFlashsale)) }}"></div>
                                        </div>
                                        @endif
                                    </div>
                                    <script>
                                        (function($) {
                                            "user strict";
                                            $.fn.Dqdt_CountDown = function(options) {
                                                return this.each(function() {
                                                    new $.Dqdt_CountDown(this, options);
                                                });
                                            }
                                            $.Dqdt_CountDown = function(obj, options) {
                                                this.options = $.extend({
                                                    autoStart: true,
                                                    LeadingZero: true,
                                                    DisplayFormat: "<div><span>%%D%%</span> Days</div><div><span>%%H%%</span> Hours</div><div><span>%%M%%</span> Mins</div><div><span>%%S%%</span> Secs</div>",
                                                    FinishMessage: "Háº¿t háº¡n",
                                                    CountActive: true,
                                                    TargetDate: null
                                                }, options || {});
                                                if (this.options.TargetDate == null || this.options.TargetDate == '') {
                                                    return;
                                                }
                                                this.timer = null;
                                                this.element = obj;
                                                this.CountStepper = -1;
                                                this.CountStepper = Math.ceil(this.CountStepper);
                                                this.SetTimeOutPeriod = (Math.abs(this.CountStepper) - 1) * 1000 + 990;
                                                var dthen = new Date(this.options.TargetDate);
                                                var dnow = new Date();
                                                if (this.CountStepper > 0) {
                                                    ddiff = new Date(dnow - dthen);
                                                } else {
                                                    ddiff = new Date(dthen - dnow);
                                                }
                                                gsecs = Math.floor(ddiff.valueOf() / 1000);
                                                this.CountBack(gsecs, this);
                                            };
                                            $.Dqdt_CountDown.fn = $.Dqdt_CountDown.prototype;
                                            $.Dqdt_CountDown.fn.extend = $.Dqdt_CountDown.extend = $.extend;
                                            $.Dqdt_CountDown.fn.extend({
                                                calculateDate: function(secs, num1, num2) {
                                                    var s = ((Math.floor(secs / num1)) % num2).toString();
                                                    if (this.options.LeadingZero && s.length < 2) {
                                                        s = "0" + s;
                                                    }
                                                    return "<b>" + s + "</b>";
                                                },
                                                CountBack: function(secs, self) {
                                                    if (secs < 0) {
                                                        self.element.innerHTML = '<div class="lof-labelexpired"> ' + self.options
                                                            .FinishMessage + "</div>";
                                                        $('.block-flashsale').hide();
                                                        return;
                                                    }
                                                    clearInterval(self.timer);
                                                    DisplayStr = self.options.DisplayFormat.replace(/%%D%%/g, self.calculateDate(secs,
                                                        86400, 100000));
                                                    DisplayStr = DisplayStr.replace(/%%H%%/g, self.calculateDate(secs, 3600, 24));
                                                    DisplayStr = DisplayStr.replace(/%%M%%/g, self.calculateDate(secs, 60, 60));
                                                    DisplayStr = DisplayStr.replace(/%%S%%/g, self.calculateDate(secs, 1, 60));
                                                    self.element.innerHTML = DisplayStr;
                                                    if (self.options.CountActive) {
                                                        self.timer = null;
                                                        self.timer = setTimeout(function() {
                                                            self.CountBack((secs + self.CountStepper), self);
                                                        }, (self.SetTimeOutPeriod));
                                                    }
                                                }
                                            });
                                            $(document).ready(function() {
                                                $('[data-countdown="countdown"]').each(function(index, el) {
                                                    var $this = $(this);
                                                    var $date = $this.data('date').split("-");
                                                    $this.Dqdt_CountDown({
                                                        TargetDate: $date[0] + "/" + $date[1] + "/" + $date[2] + " " + $date[
                                                            3] + ":" + $date[4] + ":" + $date[5],
                                                        DisplayFormat: "<div class=\"block-timer\"><p>%%D%%</p><span>Ngày</span></div><div class=\"block-timer\"><p>%%H%%</p><span>Giờ</span></div><div class=\"block-timer\"><p>%%M%%</p><span>Phút</span></div><div class=\"block-timer\"><p>%%S%%</p><span>Giây</span></div>",
                                                        FinishMessage: "Chương trình đã hết hạn"
                                                    });
                                                });
                                            });
                                        })(jQuery);
                                    </script>
                                    @endif
                                    <div class="khuyen-mai">
                                        <div class="title">Thông tin sản phẩm</div>
                                        <div class="content">
                                            {!! $product->intro !!}
                                        </div>
                                    </div>
                                    <div class="form-product  ">
                                        <div class="box-variant clearfix  d-none ">
                                            <input type="hidden" id="one_variant" name="variantId" value="90023084" />
                                        </div>
                                        <div class="clearfix form-group ">
                                            <div class="flex-quantity">
                                                <div class="custom custom-btn-number show">
                                                    <label>Số lượng:</label>
                                                    <div class="input_number_product">
                                                        <button class="btn_num num_1 button button_qty"
                                                            onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                            type="button">&minus;</button>
                                                        <input type="text" id="qtym" name="quantity"
                                                            value="1" maxlength="3"
                                                            class="form-control prd_quantity"
                                                            onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                            onchange="if(this.value == 0)this.value=1;">
                                                        <button class="btn_num num_2 button button_qty"
                                                            onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                            type="button"><span>&plus;</span></button>
                                                    </div>
                                                </div>
                                                <div class="btn-mua button_actions clearfix">
                                                    <a href="javascript:void(0)" class="buynow" title=""
                                                        ng-click="addToCartCheckoutFromProductDetail()">
                                                        <span>MUA NGAY</span><span>Giao hàng tận nơi hoặc nhận tại cửa
                                                            hàng</span>
                                                    </a>
                                                    <button type="submit"
                                                        class="btn btn_base normal_button btn_add_cart add_to_cart btn-cart"
                                                        ng-click="addToCartFromProductDetail()">
                                                        <span class="txt-main text_1">Thêm vào giỏ hàng</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="details-pro-3 col-12 col-md-12 col-lg-3">
                        {{-- <fieldset class="pro-discount">
                            <legend>
                                <img alt="MÃ GIẢM GIÁ" width="32" height="32"
                                    src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/code_dis.gif?1740037266911">
                                MÃ GIẢM GIÁ
                            </legend>
                            <div class="item_discount">
                                <div class="top_discount">
                                    <div class="item-name">
                                        <p class="code_dis">50K</p>
                                        <span>Top Code</span>
                                    </div>
                                </div>
                                <div class="coupon_desc">Nhập mã BEA50 giảm ngay 50K</div>
                                <div class="copy_discount">
                                    <p class="code_zip">BEA50</p>
                                    <button class="btn dis_copy" data-copy="BEA50">
                                        <span>Copy</span>
                                    </button>
                                </div>
                            </div>
                            <div class="item_discount">
                                <div class="top_discount">
                                    <div class="item-name">
                                        <p class="code_dis">15%</p>
                                    </div>
                                </div>
                                <div class="coupon_desc">Nhập mã BEA15 giảm ngay 15%</div>
                                <div class="copy_discount">
                                    <p class="code_zip">BEA15</p>
                                    <button class="btn dis_copy" data-copy="BEA15">
                                        <span>Copy</span>
                                    </button>
                                </div>
                            </div>
                            <div class="item_discount">
                                <div class="top_discount">
                                    <div class="item-name">
                                        <p class="code_dis">99K</p>
                                    </div>
                                </div>
                                <div class="coupon_desc">Nhập mã BEAN99K giảm ngay 99K.</div>
                                <div class="copy_discount">
                                    <p class="code_zip">BEAN99K</p>
                                    <button class="btn dis_copy" data-copy="BEAN99K">
                                        <span>Copy</span>
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                        <script>
                            $(document).on('click', '.dis_copy', function(e) {
                                e.preventDefault();
                                var copyText = $(this).attr('data-copy');
                                var copyTextarea = document.createElement("textarea");
                                copyTextarea.textContent = copyText;
                                document.body.appendChild(copyTextarea);
                                copyTextarea.select();
                                document.execCommand("copy");
                                document.body.removeChild(copyTextarea);
                                var cur_text = $(this).text();
                                var $cur_btn = $(this);
                                $(this).addClass("disabled");
                                $(this).text("Copied!");
                                $(this).parent().addClass('active');
                                setTimeout(function() {
                                    $cur_btn.removeClass("disabled");
                                    $cur_btn.parent().removeClass('active');
                                    $cur_btn.text(cur_text);
                                }, 2500)
                            })
                        </script> --}}
                        <div class="product-policises-wrapper">
                            <ul class="product-policises">
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="/site/images/policy_image_1.png?1740037266911"
                                            alt="Miễn phí vận chuyển trong nội thành Hà Nội" />
                                    </div>
                                    <div class="content_poli">
                                        Miễn phí vận chuyển trong nội thành Hà Nội
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="/site/images/policy_image_2.png?1740037266911"
                                            alt="Bảo hành chính hãng toàn quốc" />
                                    </div>
                                    <div class="content_poli">
                                        Bảo hành chính hãng toàn quốc
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload"
                                            src="data:image/png;base64,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"
                                            data-src="/site/images/policy_image_3.png?1740037266911"
                                            alt="Cam kết chính hãng 100%" />
                                    </div>
                                    <div class="content_poli">
                                        Cam kết chính hãng 100%
                                    </div>
                                </li>
                                <li class="item_poli">
                                    <div class="img_poly">
                                        <img width="48" height="48" class="lazyload"
                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABJIAAACWBAMAAAB3Hb8pAAAAG1BMVEXMzMyWlpacnJyqqqrFxcWxsbGjo6O3t7e+vr6He3KoAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAGCElEQVR4nO3dy2/bNgDHcerhx9F0l3RHK03XHONtHXaUF7fbMc6Aoke7LZAe7axId4w7oPu3x5celunEQ2bEC78foJIcWoIK/EBSpCQLAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABAkEbSt1l59e7wx+0PUUrfZO/z+5wX/m8WsrHZkoVe8el0u0NM7G5Pi+0nuzlj7KehbGyuJmmmNw63O8SwSlLbbE13c8rYR6mUjc2VJLkP51sdYlYlyVZPBzs8ceyZpEpS4knSUvY//ZrJb7c6RJWkrpQvxldS3uzwzLFX0mGZpGIz/WxNdPdopluo9q3NW3WI7MDs+KnYY0bzForu77oaaW46w76pW3LTfOVbHELIb4q/Ls3mqPoDHrfEtEbNTaurm7TEXn8NN3eUavulposu7A6npoyOUiBuS1KswxDbHtJSDrY4RLf6VmZ6SF3Z/89PGXvptiRNdIs2suGIy2YqM5VNrbmr7dcpx51SF6Fsc6uIRyUdj8dF01Rt2s+mZVrYcCR2tNH8QWeqXTVbtf1aZRvYcYOSQznf6fljn9TiU09SYmqjiQ1Hq0xObDKylMeeQyRlborvT24fiMKjsiFJSxMLV6l0yomPrhkjmq3WNW6/try5zr7TJUUdtrhrngWPyIYkDU1PZ2bHFrvVgJIeI+o0etJuv1h+UV2m/lxnyg5lLhlQCog/SamtVbIiSWV0RiokcWPM2+0XyWKKJC6TNNjRWWP/+JNku0nFxVdaJSlR1dOiUdW4/UZukmVeXuuNSFJA/Eka2b6yLJJUn+adZ435NFe6lPJt+lWqFEVlknoCofAnaWIjVM6D1EueN288cqULeWKWT1SSbIIikhQQf5KyJyt/qZXEUjan01zpxFRVLVWPkaQQeZPUcZfx662bKlq7XcmV/vanWWVyTusWIm+S2i4C6z1uPQ7QnE1bvYdgIk/pcYfIm6SRuzpbHwXQHevmDP9qktSlP6MAIfImaeEGsddHJvW4d/O+t9UkqYqIkckQeZM0c5P4a7MlZr6kOS+7miTVzWa2JES+JKVFtbM2g2ufGhlsPIQwSWIGN0S+JBWXbkWl0i7vKtEt1rtmR2mtdSvqsBl3lQTEl6R2MWK0dqeb7oT/Lfu55xCtoxPzaSGn3OkWIl+Syqv39btvO6rhyxqNlt2vqMj0Td/cfRsgX5LKa67yiYCy56yztWwMcrunm1znSt/BVDwRwPPcAfElqewprz+lNFEhazcS4vazFVGiKyKeUgqQL0mzcrK/+eRkqmucbuPh2nLe7dgsD3hyMki+JFV1UPNp7sQXker+pLfjr2aMgKe5A+RJUm2arfmGiaUJ1ag2KlDtV7xQ4EbwhokQeZJUnxxpvPVm5rrSKxdlq2+YMPUXb70JjydJ9SHtZOVNXLYHbm6c9BzCfPcwN9tD3sSFVWezO98OWHr1rv/+xm6mP0neDggAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO4tcv+A+yFJ+Ddkf9M7WRtJ6qlPkZRS9IWIe8L+VvBZdinEa/lBRAMhst2eKfZbL/1hQ4knSWZ5eCOuXZLS5/lfajG+yKOPojPb/dlif/XEL+L7ZyLOO2qjdXQqooueXiVHE1UaXTwT7bkqqSXp6VRcuiQl53bROo2uRXvxkP8PPDSVpNaH1+fJfCT+EG/GL0X0wazejHUVE6mi7kC8FLUk9U66A5ekOLeLdBDFN1/oVAVNtW5xng66pxfzn8Wxqn2i3KyOxUiVRqpIXKp/+scQ9M8h6CRdt+cuSVGx6EWd6SVJCprqcZuqZnAyHei06GDoVa/oJ/XEl0T/vEZVJ8VXYr1OEi8GJCloPR0FXfFMP06F/o06lQe9qtVJ8YX7oktS60Cs95PE5JwkBU0lQveTxMX86lxc52c6LnpV9ZNE56n7okuS+WCWtWs3weBT4HQi1LWbWOajXHSyE50Hvaqu3URn4L5YT5JtAc9kMZ4kSBLu0p7f/R3gblcPfQJ4HKKThz4DAAAAAACwn/4ByLvPrpIItisAAAAASUVORK5CYII="
                                            data-src="/site/images/policy_image_4.png?1740037266911"
                                            alt="Hỗ trợ sửa chữa, bảo hành" />
                                    </div>
                                    <div class="content_poli">
                                        Hỗ trợ sửa chữa, bảo hành
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if (isset($product->body))
                        <div class="col-lg-12 col-col-md-12 col-sm-12 col-xs-12">
                            <div class="product-tab e-tabs not-dqtab">
                                <ul class="tabs tabs-title clearfix">
                                    <li class="tab-link active" data-tab="#tab-1">
                                        <h3>Mô tả chi tiết sản phẩm</h3>
                                    </li>
                                </ul>
                                <div class="tab-float">
                                    <div id="tab-1" class="tab-content active content_extab">
                                        <div class="rte product_getcontent">
                                            <div id="content">
                                                {!! $product->body !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="col-12 col-lg-4 col-col-md-4 col-sm-12 col-xs-12 product_info">
                        <div class="product-spec">
                            <div class="heading-title">Thông tin chi tiết</div>
                            <div class='product_getcontent'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Xuất xứ</td>
                                            <td>Thương hiệu: Nhật - Sản xuất tại: Việt Nam</td>
                                        </tr>
                                        <tr>
                                            <td>Loại Gas lạnh</td>
                                            <td>R32</td>
                                        </tr>
                                        <tr>
                                            <td>Loại máy</td>
                                            <td>Inverter - loại 1 chiều (chỉ làm lạnh)</td>
                                        </tr>
                                        <tr>
                                            <td>Công suất làm lạnh</td>
                                            <td>1.0 Hp (1.0 Ngựa) - 9,200 Btu/h -&nbsp;2.7 kW</td>
                                        </tr>
                                        <tr>
                                            <td>Sử dụng cho phòng</td>
                                            <td>Diện tích 12 - 15 m² hoặc 36 - 45 m³ khí (thích hợp cho phòng khách văn
                                                phòng)</td>
                                        </tr>
                                        <tr>
                                            <td>Nguồn điện (Ph/V/Hz)</td>
                                            <td>1 Pha 220 - 240 V 50Hz</td>
                                        </tr>
                                        <tr>
                                            <td>Công suất tiêu thụ điện</td>
                                            <td>0.995&nbsp;kW</td>
                                        </tr>
                                        <tr>
                                            <td>Kích thước ống đồng Gas (mm)</td>
                                            <td>6/10</td>
                                        </tr>
                                        <tr>
                                            <td>Chiều dài ống gas tối đa (m)</td>
                                            <td>15 m</td>
                                        </tr>
                                        <tr>
                                            <td>Chênh lệch độ cao (tối đa) (m)</td>
                                            <td>12 m</td>
                                        </tr>
                                        <tr>
                                            <td>Hiệu suất năng lượng CSPF</td>
                                            <td>5.21</td>
                                        </tr>
                                        <tr>
                                            <td>Nhãn năng lượng tiết kiệm điện</td>
                                            <td>5 sao</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="bea-pro__seemore text-center pos-relative mt-3 js-show-spec">
                                <a href="javascript:void(0)" title="Xem thêm"
                                    class="spec-toggle-btn btn btn-icon w-100 justify-content-center btn-secondary"
                                    data-toggle="modal" data-target="#spec-modal">Xem thông tin chi tiết <span
                                        class="carret"></span>
                                </a>
                            </div>
                            <div id="spec-modal" class="modalspec-product" style="display:none;">
                                <div class="modalcoupon-overlay fancybox-overlay fancybox-overlay-fixed"></div>
                                <div class="modal-coupon-product">
                                    <div class="chosee_size">
                                        <p class="title-size">Thông tin chi tiết</p>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>Xuất xứ</td>
                                                    <td>Thương hiệu: Nhật - Sản xuất tại: Việt Nam</td>
                                                </tr>
                                                <tr>
                                                    <td>Loại Gas lạnh</td>
                                                    <td>R32</td>
                                                </tr>
                                                <tr>
                                                    <td>Loại máy</td>
                                                    <td>Inverter - loại 1 chiều (chỉ làm lạnh)</td>
                                                </tr>
                                                <tr>
                                                    <td>Công suất làm lạnh</td>
                                                    <td>1.0 Hp (1.0 Ngựa) - 9,200 Btu/h -&nbsp;2.7 kW</td>
                                                </tr>
                                                <tr>
                                                    <td>Sử dụng cho phòng</td>
                                                    <td>Diện tích 12 - 15 m² hoặc 36 - 45 m³ khí (thích hợp cho phòng khách
                                                        văn phòng)</td>
                                                </tr>
                                                <tr>
                                                    <td>Nguồn điện (Ph/V/Hz)</td>
                                                    <td>1 Pha 220 - 240 V 50Hz</td>
                                                </tr>
                                                <tr>
                                                    <td>Công suất tiêu thụ điện</td>
                                                    <td>0.995&nbsp;kW</td>
                                                </tr>
                                                <tr>
                                                    <td>Kích thước ống đồng Gas (mm)</td>
                                                    <td>6/10</td>
                                                </tr>
                                                <tr>
                                                    <td>Chiều dài ống gas tối đa (m)</td>
                                                    <td>15 m</td>
                                                </tr>
                                                <tr>
                                                    <td>Chênh lệch độ cao (tối đa) (m)</td>
                                                    <td>12 m</td>
                                                </tr>
                                                <tr>
                                                    <td>Hiệu suất năng lượng CSPF</td>
                                                    <td>5.21</td>
                                                </tr>
                                                <tr>
                                                    <td>Nhãn năng lượng tiết kiệm điện</td>
                                                    <td>5 sao</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <a title="Close" class="modalcoupon-close close-window" href="javascript:;">
                                        <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="times"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            class="svg-inline--fa fa-times fa-w-10">
                                            <path fill="currentColor"
                                                d="M207.6 256l107.72-107.72c6.23-6.23 6.23-16.34 0-22.58l-25.03-25.03c-6.23-6.23-16.34-6.23-22.58 0L160 208.4 52.28 100.68c-6.23-6.23-16.34-6.23-22.58 0L4.68 125.7c-6.23 6.23-6.23 16.34 0 22.58L112.4 256 4.68 363.72c-6.23 6.23-6.23 16.34 0 22.58l25.03 25.03c6.23 6.23 16.34 6.23 22.58 0L160 303.6l107.72 107.72c6.23 6.23 16.34 6.23 22.58 0l25.03-25.03c6.23-6.23 6.23-16.34 0-22.58L207.6 256z"
                                                class=""></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <script>
                            let isloadIdex = 0;
                            $(window).on('scroll  mousemove touchstart', function() {
                                try {
                                    if (!isloadIdex) {
                                        isloadIdex = 1
                                        $(document).on('click',
                                            '.modalcoupon-close, #modal-spec-product .modalcoupon-overlay, .fancybox-overlay',
                                            function(e) {
                                                $("#spec-modal").fadeOut(0);
                                                awe_hidePopup();
                                            });
                                        $(document).ready(function($) {
                                            var modal = $('.modalspec-product');
                                            var btn = $('.spec-toggle-btn');
                                            var span = $('.modalspec-close');
                                            btn.click(function() {
                                                modal.show();
                                            });
                                            span.click(function() {
                                                modal.hide();
                                            });
                                            $(window).on('click', function(e) {
                                                if ($(e.target).is('.modal')) {
                                                    modal.hide();
                                                }
                                            });

                                        });
                                    }
                                } catch (e) {
                                    console.log(e);
                                }
                            });
                        </script>
                    </div> --}}
                    <div class="col-lg-12 col-col-md-12 col-sm-12 col-xs-12">
                        <div class="productRelate">
                            <div class="title_index">
                                <h2 class="h2_title">
                                    <a class="main-title" href="javascript:void(0)" title="Sản phẩm liên quan">Sản phẩm
                                        liên
                                        quan</a>
                                    <span class="hd-line"></span>
                                </h2>
                            </div>
                            <div class="product-relate-swiper swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($productsRelated as $relatedProduct)
                                        <div class="swiper-slide">
                                            <div class=" item_product_main">
                                                @include('site.products.product_item', ['product' => $relatedProduct])
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var variantsize = false;
        var ww = $(window).width();

        function validate(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        jQuery(function($) {

            // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

            // Hide selectors if we only have 1 variant and its title contains 'Default'.

            $('.selector-wrapper').hide();

            $('.selector-wrapper').css({
                'text-align': 'left',
                'margin-bottom': '15px'
            });
        });

        jQuery('.swatch :radio').change(function() {
            var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
            var optionValue = jQuery(this).val();
            jQuery(this)
                .closest('form')
                .find('.single-option-selector')
                .eq(optionIndex)
                .val(optionValue)
                .trigger('change');
            $(this).closest('.swatch').find('.header .value-roperties').html(optionValue);
        });
        setTimeout(function() {
            $('.swatch .swatch-element').each(function() {
                $(this).closest('.swatch').find('.header .value-roperties').html($(this).closest('.swatch')
                    .find('input:checked').val());
            });
        }, 500);
    </script>
    <script>
        $(document).ready(function() {
            function activeTab(obj) {
                $('.product-tab ul li').removeClass('active');
                $(obj).addClass('active');
                var id = $(obj).attr('data-tab');
                $('.tab-content').removeClass('active');
                $(id).addClass('active');
            }
            $('.product-tab ul li').click(function() {
                activeTab(this);
                return false;
            });
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween: 4,
                slidesPerView: 10,
                freeMode: true,
                lazy: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                hashNavigation: true,
                slideToClickedSlide: true,
                breakpoints: {
                    260: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    300: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    500: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },
                    640: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                    1199: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                },
                navigation: {
                    nextEl: '.gallery-thumbs .swiper-button-next',
                    prevEl: '.gallery-thumbs .swiper-button-prev',
                },
            });
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween: 0,
                lazy: true,
                hashNavigation: true,
                thumbs: {
                    swiper: galleryThumbs
                }
            });
            var swiperrela = new Swiper('.product-relate-swiper', {
                slidesPerView: 4,
                spaceBetween: 20,
                slidesPerGroup: 1,
                navigation: {
                    nextEl: '.product-relate-swiper .swiper-button-next',
                    prevEl: '.product-relate-swiper .swiper-button-prev',
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
                        slidesPerView: 3,
                        spaceBetween: 15
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 15
                    }
                }
            });
            // $(document).ready(function() {
            //     $("#lightgallery").lightGallery({
            //         thumbnail: false
            //     });
            // });
        });
    </script>
@endsection

@push('script')
    <script>
        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile, notiProduct) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values .badge').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('.details-product input[name="quantity"]').val();

                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                                notiProduct.product_id = response.noti_product.product_id;
                                notiProduct.product_name = response.noti_product.product_name;
                                notiProduct.product_image = response.noti_product.product_image;
                                notiProduct.product_price = response.noti_product.product_price;
                                notiProduct.product_qty = response.noti_product.product_qty;
                            }, 1000);
                            // toastr.success('Thao tác thành công !')
                            $scope.$applyAsync();

                            $('#popup-cart-mobile').addClass('active');
                            $('.backdrop__body-backdrop___1rvky').addClass('active');
                            $('#quick-view-product.quickview-product').hide();
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('.details-product input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            window.location.href = "{{ route('cart.checkout') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
