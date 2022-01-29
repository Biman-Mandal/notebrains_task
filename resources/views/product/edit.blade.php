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
            @if( session('failure'))
                <div class="alert alert-danger">
                    {{ session('failure') }}
                </div>
            @endif
            <nav class="navbar navbar-light bg-light border-bottom mb-1">
                <h5 class="font-weight-bold mt-2 default-text-nav">Update Product</h5>
                <h5 class="font-weight-bold mt-2 default-text-nav"></h5>
                <a class="navbar-brand" href="{{ url('products') }}">
                    <button  data-toggle="tooltip" data-placement="bottom" title="Back" class="btn btn-outline-dark btn-sm waves-effect waves-light" data-target="#addModal">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </button>
                </a>
            </nav>
            <div class="container mt-4">
                <div class="card">
                    <article class="card-body">
                        <form method="post" action="{{ url('products/'.$data['id']) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" value="{{ $data['product_name'] }}" class="form-control" placeholder="Enter the product name">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Product Type</label>
                                    <input type="text" name="product_type" value="{{ $data['product_type'] }}" class="form-control" placeholder="Enter the product type">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Price</label>
                                    <input type="text" name="product_price" value="{{ $data['product_price'] }}" class="form-control" placeholder="Enter the price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <input type="text" name="product_bio" value="{{ $data['product_bio'] }}" class="form-control" placeholder="Enter the price">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-primary">Update</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
@endsection
