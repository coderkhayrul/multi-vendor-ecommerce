<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="index.html"><img src="{{ asset('frontend') }}/imgs/theme/logo.svg" alt="logo"></a>
            </div>
            <div class="header-nav d-none d-lg-flex">
                <div class="main-categori-wrap d-none d-lg-block">
                    <a class="categories-button-active" href="#">
                        <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Categories
                        <i class="fi-rs-angle-down"></i>
                    </a>
                    <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                        <div class="d-flex categori-dropdown-inner">
                            <ul>
                                @php
                                $count = 1;
                                $categories = App\Models\Category::where('category_status', 1)->get();
                                @endphp
                                @foreach ( $categories as $category)
                                @if ($count <= 3) <li>
                                    <a href="shop-grid-right.html"> <img
                                            src="{{ asset('backend') }}/uploads/category/{{ $category->category_image}}"
                                            alt="">{{ $category->category_name }}</a>
                                    </li>
                                    @elseif ($count == 4)
                            </ul>
                            <ul class="end">
                                <li>
                                    <a href="shop-grid-right.html"> <img
                                            src="{{ asset('backend') }}/uploads/category/{{ $category->category_image}}"
                                            alt="">{{ $category->category_name }}</a>
                                </li>
                                @elseif ($count >=4)
                                <li>
                                    <a href="shop-grid-right.html"> <img
                                            src="{{ asset('backend') }}/uploads/category/{{ $category->category_image}}"
                                            alt="">{{ $category->category_name }}</a>
                                </li>
                                @endif
                                @php $count++; @endphp
                                @endforeach
                        </div>
                        <div class="more_slide_open" style="display: none">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('frontend') }}/imgs/theme/icons/icon-1.svg" alt="">Milks</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('frontend') }}/imgs/theme/icons/icon-2.svg"
                                                alt="">Clothing</a>
                                    </li>
                                </ul>

                                <ul class="end">
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('frontend') }}/imgs/theme/icons/icon-3.svg" alt="">Wines</a>
                                    </li>
                                    <li>
                                        <a href="shop-grid-right.html"> <img
                                                src="{{ asset('frontend') }}/imgs/theme/icons/icon-4.svg" alt="">Fresh</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show
                                more...</span></div>
                    </div>
                </div>
                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                    <nav>
                        <ul>
                            <li class="hot-deals"><img src="{{ asset('frontend') }}/imgs/theme/icons/icon-hot.svg"
                                    alt="hot deals"><a href="shop-grid-right.html">Deals</a></li>
                            <li>
                                <a class="{{ Route::currentRouteName() == 'frontend.home' ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a>
                            </li>
                            <li>
                                <a class="{{ Route::currentRouteName() == 'frontend.about_us' ? 'active' : '' }}" href="{{ route('frontend.about_us') }}">About</a>
                            </li>

                            <li>
                                <a href="shop-grid-right.html">Category <i class="fi-rs-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->category_name }}<i class="fi-rs-angle-right"></i></a>
                                        <ul class="level-menu">
                                            @php
                                                $subcategories = App\Models\SubCategory::where('category_id',$category->id)->get();
                                            @endphp
                                            @foreach ($subcategories as $subcategory)
                                            <li><a href="shop-product-right.html">{{ $subcategory->sub_category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="position-static">
                                <a href="#">Mega menu <i class="fi-rs-angle-down"></i></a>
                                <ul class="mega-menu">
                                    @php
                                        $threeCategory = App\Models\Category::where('category_status',1)->limit(3)->orderBy('id', 'asc')->get();
                                    @endphp
                                    @foreach ($threeCategory as $threecat)
                                    <li class="sub-mega-menu sub-mega-menu-width-22">
                                        <a class="menu-title" href="#">{{ $threecat->category_name }}</a>
                                        <ul>
                                            @php
                                                $threesubcategories = App\Models\SubCategory::where('category_id',$threecat->id)->orderBy('id', 'asc')->get();
                                            @endphp
                                            @foreach ($threesubcategories as $threesubcat)
                                            <li><a href="shop-product-right.html">{{ $threesubcat->sub_category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    <li class="sub-mega-menu sub-mega-menu-width-34">
                                        <div class="menu-banner-wrap">
                                            <a href="shop-product-right.html"><img
                                                    src="{{ asset('frontend') }}/imgs/banner/banner-menu.png"
                                                    alt="Nest"></a>
                                            <div class="menu-banner-content">
                                                <h4>Hot deals</h4>
                                                <h3>
                                                    Don't miss<br>
                                                    Trending
                                                </h3>
                                                <div class="menu-banner-price">
                                                    <span class="new-price text-success">Save to 50%</span>
                                                </div>
                                                <div class="menu-banner-btn">
                                                    <a href="shop-product-right.html">Shop now</a>
                                                </div>
                                            </div>
                                            <div class="menu-banner-discount">
                                                <h3>
                                                    <span>25%</span>
                                                    off
                                                </h3>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="blog-category-grid.html">Blog</a>
                            </li>
                            <li>
                                <a class="{{ Route::currentRouteName() == 'frontend.contact' ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a>
                            </li>
                            <li>
                                <a class="{{ Route::currentRouteName() == 'frontend.purchase_guide' ? 'active' : '' }}" href="{{ route('frontend.purchase_guide') }}">Purchase Guide</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="hotline d-none d-lg-flex">
                <img src="{{ asset('frontend') }}/imgs/theme/icons/icon-headphone.svg" alt="hotline">
                <p>1900 - 888<span>24/7 Support Center</span></p>
            </div>
            <div class="header-action-icon-2 d-block d-lg-none">
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.html">
                            <img alt="Nest" src="{{ asset('frontend') }}/imgs/theme/icons/icon-heart.svg">
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="#">
                            <img alt="Nest" src="{{ asset('frontend') }}/imgs/theme/icons/icon-cart.svg">
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest"
                                                src="{{ asset('frontend') }}/imgs/shop/thumbnail-3.jpg"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="shop-product-right.html"><img alt="Nest"
                                                src="{{ asset('frontend') }}/imgs/shop/thumbnail-4.jpg"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="shop-cart.html">View cart</a>
                                    <a href="shop-checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
