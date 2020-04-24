@extends('layouts.app')

@include('partials.menuUsers')
@section('content')
<h5 class="ContactUsTitle">{{ trans('global.contact_us') }}</h5>
<div class="ContactUsPage">
    @if(Session::has('success'))
    <div class="AlertSuccess">
        {{ Session::get('success') }}
    </div>
    @endif
    <div class="">
    <form method="post" action="contact-us">
        {{csrf_field()}}
                <div>
                    <input type="text" class="ContactUsInput @error('name') InputAlert @enderror"
                        placeholder="{{ trans('global.name') }}" name="name">
                    @error('name')
                    <span class="RedAlert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input type="text" class="ContactUsInput @error('email') InputAlert @enderror"
                        placeholder="{{ trans('global.login_email') }}" name="email">
                    @error('email')
                    <span class="RedAlert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <input type="text" class="ContactUsInput @error('subject') InputAlert @enderror"
                        placeholder="{{ trans('global.subject') }}" name="subject">
                    @error('subject')
                    <span class="RedAlert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <textarea class="ContactUsMsg textarea @error('message') InputAlert @enderror"
                        placeholder="{{ trans('global.message') }}" name="message"></textarea>
                    @error('message')
                    <span class="RedAlert" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="BtnSend">{{ trans('global.send') }}</button>
        </div>
    </form>
    <div class="ContentImg">
        <img src="{{asset('img/contactimg.jpg')}}" alt="StayHome">
    </div>
</div>
@endsection