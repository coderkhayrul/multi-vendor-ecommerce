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
