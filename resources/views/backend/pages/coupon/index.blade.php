@extends('layouts.admin_layout')
@section('admin-content')

{{-- NOTIFICATION START --}}
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
{{-- NOTIFICATION END --}}


<div class="card">
    <div class="card-header">
        <p style="float:left" class="d-inline mb-0">All Coupon</p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-9">
                <table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed">
                    <thead>
                        <tr>
                            <th>Coupon</th>
                            <th>Amount</th>
                            <th>Qty</th>
                            <th>Exp Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-alian-center">
                        @foreach ($coupons as $data)
                        <tr>
                            <td width="10%">{{ $data['coupon_code'] }}</td>
                            <td width="10%">{{ $data['coupon_amount'] }}</td>
                            <td width="10%">{{ $data['coupon_quantity'] }}</td>
                            <td width="10%">
                                @if ($data['coupon_exp_date'])
                                <span class="badge badge-success">{{  date('d-M-Y', strtotime($data->coupon_exp_date)) }}</span>

                                @else
                                <span class="badge badge-danger">Coupon Expire</span>
                                @endif
                            </td>
                            <td width="20%" class="text-center">
                                <div class="dropdown">
                                    <a href="" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                                        <div class="ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                                            <span class="mg-r-10 tx-13 tx-medium">Manage</span>
                                            <i class="fa fa-angle-down mg-l-10"></i>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu pd-10 wd-200">
                                        <nav class="nav nav-style-2 flex-column">
                                            <a href="{{ route('coupon.edit',$data->id) }}" class="nav-link"><i class="icon ion-compose"></i> Edit</a>
                                            <a class="nav-link" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="icon ion-trash-b"></i> Delete</a>
                                        </nav>
                                    </div>
                                    <!-- dropdown-menu -->
                                </div>
                                <!-- dropdown -->
                            </td>
                        </tr>
                        <!-- Delete Modal -->
                        <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="CouponDelete"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="CouponDelete">Delete Coupon?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure Went To Delete This Coupon !
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{ route('coupon.destroy',$data->id) }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-3">
                <form action="{{ route('coupon.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout form-layout-1">
                        <div class="row mg-b-25">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Code: <span class="tx-danger">*</span></label>
                                    <input value="{{ old('coupon_code') }}" class="form-control" type="text" name="coupon_code" placeholder="Coupon Code" required>
                                    @error('coupon_code')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Coupon Amount: <span class="tx-danger">*</span></label>
                                    <input value="{{ old('coupon_amount') }}" class="form-control" type="number" name="coupon_amount" placeholder="Coupon Amount">
                                    @error('coupon_amount')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Coupon Quantity: <span class="tx-danger">*</span></label>
                                    <input value="{{ old('coupon_quantity') }}" type="number" class="form-control" name="coupon_quantity" placeholder="Coupon Quantity">
                                    @error('coupon_quantity')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div><!-- col-4 -->
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Coupon Expire Date: <span class="tx-danger">*</span></label>
                                    <input  value="{{ old('coupon_exp_date') }}" type="date" class="form-control" name="coupon_exp_date">
                                    @error('coupon_exp_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div><!-- col-4 -->
                            </div>
                            <div class="form-layout-footer">
                                <button class="ml-3 btn btn-sm btn-info">Save</button>
                            </div><!-- form-layout-footer -->
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection
@section('custom-style')
<link href="{{ asset('backend') }}/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="{{ asset('backend') }}/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">
@endsection
@section('custom-script')
<script src="{{ asset('backend') }}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
<script src="{{ asset('backend') }}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('backend') }}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>

<script>
    $(function () {
        $('#datatable1').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_ items/page',
            }
        });
    });

</script>

@endsection
