<div class="header-top header-top-ptb-1 d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4">
                <div class="header-info">
                    <ul>
                        <li><a href="{{ route('frontend.about_us') }}">About Us</a></li>
                        <li>
                            @if (Auth::check())
                            <a href="{{ route('frontend.user.profie') }}">My Account</a>
                            @else
                            <a href="{{ route('frontend.user_login') }}">My Account</a>
                            @endif
                        </li>
                        <li><a href="#">Wishlist</a></li>
                        <li><a href="#">Order Tracking</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-6 col-lg-4">
                <div class="text-center">
                    <div id="news-flash" class="d-inline-block">
                        <ul>
                            <li>100% Secure delivery without contacting the courier</li>
                            <li>Supper Value Deals - Save more with coupons</li>
                            <li>Trendy 25silver jewelry, save up 35% off today</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="header-info header-info-right">
                    <ul>
                        <li>Need help? Call Us: <strong class="text-brand"> + 1800 900</strong></li>
                        <li>
                            <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                            <ul class="language-dropdown">
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-fr.png" alt="">Français</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-dt.png" alt="">Deutsch</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-ru.png" alt="">Pусский</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="language-dropdown-active" href="#">USD <i class="fi-rs-angle-small-down"></i></a>
                            <ul class="language-dropdown">
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-fr.png" alt="">INR</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-dt.png" alt="">MBP</a>
                                </li>
                                <li>
                                    <a href="#"><img src="{{ asset('frontend') }}/imgs/theme/flag-ru.png" alt="">EU</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
