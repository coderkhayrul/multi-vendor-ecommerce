@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Slider Create</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('slider.index') }}">All
            Slider</a>
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
        <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Slider Title: <span class="tx-danger">*</span></label>
                            <input value="{{ old('slider_title') }}" class="form-control" type="text" name="slider_title" placeholder="Slider Title">
                            @error('slider_title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Slider Link: <span class="tx-danger">*</span></label>
                            <input value="{{ old('slider_link') }}" class="form-control" type="text" name="slider_link" placeholder="Slider Link">
                            @error('slider_link')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Slider Image: <span class="tx-danger">*</span></label>
                            <input id="slider_image_input" type="file" class="form-control" name="slider_image">
                            @error('slider_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force text-center">
                            <img id="slider_image_preview" class=" img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                            alt="slider_image">
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="slider_description" id=""></textarea>
                            @error('slider_description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Create Slider</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
<!-- Custom Image Upload Preview -->
<script type="text/javascript">
    // Main Logo
    $('#slider_image_input').change(function(){
    let reader = new FileReader();
    reader.onload = (e) => {
        $('#slider_image_preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(this.files[0]);
    });
</script>
    @endsection
