@extends('master')
@section('content')
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="" width="30" height="30" alt="">
        example-app</a>
    <a class="navbar-brand" href="./admin/administration.php">
        <button type="button" class="btn btn-dark">Admin</button>
    </a>
</nav>
<div class="d-flex align-items-center justify-content-center flex-column mt-4">
    <div class="d-flex justify-content-center navbar navbar-light bg-dark w-50 default_inner_nav">
        <!-- signup -->
        <h6 class="navbar-brand text-light font-weight-bold">Sign up</h6>
    </div>
    <div class="container mt-4 w-50">
        <div class="card">
            <article class="card-body">
                <form>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>First name </label>
                            <input type="text" class="form-control" placeholder="John">
                        </div>
                        <div class="col form-group">
                            <label>Last name</label>
                            <input type="text" class="form-control" placeholder="Doe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="col form-group">
                            <label>Phone number</label>
                            <input type="number" class="form-control" placeholder="+919876543210">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter your current address">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Create password</label>
                            <input type="text" class="form-control" placeholder="Please enter 6 digit password">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Retype password</label>
                            <input type="text" class="form-control" placeholder="Retype your password">
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
