@extends('master')
@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="{{ url('img/php-tag-logo.png') }}" width="30" height="30" alt="">
        example-app</a>
    <a class="navbar-brand" href="{{ url('administration') }}">
        <button type="button" class="btn btn-dark">Admin</button>
    </a>
</nav>
<div class="d-flex align-items-center justify-content-center flex-column mt-4">
    @if( session('failure'))
    <div class="alert alert-danger w-50">
        {{ session('failure') }}
    </div>
    @endif
    <div class="d-flex justify-content-center navbar navbar-light bg-dark w-50 default_inner_nav">
        <!-- signup -->
        <h6 class="navbar-brand text-light font-weight-bold">Sign up</h6>
    </div>
    <div class="container mt-4 w-50">

        <div class="card">
            <article class="card-body">
                <form action=" {{url('user')}}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label>First name </label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="John">
                            @error('first_name') <div class="alert alert-danger">{{ $message  }}</div> @enderror
                        </div>
                        <div class="col form-group">
                            <label>Last name</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Doe">
                            @error('last_name')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Email address</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@gmail.com">
                            @error('email')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="col form-group">
                            <label>Phone number</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+919876543210">
                            @error('phone')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter your current address">
                        @error('address')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Please enter 6 digit password">
                            @error('password')<div class="alert alert-danger">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Retype password</label>
                            <input type="password" name="retype_password" class="form-control @error('retype_password') is-invalid @enderror" placeholder="Retype your password">
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-dark btn-block">Register</button>
                    </div>
                </form>
            </article>
            <div class="border-top text-center">Already have an account? <a href="{{ url('user') }}" data-toggle="tooltip" class="join_btn_login" data-placement="bottom" title="Sign-In here">Login here</a></div>
        </div>
    </div>
</div>
@endsection
