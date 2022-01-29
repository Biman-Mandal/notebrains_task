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
        <div class="content-wrapper w-75">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <nav class="navbar navbar-light bg-light border-bottom mb-1">
                <h5 class="font-weight-bold mt-2 default-text-nav">Welcome User</h5>
                <h5 class="font-weight-bold mt-2 default-text-nav"></h5>
                <a class="navbar-brand" href="{{ url('products/create') }}">
                    <button  data-toggle="tooltip" data-placement="bottom" title="Insert" class="btn btn-outline-dark btn-sm waves-effect waves-light m-1" data-target="#addModal">
                        <i class="fa fa-plus"></i>
                    </button>
                </a>
            </nav>
            <div class="container-fluid">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                        <thead class="thead-outline-primary">
                        <tr>
                            <th width="2%"></th>
                            <th>No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                        static $count = 1;
                        @endphp
                        @foreach($data as $products)
                        <tbody>

                        <td><a href="{{ url('products/'.$products->id) }}">
                                <button class="btn btn-outline-dark btn-sm waves-effect waves-light mr-1"  data-toggle="tooltip" data-placement="bottom" title="View" data-target="#addModal">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>{{ $count++ }}</td>
                        <td>{{ $products->product_name }}</td>
                        <td>{{ $products->product_type }}</td>
                        <td>{{ $products->product_price }}</td>
                        <td class="index_data_action">
                            <div>
                            <a href="{{ url('products/'. $products->id .'/edit') }}">
                                <button class="btn btn-outline-dark btn-sm waves-effect waves-light mr-1"  data-toggle="tooltip" data-placement="bottom" title="Edit">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                </button>
                            </a>
                            </div>
                            <div>
                            <form action="{{ url('products/'.$products->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button class="btn btn-outline-dark btn-sm waves-effect waves-light ml-1" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                            </form>
                            </div>
                        </td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
