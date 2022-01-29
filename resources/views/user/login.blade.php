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
        @if (session('success'))
            <div class="alert alert-success w-50">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
               <div class="alert alert-danger w-50 default_error_msg">
                   <ul>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
        <div class="d-flex justify-content-center navbar navbar-light bg-dark w-50 default_inner_nav">
            <!-- signup -->
            <h6 class="navbar-brand text-light font-weight-bold">Sign in</h6>
        </div>
        <div class="container mt-4 w-50">
            <form method="POST" action = "{{ url('user/login') }}">
                @csrf
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" autocomplete="off" class="form-control-plaintext" id="staticEmail" placeholder="email@example.com">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" autocomplete="off" class="form-control-plaintext" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-dark">Sign-In</button>
            </form>
        </div>
        <div>
            <h6>New User? <a href="{{ url('user/create') }}" data-toggle="tooltip" class="join_btn_login" data-placement="bottom" title="Register here">Create an account</a></h6>
        </div>
    </div>
@endsection

