@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Vendor Create</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('vendor.index') }}">All
            Vendor</a>
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

        <form action="{{ route('vendor.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_name') }}" class="form-control" type="text" name="vendor_name" placeholder="Vendor Name">
                            @error('vendor_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Email: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_email') }}" class="form-control" type="text" name="vendor_email" placeholder="Email Address">
                            @error('vendor_email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Phone: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_phone') }}" class="form-control" type="text" name="vendor_phone" placeholder="Vendor Phone">
                            @error('vendor_phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Operator Name: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_operator_name') }}" class="form-control" type="text" name="vendor_operator_name" placeholder="Vendor Operator Name">
                            @error('vendor_operator_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Operator Phone: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_operator_phone') }}" class="form-control" type="text" name="vendor_operator_phone" placeholder="Vendor Operator Phone">
                            @error('vendor_operator_phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Tin Number: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_tin') }}" class="form-control" type="number" name="vendor_tin" placeholder="Vendor Tin Number">
                            @error('vendor_tin')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Tread Number: <span class="tx-danger">*</span></label>
                            <input value="{{ old('vendor_tread_number') }}" class="form-control" type="text" name="vendor_tread_number" placeholder="Vendor Tread Number">
                            @error('vendor_tread_number')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Vendor Image: </label>
                            <input id="vendor_image_input" type="file" class="form-control" name="vendor_image">
                            @error('vendor_image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group mg-b-10-force text-center">
                            <img id="vendor_image_preview" class="img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                            alt="slider_image">
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: </label>
                            <textarea class="form-control" name="vendor_description" id=""></textarea>
                            @error('vendor_description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Office Address: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" name="vendor_office_address" id=""></textarea>
                            @error('vendor_office_address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-8 -->
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Create Vendor</button>
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
