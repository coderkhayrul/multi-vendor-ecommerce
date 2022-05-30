@extends('layouts.admin_layout')
@section('admin-content')
<div class="card mb-3">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Edit Product</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('product.index') }}">All
            Product</a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 text-center">
                @if ($product->product_thumbnails)
                <img class="img-fluid img-thumbnail img-responsive wd-200"
                    src="{{ asset('backend/uploads/product/'.$product->product_thumbnails) }}" alt="product_image">
                @else
                <img class="img-fluid img-thumbnail img-responsive wd-200"
                    src="{{ asset('backend/default/no-image-pro.png') }}" alt="product_image">
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Vendor Name: <span class="tx-danger">*</span></label>
                                    <select name="vendor_id" class="form-control">
                                        <option label="Select Vendor"></option>
                                        @foreach ($vendors as $vendor)
                                        <option {{ $product->vendor_id == $vendor->id ? 'selected' : '' }} value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                        @endforeach
                                    </select>

                                    @error('vendor_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                                    <select id="category-dropdown" name="category_id" class="form-control select2-show-search">
                                        <option label="Select Category"></option>
                                        @foreach ($categories as $category)
                                        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Sub Category Name: <span class="tx-danger">*</span></label>
                                    <select id="sub_category-dropdown" name="sub_category_id" class="form-control select2-show-search">

                                    </select>
                                    @error('sub_category_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                                    <input value="{{ $product['product_name'] }}" class="form-control" type="text" name="product_name" placeholder="Product Name">
                                    @error('product_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                                    <input value="{{ $product['product_price'] }}" class="form-control" type="number" name="product_price" placeholder="Product Price">
                                    @error('product_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount: <span class="tx-danger">*</span></label>
                                    <input value="{{ $product['product_discount'] }}" class="form-control" type="number" name="product_discount" placeholder="Product Discount">
                                    @error('product_discount')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Product Discount Price: <span class="tx-danger">*</span></label>
                                    <input value="{{ $product['product_discount_price'] }}" class="form-control" type="number" name="product_discount_price" placeholder="Product Discount Price">
                                    @error('product_discount_price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                    <input value="{{ $product['product_quantity'] }}" class="form-control" type="number" name="product_quantity" placeholder="Product Quantity">
                                    @error('product_quantity')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Product Image: </label>
                                    <input id="product_image_input" type="file" class="form-control" name="product_thumbnails">
                                    @error('product_thumbnails')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div><!-- col-4 -->
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group mg-b-10-force text-center">
                                    <img id="product_image_preview" class="img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                                    alt="product_image">
                                </div><!-- col-4 -->
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Product Multi Image: </label>
                                    <input multiple type="file" class="form-control" name="image[]">
                                    @error('image')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div><!-- col-4 -->
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Short Description: </label>
                                    <textarea class="form-control" name="product_short_des" id="">{{ $product['product_short_des'] }}</textarea>
                                    @error('product_short_des')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-8 -->
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Login Description: <span class="tx-danger">*</span></label>
                                    <textarea class="form-control" name="product_long_des" id="">{{ $product['product_long_des'] }}</textarea>
                                    @error('product_long_des')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-8 -->
                            <div class="form-layout-footer">
                                <button class="ml-3 btn btn-info">Update Product</button>
                            </div> <!-- form-layout-footer -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- card-body -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="d-inline mb-0"> Product Gallery Image</strong>
            </div>
            <div class="card-body">
                <div class="row row-xs">
                    @forelse ($product_gallery as $gallery)
                    <div class="col-6 col-sm-4 col-md-3 mg-t-10 mg-b-10 mg-sm-t-0">
                        <figure class="overlay">
                            <img class="img-fluid img-thumbnail img-responsive wd-200"
                                src="{{ asset('backend/uploads/product/gallery/'.$gallery->image) }}" alt="product_image">
                            <figcaption class="overlay-body pd-l-25 pd-t-20">

                                <a href="{{ route('product.gallery.image',$gallery->id) }}">
                                    <div class="text-danger tx-20"><i class="icon ion-close"></i></div>
                                </a>
                            </figcaption>
                        </figure>
                    </div>
                    @empty
                    <h3>Gallery Image Not Found</h3>
                    @endforelse
                </div><!-- row -->
            </div>
        </div><!-- card -->
    </div><!-- col-lg-8 -->
</div><!-- row -->
</div>
@endsection
