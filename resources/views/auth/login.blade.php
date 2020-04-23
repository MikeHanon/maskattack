@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="{{ route('admin.adminHome') }}">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
    <div class="LoginBox">
        <div class="card-body login-card-body">
            <p class="TitleLogin">
                {{ trans('global.login') }}
            </p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="Input">
                    <input id="email" type="email" class="LoginInput{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="Input">
                    <input id="password" type="password" class="LoginInput{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                        <div class="RememberMe">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ trans('global.remember_me') }}</label>
                        </div>
                    <div class="BtnConnexion">
                        <button type="submit" class="ConnexionBtn">
                            {{ trans('global.login') }}
                        </button>
                    </div>
            </form>


            @if(Route::has('password.request'))
            <div class="ForgetRegister">
                <p>
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif
                <p>
                    <a href="{{ route('register') }}">
                        {{ trans('global.register') }}
                    </a>
                </p>
            </div>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection


