@extends('client.layouts.master')
@section('title')
Cart List
@endsection
<style>
    .password-container {
        position: relative;
    }

    .password-container input[type="password"] {
        padding-right: 30px;
        /* Để có không gian cho biểu tượng */
    }

    .password-toggle {
        position: absolute;
        top: 20%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .password-toggle i {
        font-size: 16px;
        color: #000000;
    }
</style>
@section('content')
<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb lagin-and-register-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 m-auto">
                <div class="login-register-wrapper">
                    <!-- login-register-tab-list start -->
                    <div class="login-register-tab-list nav">

                        <h2> Đăng Ký </h2>

                    </div>
                    <!-- login-register-tab-list end -->
                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="login-input-box">
                            <input type="text" name="name" placeholder="User Name">
                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="password-container">
                                <input type="password" id="password" name="password" placeholder="Password">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Enter the password">
                                <span class="password-toggle" onclick="togglePassword()">
                                    <i id="password-icon" class="fa fa-eye"></i>
                                </span>
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <input name="email" placeholder="Email" type="email">
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="button-box" style="padding-left: 250px;">
                            <button class="register-btn btn" type="submit"><span>Đăng ký</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePassword() {
        var passwordField = document.getElementById('password');
        var passwordConfirmationField = document.getElementById('password_confirmation');
        var passwordIcon = document.getElementById('password-icon');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            passwordConfirmationField.type = 'text';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            passwordConfirmationField.type = 'password';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        }
    }
</script>
<!-- main-content-wrap end -->
@endsection