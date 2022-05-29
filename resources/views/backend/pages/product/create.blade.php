@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Product Create</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('product.index') }}">All
            Product</a>
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong class="d-block d-sm-inline-block-force">{{ Session::get('success') }}</strong>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong class="d-block d-sm-inline-block-force">{{ Session::get('error') }}</strong>
            </div>
        @endif

        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_id') }}" class="form-control" type="text" name="vendor_id" placeholder="Vendor Name">
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
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
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
                            <input value="{{ old('product_name') }}" class="form-control" type="text" name="product_name" placeholder="Product Name">
                            @error('product_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                            <input value="{{ old('product_code') }}" class="form-control" type="text" name="product_code" placeholder="Product Code">
                            @error('product_code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Product Price: <span class="tx-danger">*</span></label>
                            <input value="{{ old('product_price') }}" class="form-control" type="number" name="product_price" placeholder="Product Price">
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
                            <input value="{{ old('product_discount') }}" class="form-control" type="text" name="product_discount" placeholder="Product Discount">
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
                            <input value="{{ old('product_discount_price') }}" class="form-control" type="text" name="product_discount_price" placeholder="Product Discount Price">
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
                            <input value="{{ old('product_quantity') }}" class="form-control" type="number" name="product_quantity" placeholder="Product Quantity">
                            @error('product_quantity')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Vendor Image: </label>
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
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Short Description: </label>
                            <textarea class="form-control" name="product_short_des" id=""></textarea>
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
                            <textarea class="form-control" name="product_long_des" id=""></textarea>
                            @error('product_long_des')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Create Product</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
<!-- Custom Image Upload Preview -->
<script type="text/javascript">
    // Main Logo
    $('#vendor_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#vendor_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
@endsection

