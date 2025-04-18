<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12 col-12 header-logo">
                <a href="{{ route('front.home-page') }}" class="logo-wrapper" title="{{ $config->web_title }}"><img
                        class="lazyload" width="430" height="131"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"
                        data-src="{{ $config->image ? $config->image->path : '' }}"
                        alt="{{ $config->web_title }}" /></a>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12">
                <button class="menu-icon" aria-label="Menu" id="btn-menu-mobile" title="Menu">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line y1="4.5" x2="24" y2="4.5" stroke="#fff"></line>
                        <line y1="11.5" x2="24" y2="11.5" stroke="#fff"></line>
                        <line y1="19.5" x2="24" y2="19.5" stroke="#fff"></line>
                    </svg>
                </button>
                <div class="list-top-item header_tim_kiem">
                    {{-- <div class="maps-header">
                        <a href="/he-thong-cua-hang" title="Hệ thống cửa hàng">
                            <small>Hệ thống cửa hàng
                                <b class="d-block">(8 chi nhánh)</b>
                            </small>
                        </a>
                    </div> --}}
                    <form action="{{ route('front.search') }}" method="get"
                        class="header-search-form input-group search-bar" role="search">
                        <div class="box-search">
                            <input type="text" name="keyword" required id="live-search"
                                class="input-group-field auto-search search-auto form-control"
                                placeholder="Bạn muốn tìm gì?" autocomplete="off">
                            <input type="hidden" name="type" value="product">
                            <button type="submit" class="btn icon-fallback-text" aria-label="Tìm kiếm"
                                title="Tìm kiếm">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.1404 13.4673L19.852 19.1789C20.3008 19.6276 19.6276 20.3008 19.1789 19.852L13.4673 14.1404C12.0381 15.4114 10.1552 16.1835 8.09176 16.1835C3.6225 16.1835 0 12.5613 0 8.09176C0 3.6225 3.62219 0 8.09176 0C12.561 0 16.1835 3.62219 16.1835 8.09176C16.1835 10.1551 15.4115 12.038 14.1404 13.4673ZM0.951972 8.09176C0.951972 12.0356 4.14824 15.2316 8.09176 15.2316C12.0356 15.2316 15.2316 12.0353 15.2316 8.09176C15.2316 4.14797 12.0353 0.951972 8.09176 0.951972C4.14797 0.951972 0.951972 4.14824 0.951972 8.09176Z"
                                        fill="#222"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="search-suggest live-search-results">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 box-right">
                <div class="box-icon-right">
                    <div class="box-phone">
                        <div class="icon_phone">
                            <img src="/site/images/hea_phone.png" alt="Hotline" />
                        </div>
                        <div class="content_phone">
                            <span>Hotline</span>
                            <a title="{{ $config->hotline }}"
                                href="tel:{{ str_replace(' ', '', $config->hotline) }}">{{ $config->hotline }}</a>
                        </div>
                    </div>
                    {{-- <a href="/account" title="Tài khoản" class="header-acc">
                        <img width="24" height="24"
                            src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/account.png?1740037266911"
                            alt="Tài khoản" />
                    </a> --}}
                    <div class="header-action_cart">
                        <a href="{{ route('cart.index') }}" class="cart-header" title="Giỏ hàng">
                            <img src="/site/images/icon-cart.png" alt="Giỏ hàng" />
                            <span class="count_item count_item_pr">
                                <% cart.count || 0 %>
                            </span>
                        </a>
                        <div class="top-cart-content">
                            <div class="CartHeaderContainer">
                                <form class="cart ajaxcart cartheader" ng-if="cart.count > 0">
                                    <div class="ajaxcart__inner ajaxcart__inner--has-fixed-footer cart_body items">
                                        <div class="ajaxcart__row" ng-repeat="item in cart.items">
                                            <div class="ajaxcart__product cart_product" data-line="1">
                                                <a ng-href="/san-pham/<% item.attributes.slug %>.html" class="ajaxcart__product-image cart_image" title="<% item.name %>">
                                                    <img width="80" height="80" ng-src="<% item.attributes.image %>" alt="<% item.name %>">
                                                </a>
                                                <div class="grid__item cart_info">
                                                    <div class="ajaxcart__product-name-wrapper cart_name">
                                                        <a ng-href="/san-pham/<% item.attributes.slug %>.html" class="ajaxcart__product-name h4" title="<% item.name %>"><% item.name %></a>
                                                        <div class="cart_attribute">
                                                            <div ng-repeat="attribute in item.attributes.attributes" style="line-height: 1;">
                                                                <span class="cart_attribute_name" style="margin-left: 8px; font-weight: 600; font-size: 14px;"><% attribute.name %> :</span>
                                                                <span class="cart_attribute_value" style="font-size: 14px;"><% attribute.value %></span>
                                                            </div>
                                                        </div>
                                                        <a title="Xóa" class="cart__btn-remove remove-item-cart ajaxifyCart--remove" href="javascript:;" data-line="1" ng-click='removeItem(item.id)'></a>
                                                    </div>
                                                    <div class="grid">
                                                    <div class="grid__item one-half cart_select cart_item_name">
                                                        <div class="ajaxcart__qty input-group-btn">
                                                            <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--minus items-count" data-id="" data-qty="1" data-line="1" aria-label="-" ng-click="decrementQuantity(item); changeQty(item.quantity, item.id)">
                                                            -
                                                            </button>
                                                            <input type="text" name="" class="ajaxcart__qty-num number-sidebar" maxlength="3" ng-model="item.quantity" value="<%item.quantity%>" min="0" data-id="" data-line="1" aria-label="quantity" pattern="[0-9]*" ng-change="changeQty(item.quantity, item.id)">
                                                            <button type="button" class="ajaxcart__qty-adjust ajaxcart__qty--plus items-count" data-id="" data-line="1" data-qty="3" aria-label="+" ng-click="incrementQuantity(item); changeQty(item.quantity, item.id)">
                                                            +
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="grid__item one-half text-right cart_prices">
                                                        <span class="cart-price"><% item.price | number %>₫</span>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ajaxcart__footer ajaxcart__footer--fixed cart-footer" ng-if="cart.count > 0">
                                        <div class="ajaxcart__subtotal">
                                            <div class="cart__subtotal">
                                                <div class="cart__col-6">Tổng tiền:</div>
                                                <div class="text-right cart__totle"><span class="total-price"><% cart.total | number %>₫</span></div>
                                            </div>
                                        </div>
                                        <div class="cart__btn-proceed-checkout-dt ">
                                            {{-- <button onclick="location.href='{{ route('cart.checkout') }}'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Thanh toán" style="margin-bottom: 10px;">Thanh toán</button> --}}
                                            <button onclick="location.href='{{ route('cart.index') }}'" type="button" class="button btn btn-default cart__btn-proceed-checkout" id="btn-proceed-checkout" title="Xem giỏ hàng">Xem giỏ hàng</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="cart--empty-message" ng-if="!cart.items || cart.count == 0">
                                    <img width="32" height="32" src="/site/images/no-cart.png" loading="lazy">
                                    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div class="container">
        <div class="box-catelory">
            <div class="row align-items-center">
                <div class="col-lg-10 header-mid">
                    <div class="navigation-horizontal">
                        <nav class="header-nav">
                            <ul id="nav" class="nav">
                                @foreach ($productCategories as $category)
                                    <li class="nav-item has-childs has-mega">
                                        <a href="{{ route('front.show-product-category', $category->slug) }}"
                                            class="nav-link" title="{{ $category->name }}">
                                            <i class="mask_icon"
                                                style="-webkit-mask-image: url('{{ $category->image ? url(str_replace('\\', '/', $category->image->path)) : '' }}')"></i>
                                            {{ $category->name }}
                                            @if ($category->childs->count() > 0)
                                                <img width="32" height="32" src="/site/images/down-arrow.png"
                                                    alt="icon" />
                                            @endif
                                        </a>
                                        @if ($category->childs->count() > 0)
                                            <i class="open_mnu down_icon"></i>
                                            <div class="mega-content">
                                                <div class="row">
                                                    <div class="mega-menu-list col-lg-9">
                                                        <ul class="level0">
                                                            @foreach ($category->childs as $child)
                                                                <li class="level1 parent item fix-navs">
                                                                    <a class="hmega"
                                                                        href="{{ route('front.show-product-category', $child->slug) }}"
                                                                        title="{{ $child->name }}">{{ $child->name }}</a>
                                                                    @if ($child->childs->count() > 0)
                                                                        <ul class="level1">
                                                                            @foreach ($child->childs as $child2)
                                                                                <li class="level2">
                                                                                    <a href="{{ route('front.show-product-category', $child2->slug) }}"
                                                                                        title="Daikin">Daikin</a>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-lg-3 mega-banner">
                                                        <a href="javascript:void(0);" title="Banner"
                                                            class="banner-effect">
                                                            <img width="451" height="500"
                                                                src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/mega-1-image-2.jpg?1740037266911"
                                                                data-src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/mega-1-image-2.jpg?1740037266911"
                                                                alt="Banner"
                                                                class="lazyload img-responsive mx-auto d-block loaded"
                                                                data-was-processed="true">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu mega-drop">
                                                @foreach ($category->childs as $child)
                                                <li class="dropdown-submenu nav-item-lv2 has-childs2">
                                                    <a class="nav-link" href="{{ route('front.show-product-category', $child->slug) }}" title="{{ $child->name }}">
                                                        {{ $child->name }}
                                                        <img width="32" height="32" src="//bizweb.dktcdn.net/100/488/001/themes/910675/assets/down-arrow.png?1740037266911" alt="icon"></a>
                                                    @if ($child->childs->count() > 0)
                                                        <i class="open_mnu down_icon"></i>
                                                    <ul class="dropdown-menu">
                                                        @foreach ($child->childs as $child2)
                                                        <li class="nav-item-lv3">
                                                            <a class="nav-link" href="{{ route('front.show-product-category', $child2->slug) }}" title="{{ $child2->name }}">{{ $child2->name }}</a>
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                                @foreach ($postCategories as $postCategory)
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.list-blog', $postCategory->slug) }}"
                                            title="{{ $postCategory->name }}">
                                            {{ $postCategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.contact-us') }}" title="Liên hệ">
                                        Liên hệ
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="control-menu">
                            <a href="#" id="prev">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
                                </svg>
                            </a>
                            <a href="#" id="next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="#fff"
                                        d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12 col-12 header-menu">
                    <div class="li-kmdiscount">
                        <a href="" class="item-link" title="Khuyến mãi">
                            <img width="32" height="32" alt="Khuyến mãi" src="/site/images/gift.gif">
                            Khuyến mãi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
