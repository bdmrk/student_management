@extends('layouts.auth_master')

@section('f-title')

    Login::PGDIT
    @stop

@section('content')

<div id="page-wrapper">
    <div class="main-page login-page ">
        <h2 class="title1">Login</h2>
        <div class="widget-shadow">
            <div class="login-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="email" class="user" name="email" placeholder="Enter Your Email" required="">
                    @if ($errors->has('email'))
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                    <input type="password" name="password" class="lock" placeholder="Password" required="">
                   
                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    <div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
                        <div class="forgot">
                            <a href="{{ route('password.request') }}">forgot password?</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="Sign In" value="Sign In">
                   
                </form>
            </div>
        </div>
        
    </div>
</div>



@endsection
