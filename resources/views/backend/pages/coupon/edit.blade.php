@extends('layouts.admin_layout')
@section('admin-content')

<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">Coupon Edit</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('coupon.index') }}">All
            Coupon</a>
    </div>
    <div class="card-body">
        <form action="{{ route('coupon.update',$data->id) }}" method="post">
            @csrf
            @method('PUT')
            <input value="{{ Auth::user()->id }}" class="form-control" type="hidden" name="coupon_editor">

            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Coupon Code: <span class="tx-danger">*</span></label>
                            <input value="{{ $data['coupon_code'] }}" class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" required>
                            @error('coupon_code')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">Coupon Amount: <span class="tx-danger">*</span></label>
                            <input value="{{ $data['coupon_amount'] }}" class="form-control" type="number" name="coupon_amount" placeholder="Coupon Amount">
                            @error('coupon_amount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Coupon Quantity: <span class="tx-danger">*</span></label>
                            <input value="{{ $data['coupon_quantity'] }}" type="number" class="form-control" name="coupon_quantity" placeholder="Coupon Amount">
                            @error('coupon_quantity')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Coupon Expire Date: <span class="tx-danger">*</span></label>
                            <input  value="{{ $data['coupon_exp_date'] }}" type="date" class="form-control" name="coupon_exp_date">
                            @error('coupon_exp_date')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div><!-- col-4 -->
                    </div>
                    <div class="form-layout-footer">
                        <button class="ml-3 btn btn-info">Update Coupon</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
    @endsection
