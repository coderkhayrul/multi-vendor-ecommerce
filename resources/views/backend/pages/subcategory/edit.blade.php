@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Sub Category Edit</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('sub-category.index') }}">All
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
        <form action="{{ route('sub-category.update',$data->sub_category_slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Sub Category name: <span class="tx-danger">*</span></label>
                            <input value="{{ $data->sub_category_name }}" class="form-control" type="text" name="sub_category_name" placeholder="Sub Category Name">
                            @error('sub_category_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <!-- col-6 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="" disabled >Select Category</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $data->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-6 -->
                    <!-- col-6 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sub Category Image: <span class="tx-danger">*</span></label>
                            <input id="sub_category_image_input" type="file" class="form-control" name="sub_category_image">
                            @error('sub_category_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-6 -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force text-center">
                            @if ($data->sub_category_image)
                                <img id="sub_category_image_preview" class=" img-fluid rounded wd-100" src="{{ asset('backend/uploads/subcategory/'.$data->sub_category_image) }}"
                                alt="sub_category_image">
                            @else
                                <img id="sub_category_image_preview" class=" img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                                alt="sub_category_image">
                            @endif
                        </div><!-- col-6 -->
                    </div>
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Update Sub Category</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
<!-- Custom Image Upload Preview -->
<script type="text/javascript">
    // Main Logo
    $('#sub_category_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#sub_category_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
    @endsection
