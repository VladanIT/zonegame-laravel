<nav>
    <ul class="menu">
        <li><a class="active" href="{{ asset("/") }}">Pocetna</a></li>
        @foreach ($menus as $menu)
            <li><a href="{{ asset($menu->href) }}">{{ $menu->title }}</a></li>           
        @endforeach
        {{-- <li><a href="{{ asset("/games") }}">Igrice</a></li>
        <li><a href="{{ asset("/gallery") }}">Galerija</a></li>
        <li><a href="{{ asset("/contact") }}">Kontakt</a></li> --}}
        @if(!session()->has('user'))
            <li><a href="{{ asset("/login") }}">Prijava</a></li>
        @endif  
        @if(session()->has('user'))
            @if(session()->get('user')->role == 'Admin')
                <li><a href="{{ asset('/admin') }}">Admin panel</a></li>
            @endif
            <li><a href="{{ route('logout') }}">Odjava</a></li>
        @endif
    </ul>
</nav>