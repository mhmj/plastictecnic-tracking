@extends('layouts.login.layout')

@section('content')
    <div class="blankpage-form-field">
        <div class="page-logo m-0 w-100 align-items-center justify-content-center rounded border-bottom-left-radius-0 border-bottom-right-radius-0 px-4">
            <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                <img src="img/tecnic.png" alt="Tecnic" aria-roledescription="logo">
                <span class="page-logo-text mr-1">Tracking System</span>
                <!--<i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>-->
            </a>
        </div>
        <div class="card p-4 border-top-left-radius-0 border-top-right-radius-0">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="username">Email</label>
                    <input type="email" id="username" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--<span class="help-block">-->
                    <!--Your unique username to app-->
                    <!--</span>-->
                </div>
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                    <!--<span class="help-block">-->
                    <!--Your password-->
                    <!--</span>-->
                </div>
                <!--<div class="form-group text-left">-->
                <!--<div class="custom-control custom-checkbox">-->
                <!--<input type="checkbox" class="custom-control-input" id="rememberme">-->
                <!--<label class="custom-control-label" for="rememberme"> Remember me for the next 30 days</label>-->
                <!--</div>-->
                <!--</div>-->
                <a href="#" class="float-left"><strong>Forgot Password</strong></a></strong></a>
                <button type="submit" class="btn btn-default float-right">Login</button>
            </form>
        </div>
        <!--<div class="blankpage-footer text-center">-->
        <!--<a href="#"><strong>Forgot Password</strong></a></strong></a>-->
        <!--</div>-->
    </div>
    <div class="login-footer p-2">
        <div class="row">
            <div class="col col-sm-12 text-center">
                <i></i>
            </div>
        </div>
    </div>
@endsection