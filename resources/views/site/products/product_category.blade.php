@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
    <link href="/site/css/breadcrumb_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/sidebar_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
    <link href="/site/css/collection_style.scss.css?1740037266911" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
    <div class="layout-collection">
        <section class="bread-crumb">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="home">
                        <a href="{{ route('front.home-page') }}" title="Trang chủ"><span>Trang chủ</span></a>
                        <span class="mr_lr">
                            &nbsp;
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                class="svg-inline--fa fa-chevron-right fa-w-10">
                                <path fill="currentColor"
                                    d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"
                                    class=""></path>
                            </svg>
                            &nbsp;
                        </span>
                    </li>
                    <li><strong><span>{{ $title }}</span></strong></li>
                </ul>
            </div>
        </section>
        <div class="container">
            <div class="section_3_banner">
                <div class="row">
                    @foreach ($smallBanners as $smallBanner)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <a class="three_banner" href="/collections/all" title="Banner">
                            <img width="390" height="120" class="lazyload"
                                src="data:image/png;base64,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"
                                data-src="{{$smallBanner->image ? $smallBanner->image->path : ''}}"
                                alt="Banner" />
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="block-collection col-xl-12 col-lg-12 col-12">
                    <div class="box-round">
                        <div class="title_cus">Đối tác liên kết</div>
                        <div class="box-height-col">
                            <div class="box-cate-col">
                                @foreach ($partners as $item)
                                    <a href="{{$item->link}}" class="cate-link" title="{{$item->name}}">
                                        <div class="item_cate">
                                            <div class="img_cate">
                                                <img width="250" height="54" class="lazyload"
                                                    src="data:image/png;base64,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"
                                                    data-src="{{$item->image ? $item->image->path : ''}}"
                                                    alt="{{$item->name}}" />
                                            </div>
                                            <span>{{$item->name}}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="control-menu">
                                <a href="#" id="prevcol">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="#fff"
                                            d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                    </svg>
                                </a>
                                <a href="#" id="nextcol">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="#fff"
                                            d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="section-box-bg">
                        <div class="evo-sidebar-collection">
                            <div id="open-fil" class="open-fil">
                                <img class="icon_des"
                                    src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/ico-select.png?1740037266911"
                                    alt="Lọc" />
                                <div class="box-mob">
                                    <span class="icon_col"></span>
                                    <span>Lọc</span>
                                </div>
                            </div>
                            <label class="line-boz"></label>
                            {{-- <div class="aside-filter clearfix">
                                <div class="aside-hidden-mobile">
                                    <div class="filter-content">
                                        <div class="filter-container">
                                            <div class="filter-container__selected-filter" style="display: none;">
                                                <div class="filter-container__selected-filter-list">
                                                    <ul></ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-container">
                                            <aside class="aside-item filter-vendor">
                                                <div class="aside-title">
                                                    <h2 class="title-head margin-top-0">
                                                        <span>
                                                            Thương hiệu
                                                            <svg class="svg-arro" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 490.656 490.656"
                                                                style="enable-background:new 0 0 490.656 490.656;"
                                                                xml:space="preserve" width="25px" height="25px">
                                                                <path
                                                                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0 c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667 C491.696,131.368,491.696,124.605,487.536,120.445z"
                                                                    data-original="#000000" class="active-path"
                                                                    data-old_color="#000000" fill="#141414"></path>
                                                            </svg>
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="aside-content filter-group aside-thuong-hieu">
                                                    <ul>
                                                        <li
                                                            class="filter-item filter-item--check-box filter-item--green vendorxxx">
                                                            <label class="custom-checkbox" for="filter-daikin">
                                                                <input type="checkbox" id="filter-daikin"
                                                                    data-group="PRODUCT_VENDOR"
                                                                    data-field="vendor.filter_key" data-text=""
                                                                    value="(Daikin)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                <span class="textfont">Daikin</span>
                                                                <span class="vendoritem"
                                                                    style="background-image: url('//bizweb.dktcdn.net/thumb/thumb/100/488/001/themes/910675/assets/thuonghieu_1.jpg?1740037266911')"></span>
                                                            </label>
                                                        </li>
                                                        <li
                                                            class="filter-item filter-item--check-box filter-item--green vendorxxx">
                                                            <label class="custom-checkbox"
                                                                for="filter-mitsubishi-electric">
                                                                <input type="checkbox" id="filter-mitsubishi-electric"
                                                                    data-group="PRODUCT_VENDOR"
                                                                    data-field="vendor.filter_key" data-text=""
                                                                    value="(Mitsubishi Electric)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                <span class="textfont">Mitsubishi Electric</span>
                                                                <span class="vendoritem"
                                                                    style="background-image: url('//bizweb.dktcdn.net/thumb/thumb/100/488/001/themes/910675/assets/thuonghieu_7.jpg?1740037266911')"></span>
                                                            </label>
                                                        </li>
                                                        <li
                                                            class="filter-item filter-item--check-box filter-item--green vendorxxx">
                                                            <label class="custom-checkbox" for="filter-mitsubishi-heavy">
                                                                <input type="checkbox" id="filter-mitsubishi-heavy"
                                                                    data-group="PRODUCT_VENDOR"
                                                                    data-field="vendor.filter_key" data-text=""
                                                                    value="(Mitsubishi Heavy)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                <span class="textfont">Mitsubishi Heavy</span>
                                                                <span class="vendoritem"
                                                                    style="background-image: url('//bizweb.dktcdn.net/thumb/thumb/100/488/001/themes/910675/assets/thuonghieu_5.jpg?1740037266911')"></span>
                                                            </label>
                                                        </li>
                                                        <li
                                                            class="filter-item filter-item--check-box filter-item--green vendorxxx">
                                                            <label class="custom-checkbox" for="filter-panasonic">
                                                                <input type="checkbox" id="filter-panasonic"
                                                                    data-group="PRODUCT_VENDOR"
                                                                    data-field="vendor.filter_key" data-text=""
                                                                    value="(Panasonic)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                <span class="textfont">Panasonic</span>
                                                                <span class="vendoritem"
                                                                    style="background-image: url('//bizweb.dktcdn.net/thumb/thumb/100/488/001/themes/910675/assets/thuonghieu_2.jpg?1740037266911')"></span>
                                                            </label>
                                                        </li>
                                                        <li
                                                            class="filter-item filter-item--check-box filter-item--green vendorxxx">
                                                            <label class="custom-checkbox" for="filter-toshiba">
                                                                <input type="checkbox" id="filter-toshiba"
                                                                    data-group="PRODUCT_VENDOR"
                                                                    data-field="vendor.filter_key" data-text=""
                                                                    value="(Toshiba)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                <span class="textfont">Toshiba</span>
                                                                <span class="vendoritem"
                                                                    style="background-image: url('//bizweb.dktcdn.net/thumb/thumb/100/488/001/themes/910675/assets/thuonghieu_3.jpg?1740037266911')"></span>
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                            <aside class="aside-item aside-itemxx filter-type">
                                                <div class="aside-title">
                                                    <h2 class="title-head margin-top-0">
                                                        <span>
                                                            Loại sản phẩm
                                                            <svg class="svg-arro" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 490.656 490.656"
                                                                style="enable-background:new 0 0 490.656 490.656;"
                                                                xml:space="preserve" width="25px" height="25px">
                                                                <path
                                                                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0 c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667 C491.696,131.368,491.696,124.605,487.536,120.445z"
                                                                    data-original="#000000" class="active-path"
                                                                    data-old_color="#000000" fill="#141414"></path>
                                                            </svg>
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="aside-content filter-group">
                                                    <ul>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" for="filter-dieu-hoa-2-chieu">
                                                                <input type="checkbox" id="filter-dieu-hoa-2-chieu"
                                                                    data-group="PRODUCT_TYPE"
                                                                    data-field="product_type.filter_key" data-text=""
                                                                    value="(&#34;Điều hòa 2 chiều&#34;)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Điều hòa 2 chiều
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" for="filter-may-lanh-am-tran">
                                                                <input type="checkbox" id="filter-may-lanh-am-tran"
                                                                    data-group="PRODUCT_TYPE"
                                                                    data-field="product_type.filter_key" data-text=""
                                                                    value="(&#34;Máy lạnh âm trần&#34;)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Máy lạnh âm trần
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox"
                                                                for="filter-may-lanh-treo-tuong">
                                                                <input type="checkbox" id="filter-may-lanh-treo-tuong"
                                                                    data-group="PRODUCT_TYPE"
                                                                    data-field="product_type.filter_key" data-text=""
                                                                    value="(&#34;Máy lạnh treo tường&#34;)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Máy lạnh treo tường
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" for="filter-may-lanh-tu-dung">
                                                                <input type="checkbox" id="filter-may-lanh-tu-dung"
                                                                    data-group="PRODUCT_TYPE"
                                                                    data-field="product_type.filter_key" data-text=""
                                                                    value="(&#34;Máy lạnh tủ đứng&#34;)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Máy lạnh tủ đứng
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                            <aside class="aside-item filter-price">
                                                <div class="aside-title">
                                                    <h2 class="title-head margin-top-0">
                                                        <span>
                                                            Chọn mức giá
                                                            <svg class="svg-arro" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 490.656 490.656"
                                                                style="enable-background:new 0 0 490.656 490.656;"
                                                                xml:space="preserve" width="25px" height="25px">
                                                                <path
                                                                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0 c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667 C491.696,131.368,491.696,124.605,487.536,120.445z"
                                                                    data-original="#000000" class="active-path"
                                                                    data-old_color="#000000" fill="#141414"></path>
                                                            </svg>
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="aside-content filter-group content_price aside-content">
                                                    <ul>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" data-filter="2-000-000d"
                                                                for="filter-duoi-2-000-000d">
                                                                <input type="checkbox" id="filter-duoi-2-000-000d"
                                                                    data-group="Khoảng giá" data-field="price_min"
                                                                    data-text="Dưới 2.000.000đ" value="(<2000000)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Dưới 2 triệu
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" data-filter="4-000-000d"
                                                                for="filter-2-000-000d-4-000-000d">
                                                                <input type="checkbox" id="filter-2-000-000d-4-000-000d"
                                                                    data-group="Khoảng giá" data-field="price_min"
                                                                    data-text="2.000.000đ - 4.000.000đ"
                                                                    value="(>=2000000 AND <=4000000)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                Từ 2 triệu - 4 triệu
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" data-filter="7-000-000d"
                                                                for="filter-4-000-000d-7-000-000d">
                                                                <input type="checkbox" id="filter-4-000-000d-7-000-000d"
                                                                    data-group="Khoảng giá" data-field="price_min"
                                                                    data-text="4.000.000đ - 7.000.000đ"
                                                                    value="(>=4000000 AND <=7000000)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                Từ 4 triệu - 7 triệu
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" data-filter="13-000-000d"
                                                                for="filter-7-000-000d-13-000-000d">
                                                                <input type="checkbox" id="filter-7-000-000d-13-000-000d"
                                                                    data-group="Khoảng giá" data-field="price_min"
                                                                    data-text="7.000.000đ - 13.000.000đ"
                                                                    value="(>=7000000 AND <=13000000)" data-operator="OR">
                                                                <i class="fa"></i>
                                                                Từ 7 triệu - 13 triệu
                                                            </label>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <label class="custom-checkbox" data-filter="13-000-000d"
                                                                for="filter-tren13-000-000d">
                                                                <input type="checkbox" id="filter-tren13-000-000d"
                                                                    data-group="Khoảng giá" data-field="price_min"
                                                                    data-text="Trên 13.000.000đ" value="(>13000000)"
                                                                    data-operator="OR">
                                                                <i class="fa"></i>
                                                                Trên 13 triệu
                                                            </label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                            <aside class="aside-item filter-tag filter-tag-style-1 last-filter">
                                                <div class="aside-title">
                                                    <h2 class="title-head margin-top-0">
                                                        <span>
                                                            Công nghệ Inverter
                                                            <svg class="svg-arro" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 490.656 490.656"
                                                                style="enable-background:new 0 0 490.656 490.656;"
                                                                xml:space="preserve" width="25px" height="25px">
                                                                <path
                                                                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0 c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667 C491.696,131.368,491.696,124.605,487.536,120.445z"
                                                                    data-original="#000000" class="active-path"
                                                                    data-old_color="#000000" fill="#141414"></path>
                                                            </svg>
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="aside-content filter-group">
                                                    <ul>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-co-inverter">
                                                                    <input type="checkbox" id="filter-co-inverter"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="Có Inverter" value="(Có Inverter)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    Có Inverter
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox"
                                                                    for="filter-khong-inverter">
                                                                    <input type="checkbox" id="filter-khong-inverter"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="Không Inverter"
                                                                        value="(Không Inverter)" data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    Không Inverter
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-inverter-nbsp">
                                                                    <input type="checkbox" id="filter-inverter-nbsp"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="Inverter&nbsp" value="(Inverter&nbsp)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    Inverter&nbsp
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-1-chieu">
                                                                    <input type="checkbox" id="filter-1-chieu"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="1 chiều" value="(1 chiều)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    1 chiều
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox"
                                                                    for="filter-inverter-2-chieu">
                                                                    <input type="checkbox" id="filter-inverter-2-chieu"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="Inverter 2 chiều"
                                                                        value="(Inverter 2 chiều)" data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    Inverter 2 chiều
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-mono-1-chieu">
                                                                    <input type="checkbox" id="filter-mono-1-chieu"
                                                                        data-group="tag21" data-field="tags"
                                                                        data-text="Mono 1 chiều" value="(Mono 1 chiều)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    Mono 1 chiều
                                                                </label>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                            <aside class="aside-item filter-tag filter-tag-style-2 last-filter">
                                                <div class="aside-title">
                                                    <h2 class="title-head margin-top-0">
                                                        <span>
                                                            Công suất làm lạnh
                                                            <svg class="svg-arro" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                                viewBox="0 0 490.656 490.656"
                                                                style="enable-background:new 0 0 490.656 490.656;"
                                                                xml:space="preserve" width="25px" height="25px">
                                                                <path
                                                                    d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0 c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667 C491.696,131.368,491.696,124.605,487.536,120.445z"
                                                                    data-original="#000000" class="active-path"
                                                                    data-old_color="#000000" fill="#141414"></path>
                                                            </svg>
                                                        </span>
                                                    </h2>
                                                </div>
                                                <div class="aside-content filter-group">
                                                    <ul>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-1-0-hp">
                                                                    <input type="checkbox" id="filter-1-0-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="1.0 HP" value="(1.0 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    1.0 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-1-5-hp">
                                                                    <input type="checkbox" id="filter-1-5-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="1.5 HP" value="(1.5 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    1.5 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-2-hp">
                                                                    <input type="checkbox" id="filter-2-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="2 HP" value="(2 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    2 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-2-5-hp">
                                                                    <input type="checkbox" id="filter-2-5-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="2.5 HP" value="(2.5 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    2.5 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-3-hp">
                                                                    <input type="checkbox" id="filter-3-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="3 HP" value="(3 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    3 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-3-5-hp-4-hp">
                                                                    <input type="checkbox" id="filter-3-5-hp-4-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="3.5 HP - 4 HP" value="(3.5 HP - 4 HP)"
                                                                        data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    3.5 HP - 4 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                        <li class="filter-item filter-item--check-box filter-item--green">
                                                            <span>
                                                                <label class="custom-checkbox" for="filter-4-5-hp-6-0-hp">
                                                                    <input type="checkbox" id="filter-4-5-hp-6-0-hp"
                                                                        data-group="tag22" data-field="tags"
                                                                        data-text="4.5 HP - 6.0 HP"
                                                                        value="(4.5 HP - 6.0 HP)" data-operator="OR">
                                                                    <i class="fa"></i>
                                                                    4.5 HP - 6.0 HP
                                                                </label>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="evo-sort-category">
                                <div id="sort-by">
                                    <label class="left"><img width="16" height="16" alt="Sắp xếp"
                                            src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/sort.png?1740037266911" />Sắp
                                        xếp: </label>
                                    <ul id="sortBy">
                                        <li>
                                            <span>Mặc định</span>
                                            <ul>
                                                <li><a href="javascript:;" onclick="sortby('default')"
                                                        title="Mặc định">Mặc định</a></li>
                                                <li><a href="javascript:;" onclick="sortby('alpha-asc')"
                                                        title="A &rarr; Z">A &rarr; Z</a></li>
                                                <li><a href="javascript:;" onclick="sortby('alpha-desc')"
                                                        title="Z &rarr; A">Z &rarr; A</a></li>
                                                <li><a href="javascript:;" onclick="sortby('price-asc')"
                                                        title="Giá tăng dần">Giá tăng dần</a></li>
                                                <li><a href="javascript:;" onclick="sortby('price-desc')"
                                                        title="Giá giảm dần">Giá giảm dần</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h1 class="title-page d-md-block">{{$title}}</h1>
                        <div class="category-products">
                            <div class="products-view products-view-grid list_hover_pro">
                                <div class="row">
                                    @foreach ($products as $item)
                                    <div class="col-6 col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                                        <div class="item_product_main">
                                            @include('site.products.product_item', ['product' => $item])
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="pagenav">
                                <nav class="collection-paginate clearfix relative nav_pagi w_100">
                                    {{$products->links()}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="opacity_sidebar"></div>
    <script>
        function horizontalCate() {
            return {
                wrappercol: $('.box-height-col'),
                navigationcol: $('.box-height-col .box-cate-col'),
                itemcol: $('.box-height-col .box-cate-col .cate-link'),
                totalStepCol: 0,
                onCalcColOverView: function() {
                    let itemHeightCol = this.itemcol.eq(0).outerWidth(),
                        lilengthcol = this.itemcol.length,
                        totalcol = 0;
                    for (var i = 0; i < lilengthcol; i++) {
                        itemHeightCol = this.itemcol.eq(i).outerWidth();
                        totalcol += itemHeightCol;
                    }
                    return Math.ceil(totalcol)
                },
                onCalcTotalCol: function() {
                    let navHeightCol = this.navigationcol.width();
                    return Math.ceil(navHeightCol)
                },
                init: function() {
                    this.totalStepCol = this.onCalcColOverView();
                    this.totalToCol = this.onCalcTotalCol();
                    if (this.totalStepCol > this.totalToCol) {
                        this.wrappercol.addClass('overflow')
                    }
                }
            }
        }
        $(document).ready(function($) {
            horizontalCate().init()
            $(window).on('resize', () => horizontalCate().init())
            var margin_left_col = 0;
            $('#prevcol').on('click', function(e) {
                e.preventDefault();
                animateMargincol(190);
            });
            $('#nextcol').on('click', function(e) {
                e.preventDefault();
                animateMargincol(-190);

            });
            const animateMargincol = (amount) => {
                margin_left_col = Math.min(0, Math.max(getMaxMargincol(), margin_left_col + amount));
                $('.box-cate-col').animate({
                    'margin-left': margin_left_col
                }, 300);
            };
            const getMaxMargincol = () =>
                $('.box-cate-col').parent().width() - $('.box-cate-col')[0].scrollWidth;
        });
    </script>
@endsection

@push('script')
@endpush
