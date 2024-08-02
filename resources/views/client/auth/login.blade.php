@extends('client.layouts.master')
@section('title')
    Cart List
@endsection
@section('content')
    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav">
                            <a class="active" data-bs-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <div class="login-input-box">
                                                <input type="text" name="email" placeholder="Email">
                                                @error('email')
                                                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                                <input type="password" name="password" placeholder="Password">
                                                @error('password')
                                                <span class="text-danger">
                <strong>{{ $message }}</strong>
            </span>
                                                @enderror
                                            </div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox" name="remember">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <div class="button-box">
                                                    <button class="login-btn btn" type="submit"><span>Đăng nhập</span></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
