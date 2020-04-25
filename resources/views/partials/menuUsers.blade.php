<nav class="navbarAttack">
    <a href="#"><img src="{{asset('img/logo-maskattack.png')}}" /></a>

    <div class="NavContent navbar navbar-expand">
        <ul>
            <li>
                <a class="NavLink" href="{{route('home')}}">Accueil</a>
            </li>
            <li>
                <a class="NavLink" href="{{route('profile.users.edit',$data[0]['id'])}}">Profile</a>
            </li>
            <li>
                <a class="NavLink" href="{{route('contact.form')}}">Contact</a>
            </li>
            <li class="dropdown RightItem">
                @if(count(config('panel.available_languages', [])) > 1)
                <a data-toggle="dropdown" href="#">{{ strtoupper(app()->getLocale()) }}</a>
                <div class="dropdown-menu dropdown-menu-right">
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
