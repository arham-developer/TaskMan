<x-layouts.base>
    
    @auth()
        @if (in_array(request()->route()->getName(),['sign-in', 'login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
            @include('layouts.footers.guest.description')
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            {{ $slot }}
        @endif
    @endauth

    @guest
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            {{ $slot }}
        @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
        @endif
    @endguest

</x-layouts.base>
