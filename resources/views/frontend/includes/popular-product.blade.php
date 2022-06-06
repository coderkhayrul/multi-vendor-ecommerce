<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__ animate__fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
            <h3>Popular Products</h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @php
                    $categories = App\Models\Category::where('category_status', 1)->limit(6)->orderBy('category_name', 'ASC')->get();
                @endphp
                @foreach ($categories as $category)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-{{ $category->id }}" type="button" role="tab" aria-controls="tab-{{ $category->id }}" aria-selected="false">{{ $category->category_name }}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">

                    @php
                        $products = App\Models\Product::where('product_status', 1)->orderBy('product_name', 'ASC')->get();
                    @endphp
                    @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30 wow animate__ animate__fadeIn" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="">
                                        <img class="hover-img" src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="#"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal{{ $product->id }}"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $product->category->category_name }}</a>
                                </div>
                                <h2><a href="shop-product-right.html">{{ $product->product_name }}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product->vendor->vendor_name }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>${{ $product->product_discount_price }}</span>
                                        <span class="old-price">${{ $product->product_price }}</span>
                                    </div>
                                    <div class="add-cart">
                                            <a class="add" href="{{ route('frontend.addtocart',$product->product_slug) }}"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick view -->
                    <div class="modal fade custom-modal" id="quickViewModal{{ $product->id }}" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                            <div class="detail-gallery">
                                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                                <!-- MAIN SLIDES -->
                                                @php
                                                    $productgel = App\Models\ProductGallery::where('product_code', $product->product_code)->get();
                                                @endphp
                                                <div class="product-image-slider">
                                                    <figure class="border-radius-10">
                                                        <img src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="product image">
                                                    </figure>
                                                    @foreach ($productgel as $pg)
                                                    <figure class="border-radius-10">
                                                        <img src="{{ asset('backend/uploads/product/gallery/'.$pg->image) }}" alt="product image">
                                                    </figure>
                                                    @endforeach
                                                </div>
                                                <!-- THUMBNAILS -->
                                                <div class="slider-nav-thumbnails">
                                                    <div><img src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="product image"></div>

                                                    @foreach ($productgel as $pg)
                                                    <div><img src="{{ asset('backend/uploads/product/gallery/'.$pg->image) }}" alt="product image"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- End Gallery -->
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="detail-info pr-30 pl-30">
                                                <span class="stock-status out-stock"> Sale Off </span>
                                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">{{ $product->product_name }}</a></h3>
                                                <div class="product-detail-rating">
                                                    <div class="product-rate-cover text-end">
                                                        <div class="product-rate d-inline-block">
                                                            <div class="product-rating" style="width: 90%"></div>
                                                        </div>
                                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                    </div>
                                                </div>
                                                <div class="clearfix product-price-cover">
                                                    <div class="product-price primary-color float-left">
                                                        <span class="current-price text-brand">${{ $product->product_discount_price }}</span>
                                                        <span>
                                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                                            <span class="old-price font-md ml-15">${{ $product->product_price }}</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="detail-extralink mb-30">
                                                    <div class="detail-qty border radius">
                                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span class="qty-val">1</span>
                                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                    <div class="product-extra-link2">
                                                        <button type="submit" class="button button-add-to-cart"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                    </div>
                                                </div>
                                                <div class="font-xs">
                                                    <ul>
                                                        <li class="mb-5">Vendor: <span class="text-brand">{{ $product->vendor->vendor_name }}</span></li>
                                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Detail Info -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!--end product card-->
                </div>
                <!--End product-grid-4-->
            </div>
            <!--En tab one-->

            @foreach ($categories as $category)
            @php
                $products = App\Models\Product::where('category_id', $category->id)->get();
            @endphp
            <div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="shop-product-right.html">
                                        <img class="default-img" src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="">
                                        <img class="hover-img" src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Add To Wishlist" class="action-btn" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                    <a aria-label="Quick view" class="action-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $category->category_name }}</a>
                                </div>
                                <h2><a href="shop-product-right.html">{{$product->product_name}}</a></h2>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                                <div>
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product->vendor->vendor_name }}</a></span>
                                </div>
                                <div class="product-card-bottom">
                                    <div class="product-price">
                                        <span>$ {{$product->product_discount_price}}</span>
                                        <span class="old-price">$ {{ $product->product_price }}</span>
                                    </div>
                                    <div class="add-cart">
                                        <a class="add" href="shop-cart.html"><i class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
            @endforeach
        </div>
        <!--End tab-content-->
    </div>
</section>
