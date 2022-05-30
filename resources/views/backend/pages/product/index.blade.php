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
        <p style="float:left" class="d-inline mb-0">All Product</p>
        <a style="float:right" class="d-inline btn btn-sm btn-primary" href="{{ route('product.create') }}">Create
            Product</a>
    </div>
    <div class="card-body">
        <table id="datatable1" class="table display responsive nowrap dataTable no-footer dtr-inline collapsed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-alian-center">
                <?php $sl = 1; ?>
                @foreach ($products as $data)
                <tr>
                    <th scope="row">{{ $sl++ }}</th>
                    <td>
                        @if ($data->product_thumbnails)
                        <img class=" img-fluid rounded wd-50" src="{{ asset('backend/uploads/product/'.$data->product_thumbnails) }}"
                        alt="product_image">
                        @else
                        <img class=" img-fluid rounded wd-50" src="{{ asset('backend/default/no-image-pro.png') }}"
                        alt="category_image">
                        @endif
                    </td>
                    <td>{{ $data['product_name'] }}</td>
                    <td > {{$data['product_price']}}</td>
                    <td>
                        @if ($data['product_status'])
                        <a class="btn btn-success btn-sm" href="{{ route('product.deactive',$data->product_slug) }}">Active</a>
                        @else
                        <a class="btn btn-danger btn-sm" href="{{ route('product.active',$data->product_slug) }}">Deactive</a>
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="dropdown">
                            <a href="" class="tx-gray-800 d-inline-block" data-toggle="dropdown">
                                <div class="ht-45 pd-x-20 bd d-flex align-items-center justify-content-center">
                                    <span class="mg-r-10 tx-13 tx-medium">Manage</span>
                                    <i class="fa fa-angle-down mg-l-10"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu pd-10 wd-200">
                                <nav class="nav nav-style-2 flex-column">
                                    <a href="{{ route('product.edit',$data->product_slug) }}" class="nav-link"><i class="icon ion-compose"></i> Edit</a>
                                    <a class="nav-link" data-toggle="modal" data-target="#delete{{ $data->id }}"><i class="icon ion-trash-b"></i> Delete</a>
                                </nav>
                            </div>
                            <!-- dropdown-menu -->
                        </div>
                        <!-- dropdown -->

                    </td>
                </tr>
                <!-- Delete Modal -->
                <div class="modal fade" id="delete{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Product?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are You Sure Went To Delete This Product !
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="{{ route('product.destroy',$data->product_slug) }}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
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
