@extends('master')
@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ url('img/php-tag-logo.png') }}" width="30" height="30" alt="">
            example-app</a>
        <a class="navbar-brand products_nav" href="#">Manage Products</a>
        <a class="navbar-brand" href="{{ url('logout') }}">
            <button type="button" class="btn btn-outline-dark">Logout</button>
        </a>
    </nav>
    <div class="d-flex align-items-center justify-content-center flex-column mt-4">
        <div class="content-wrapper w-50">
            <nav class="navbar navbar-light bg-light border-bottom mb-1">
                <h5 class="font-weight-bold mt-2 default-text-nav">View Product</h5>
                <h5 class="font-weight-bold mt-2 default-text-nav"></h5>
                <a class="navbar-brand" href="{{ url('products') }}">
                    <button  data-toggle="tooltip" data-placement="bottom" title="Back" class="btn btn-outline-dark btn-sm waves-effect waves-light">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </button>
                </a>
            </nav>
            <div class="content-wrapper pl-0 pr-0 mt-n2">
                <div class="container-fluid pl-0 pr-0">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-sm-6 d-flex align-content-stretch">
                                <div class="card w-100 border mb-4">
                                    <div class="card-body">
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <h6 class="font-weight-bold mb-1">Product Name</h6>
                                            <div>{{$data['product_name']}}</div>
                                        </div>
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <h6 class="font-weight-bold mb-1">Product Type</h6>
                                            <div>{{$data['product_type']}}</div>
                                        </div>
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <h6 class="font-weight-bold mb-1">Product Price</h6>
                                            <div>{{$data['product_price']}}</div>
                                        </div>
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <h6 class="font-weight-bold mb-1">Created at</h6>
                                            <div>{{$data['created_at']}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-content-stretch">
                                <div class="card border w-100 border mb-4">
                                    <div class="card-body tx-13">
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <label class="font-weight-bold mb-1">Picture</label>
                                            <div class="avatar avatar-xxl card" ><img src="{{ url('stored_images/'.$data['product_image']) }}" alt=""></div>
                                        </div>
                                        <div class="mb-3 tx-13 tx-spacing-2">
                                            <label class="font-weight-bold mb-1">Bio</label>
                                            <div class="tx-spacing-2">{{ $data['product_bio'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
