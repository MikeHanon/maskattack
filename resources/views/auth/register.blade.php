@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="#">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
    <div class="LoginBox">
        <div class="card-body login-card-body">
            <p class="TitleLogin">{{ trans('global.register') }}</p>
            <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div>
                    {{ csrf_field() }}
                    <div class="Input">
                        <input type="text" name="name" class="LoginInput {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.username') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="Input">
                        <input type="email" name="email" class="LoginInput{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="Input">
                        <input type="password" name="password" class="LoginInput{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                    <div class="Input">
                        <input type="password" name="password_confirmation" class="LoginInput" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>
                    <div class="Input">
                        <input type="hidden" name="roles[]" id="roles" class="LoginInput{{ $errors->has('password') ? ' is-invalid' : '' }}" value="2" >

                    </div>

                </div>
                    <div class="BtnConnexion">
                        <button type="submit" class="ConnexionBtn">
                            {{ trans('global.register') }}
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection
