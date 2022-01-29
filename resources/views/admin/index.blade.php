@extends('master')
@section('content')
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="{{ url('img/php-tag-logo.png') }}" width="30" height="30" alt="">
            example-app</a>
        <a class="navbar-brand products_nav" href="#">All Products</a>
        <a class="navbar-brand" href="{{ url('admin-logout') }}">
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
                <h5 class="font-weight-bold mt-2 default-text-nav">Hello, {{ session('adminUser') }}!</h5>
                <h5 class="font-weight-bold mt-2 default-text-nav">All product details listing with users</h5>
                <a class="navbar-brand" href="#"></a>
            </nav>
            <div class="container-fluid">
                <div class="table-responsive bg-white">
                    <table class="table table-bordered">
                        <thead class="thead-outline-primary">
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Product Price</th>
                        </tr>
                        </thead>
                        @php
                            static $count = 1;
                        @endphp
                        @foreach($data as $all)
                        <tbody>
                        <td><a href="{{ url('admin/'.$all->uid) }}">
                                <button class="btn btn-outline-dark btn-sm waves-effect waves-light"  data-toggle="tooltip" data-placement="bottom" title="View">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </a>
                        </td>
                        <td>{{ $count++ }}</td>
                        <td>{{ $all->first_name . $all->last_name }}</td>
                        <td>{{ $all->email }}</td>
                        <td>{{ $all->product_name }}</td>
                        <td>{{ $all->product_type }}</td>
                        <td>{{ $all->product_price }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
