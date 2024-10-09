<header class="position-relative">
    <div class="header-wrapper position-fixed">
        <div class="header-main nav-dark">
            <div class="header-inner flex-row container logo-left medium-logo-center h-100">
                <!-- Logo -->
                <div id="logo" class="flex-col logo">
                    <!-- Header logo -->
                    <a href="/" title="Vật Liệu Xây Dựng" rel="home">
                        <img width="88" height="88"
                            data-savepage-currentsrc="{{ asset('user/image/logo.png') }}"
                            data-savepage-src="{{ asset('user/image/logo.png') }}"
                            src="{{ asset('user/image/logo.png') }}" class="header-logo-dark" alt="Vật Liệu Xây Dựng"></a>
                </div>
                <!-- Mobile Left Elements -->
                <div class="flex-col show-for-medium flex-left">
                    <ul class="mobile-nav nav nav-left ">
                        <li class="nav-icon has-icon">
                            <a class="is-small text-decoration-none pointer">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Left Elements -->
                <div class="flex-col hide-for-medium flex-left flex-grow">
                    <ul class="header-nav header-nav-main nav nav-left nav-uppercase">
                        <li class="header-search-form search-form html relative has-icon">
                            <div class="header-search-form-wrapper">
                                <div class="searchform-wrapper ux-search-box relative form-flat is-normal">
                                    <form method="get" class="searchform" action="san-pham">
                                        <div class="flex-row relative">
                                            <div class="width-158px me-2">
                                                <select name="category-search" id="category-search">
                                                    <option value="0">Tất cả</option>
                                                    <option value="1">Xi măng</option>
                                                    <option value="2">Keo/Vữa</option>
                                                    <option value="3">Gạch đá ốp lát</option>
                                                    <option value="4">Vật liệu chống thấm</option>
                                                    <option value="5">Ngói lợp</option>
                                                </select>
                                            </div>
                                            <div class="flex-col flex-grow">
                                                <label class="screen-reader-text"
                                                    for="woocommerce-product-search-field-0">Tìm kiếm:</label>
                                                <input type="search" name="key-search"
                                                    id="woocommerce-product-search-field-0" class="search-field mb-0"
                                                    placeholder="Bạn muốn tìm gì?" value="" name="s"
                                                    autocomplete="off">
                                            </div>
                                            <div class="flex-col">
                                                <button type="submit" value="Tìm kiếm"
                                                    class="ux-search-submit submit-button secondary button icon mb-0"
                                                    aria-label="Submit" fdprocessedid="p8loyc">
                                                    <i class="icon-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Right Elements -->
                <div class="flex-col hide-for-medium flex-right">
                    <ul class="header-nav header-nav-main nav nav-right  nav-uppercase">
                        <li class="html custom html_topbar_left">
                            <span>
                                <a href="/gio-hang" class="text-white text-decoration-none" style="font-size:14px;">
                                    <i class="im-icon-cart"></i>
                                    Giỏ hàng
                                </a>                             
                            </span>
                            <span> | </span>
                            <i class="icon-clock" style="font-size:14px;"></i>
                            <span> 07:00 - 22:00 | </span>
                            <i class="icon-phone" style="font-size:14px;"></i>
                            <strong class="uppercase"> 099.9999.999</strong>
                        </li>
                    </ul>
                </div>
                <!-- Mobile Right Elements -->
                <div class="flex-col show-for-medium flex-right">
                    <ul class="mobile-nav nav nav-right ">

                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="top-divider full-width"></div>
            </div>
        </div>
        <div id="top-bar" class="header-top border-top bg-category-menu hide-for-sticky nav-dark hide-for-medium">
            <div class="container d-flex px-4">
                <nav class="site-nav">
                    <ul class="fw-bold">
                        <li @class(['active' => Request::path() == '/']) onclick="{window.location.href = '/'}">
                            <a class="text-decoration-none">Trang chủ</a>
                        </li>
                        <li @class([
                            'active' =>
                                Request::path() == 'san-pham' ||
                                Route::current()->getName() == 'user.product.category' ||
                                Route::current()->getName() == 'user.product.showing',
                        ]) onclick="{window.location.href = '/san-pham'}">
                            <a class="text-decoration-none">
                                Sản phẩm
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="header-bg-container fill">
            <div class="header-bg-image fill"></div>
            <div class="header-bg-color fill"></div>
        </div>
    </div>

    <div class="side-bar" style="display: none;">
        <div class="d-flex flex-column pt-3 side-bar-menu">
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/">
                <span class="d-flex justify-content-between">
                    Trang chủ
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham">
                <span class="d-flex justify-content-between">
                    Tất cả sản phẩm
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham/xi-mang">
                <span class="d-flex justify-content-between">
                    Xi măng
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham/keo-vua-xay-dung">
                <span class="d-flex justify-content-between">
                    Keo/Vữa xây dựng
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham/gach-da-op-lat">
                <span class="d-flex justify-content-between">
                    Gạch đá ốp lát
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham/vat-lieu-chong-tham">
                <span class="d-flex justify-content-between">
                    Vật liệu chống thấm
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/san-pham/ngoi-lop">
                <span class="d-flex justify-content-between">
                    Ngói lợp
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
            <div class="border"></div>
            <a class="px-3 py-2 text-white text-decoration-none h6 mb-0" href="/gio-hang">
                <span class="d-flex justify-content-between">
                    Giỏ hàng
                    <i class="fa-solid fa-chevron-right my-auto"></i>
                </span>
            </a>
        </div>
    </div>
</header>

<script>
    $(window).click((event) => {
        if ($(".side-bar").css("display") === 'none' || $(event.target.closest('.side-bar')).length > 0) {
            return
        }
        $(".side-bar").slideToggle()
    })
    $(".icon-menu").click((event) => {
        if (window.matchMedia('(min-width: 850px)').matches) {
            return
        }
        $(".side-bar").slideToggle(600, 'linear')
        event.stopPropagation()
    })
    $('#category-search').change((event) => {
        switch (parseInt($('#category-search').val())) {
            case 1:
                $('.searchform').attr('action', '/san-pham/xi-mang')
                break;
            case 2:
                $('.searchform').attr('action', '/san-pham/keo-vua-xay-dung')
                break;
            case 3:
                $('.searchform').attr('action', '/san-pham/gach-da-op-lat')
                break;
            case 4:
                $('.searchform').attr('action', '/san-pham/vat-lieu-chong-tham')
                break;
            case 5:
                $('.searchform').attr('action', '/san-pham/ngoi-lop')
                break;
            default:
                $('.searchform').attr('action', '/san-pham')
        }
    })
</script>
