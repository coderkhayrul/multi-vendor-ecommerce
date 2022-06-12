    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo"><a href=""><span>[</span>Khayrul <i>Shanto</i><span>]</span></a></div>

    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">
            <li class="br-menu-item">
                <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                    <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                    <span class="menu-item-label">Dashboard</span>
                </a>
                <!-- br-menu-link -->
            </li>
            <!-- br-menu-item -->
        <label class="sidebar-label pd-x-10 mg-t-25 mg-b-20 tx-light">Admin</label>
        <!-- Vendor Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/vendor*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Vendor</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('vendor.index') }}" class="sub-link {{ Route::currentRouteName() == 'vendor.index' ? 'active' : '' }}">All Vendor</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('vendor.create') }}" class="sub-link {{ Route::currentRouteName() == 'vendor.create' ? 'active' : '' }}">Add Vendor</a>
                </li>
            </ul>
        </li>
        <!-- Vendor Route End -->

        <!-- Category Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/category*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Category</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('category.index') }}" class="sub-link {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}">All Category</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('category.create') }}" class="sub-link {{ Route::currentRouteName() == 'category.create' ? 'active' : '' }}">Add Category</a>
                </li>
            </ul>
        </li>
        <!-- Category Route End -->
        <!-- Sub Category Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/sub-category*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Sub Category</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('sub-category.index') }}" class="sub-link {{ Route::currentRouteName() == 'sub-category.index' ? 'active' : '' }}">All Sub Category</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('sub-category.create') }}" class="sub-link {{ Route::currentRouteName() == 'sub-category.create' ? 'active' : '' }}">Add Sub Category</a>
                </li>
            </ul>
        </li>
        <!-- Sub Category Route End -->

        <!-- Slider Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/slider*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Slider</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('slider.index') }}" class="sub-link {{ Route::currentRouteName() == 'slider.index' ? 'active' : '' }}">All Slider</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('slider.create') }}" class="sub-link {{ Route::currentRouteName() == 'slider.create' ? 'active' : '' }}">Add Slider</a>
                </li>
            </ul>
        </li>
        <!-- Slider Route End -->
        <!-- Product Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/product*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Product</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('product.index') }}" class="sub-link {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}">All Product</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('product.create') }}" class="sub-link {{ Route::currentRouteName() == 'product.create' ? 'active' : '' }}">Add Product</a>
                </li>
            </ul>
        </li>
        <!-- Product Route End -->

        <!-- Coupon Route Start -->
        <li class="br-menu-item">
            <a href="#" class="br-menu-link with-sub {{ request()->is('admin/coupon*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-filing tx-20"></i>
                <span class="menu-item-label">Coupon</span>
            </a>
            <!-- br-menu-link -->
            <ul class="br-menu-sub">
                <li class="sub-item">
                    <a href="{{ route('coupon.index') }}" class="sub-link {{ Route::currentRouteName() == 'coupon.index' ? 'active' : '' }}">All Coupon</a>
                </li>
                <li class="sub-item">
                    <a href="{{ route('coupon.create') }}" class="sub-link {{ Route::currentRouteName() == 'coupon.create' ? 'active' : '' }}">Add Coupon</a>
                </li>
            </ul>
        </li>
        <!-- Coupon Route End -->

        <!-- Visite Website -->
        <li class="br-menu-item">
            <a href="{{ route('frontend.home') }}" class="br-menu-link" target="_blank">
                <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
                <span class="menu-item-label">Visite Website</span>
            </a>
            <!-- br-menu-link -->
        </li>
    </div>
    <!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
