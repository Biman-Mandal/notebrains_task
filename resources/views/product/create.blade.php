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
                <h5 class="font-weight-bold mt-2 default-text-nav">Insert Product</h5>
                <h5 class="font-weight-bold mt-2 default-text-nav"></h5>
                <a class="navbar-brand" href="#">
                    <button  data-toggle="tooltip" data-placement="bottom" title="Back" class="btn btn-outline-dark btn-sm waves-effect waves-light" data-target="#addModal">
                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    </button>
                </a>
            </nav>
            <div class="container mt-4">
                <div class="card">
                    <article class="card-body">
                        <form method="post" action="{{ url('products') }} " enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="uid" value="{{session('profile.id')}}">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" placeholder="Enter the product name">
                                @error('product_name') <div class="alert alert-danger">{{ $message  }}</div> @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Product Type</label>
                                    <select class="form-control" name="product_type">
                                        <option value="Clothing">Clothing</option>
                                        <option value="Home">Home</option>
                                        <option value="Electronics" selected>Electronics</option>
                                        <option value="Beauty">Beauty</option>
                                        <option value="Travel">Travel</option>
                                        <option value="Toys">Toys</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Product Price</label>
                                    <input type="text" name="product_price" class="form-control @error('product_price') is-invalid @enderror" placeholder="Enter the price">
                                    @error('product_price') <div class="alert alert-danger">{{ $message  }}</div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Product Image</label>
                                <input name="product_image" class="form-control @error('product_image') is-invalid @enderror" type="file">
                                @error('product_image') <div class="alert alert-danger">{{ $message  }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                <textarea name="product_bio" class="form-control @error('product_bio') is-invalid @enderror" rows="3" placeholder="Product details"></textarea>
                                @error('product_bio') <div class="alert alert-danger">{{ $message  }}</div> @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn btn-primary">Insert</button>
                            </div>
                        </form>
                    </article>
                </div>
            </div>
        </div>
@endsection
