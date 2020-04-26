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
                <a class="NavLink" href="{{route('home')}}">Accueil</a>
            </li>

            <li>
                <a class="NavLink" href="{{route('contact.form')}}">Contact</a>
            </li>

        </ul>
                <ul class ="RightItem nav justify-content-end">
                @if (Route::has('login'))
{{--                    <div class="top-right links">--}}
                        @auth
{{--                            @if($data != null)--}}
{{--                                <li>--}}
{{--                                    <a class="NavLink" href="{{route('profile.users.edit',$data[0]['id'])}}">Profile</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                            <li>
                            <a class="NavLink" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">{{ trans('global.logout') }}</a>
                            </li>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                <button type="submit">logout</button>
                                {{ csrf_field() }}
                            </form>
                            {{--                        menu quand autentifier--}}
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
                                <p display: none></p>
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
