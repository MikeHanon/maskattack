<nav class="navbarAttack NavContent navbar navbar-expand-lg navbar-light ">


        <a href="{{route('home')}}" class="logoacc navbar-brand">
            <img class="logoMask" src="{{asset('img/logo-maskattack.png')}}" alt="logo"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li>
                <a class="NavLink" href="{{route('home')}}">{{trans('global.home')}}</a>
            </li>

            <li>
                <a class="NavLink" href="{{route('contact.form')}}">{{trans('global.contact_us')}}</a>
            </li>

            <li>
                <a class="NavLink" href="{{route('about-us')}}">{{trans('global.about')}}</a>
            </li>

            <li>
                <a class="NavLink" href="{{route('tuto')}}">{{trans('global.tuto')}}</a>
            </li>

        </ul>
                <ul class ="RightItem nav justify-content-end">
                @if (Route::has('login'))
{{--                    <div class="top-right links">--}}
                        @auth
                            @if($data != null)
                                <li class="dropdown ">
                                    <a class="NavLink" data-toggle="dropdown" href="#"><i class="fas fa-user"></i></a>
                                    <div class="dropdown-menu ">
                                        <a class="NavLink dropdown-item" href="{{route('profile.users.edit',$data[0]['id'])}}">{{trans('global.profile')}}</a>
                                        <a class="NavLink dropdown-item" href="{{route('order.my-order')}}">mes ventes</a>
                                        <a class="NavLink dropdown-item" href="{{route('product.products.myProducts')}}">mes produit</a>
                                        <a class="NavLink dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('global.logout') }}</a>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    <button type="submit">logout</button>
                                    {{ csrf_field() }}
                                </form>
                                    </div>
                                </li>
                                <li>
                                    <a class="NavLink" href="{{route('orders.index')}}"><i class="fas fa-shopping-cart"></i></a>
                                </li>
                            @endif
                        @else
                            <li>
                            <a class="NavLink" href="{{ route('login') }}">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                <a class="NavLink" href="{{ route('register') }}">Inscription</a>
                                </li>
                            @endif
                        @endauth
{{--                    </div>--}}
                @endif
                    <li class="dropdown ">
                        @if(count(config('panel.available_languages', [])) > 1)
                            <a class="NavLink navlang " data-toggle="dropdown" href="#">{{ strtoupper(app()->getLocale()) }}</a>
                            <div class="dropdown-menu ">
                                @foreach(config('panel.available_languages') as $langLocale => $langName)
                                    <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}({{ $langName }})</a>
                                @endforeach
                            </div>
                        @endif
                    </li>
        </ul>




    </div>

</nav>
<hr>
