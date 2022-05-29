@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Vendor Show</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('vendor.index') }}">All Vendor</a>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Name: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_name'] }}" class="form-control" type="text" name="vendor_name" placeholder="Vendor Name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Email: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_email'] }}" class="form-control" type="text" name="vendor_email" placeholder="Email Address">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Phone: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_phone'] }}" class="form-control" type="text" name="vendor_phone" placeholder="Vendor Phone">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Operator Name: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_operator_name'] }}" class="form-control" type="text" name="vendor_operator_name" placeholder="Vendor Operator Name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Operator Phone: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_operator_phone'] }}" class="form-control" type="text" name="vendor_operator_phone" placeholder="Vendor Operator Phone">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Tin Number: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_tin'] }}" class="form-control" type="number" name="vendor_tin" placeholder="Vendor Tin Number">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Vendor Tread Number: <span class="tx-danger">*</span></label>
                            <input disabled value="{{ $data['vendor_tread_number'] }}" class="form-control" type="text" name="vendor_tread_number" placeholder="Vendor Tread Number">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force text-center">
                            <label class="form-control-label">Vendor Image: </label>
                            @if ($data->vendor_image)
                            <img class=" img-fluid rounded wd-80" src="{{ asset('backend/uploads/vendor/'.$data->vendor_image) }}"
                            alt="slider_image">
                            @else
                            <img class=" img-fluid rounded wd-80" src="{{ asset('backend/default/no-image-pro.png') }}"
                            alt="slider_image">
                            @endif
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Description: </label>
                            <textarea disabled class="form-control" name="vendor_description" id="">{{ $data['vendor_description'] }}</textarea>
                        </div>
                    </div><!-- col-8 -->
                    <div class="col-lg-12">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Office Address: <span class="tx-danger">*</span></label>
                            <textarea disabled class="form-control" name="vendor_office_address" id="">{{ $data['vendor_office_address'] }}</textarea>
                        </div>
                    </div><!-- col-8 -->
                </div>
            </div>
        </form>
    </div>
    @endsection
