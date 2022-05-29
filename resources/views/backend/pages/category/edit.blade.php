@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Category Edit</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('category.index') }}">All
            Category</a>
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
        <form action="{{ route('category.update',$data->category_slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Category name: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->category_name }}" class="form-control" type="text" name="category_name" placeholder="Category Name">
                            @error('category_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category Image: <span class="tx-danger">*</span></label>
                            <input id="category_image_input" type="file" class="form-control" name="category_image">
                            @error('category_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force text-center">
                            @if ($data->category_image)
                                <img class=" img-fluid rounded wd-100" src="{{ asset('backend/uploads/category/'.$data->category_image) }}"
                                alt="category_image">
                            @else
                                <img id="category_image_preview" class=" img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                                alt="category_image">
                            @endif
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="category_description" id="">{{ $data->category_description }}</textarea>
                            @error('category_description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Update Category</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
<!-- Custom Image Upload Preview -->
<script type="text/javascript">
    // Main Logo
    $('#category_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#category_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
    @endsection
