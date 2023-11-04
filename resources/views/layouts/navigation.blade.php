<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
                </svg>
                {{ __('Dashboard') }}
            </a>
        </li>
        @if (auth()->user()->level == "admin")
            <li class="nav-item @if(request()->routeIs('users.index')) active @endif">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    {{ __('Users') }}
                </a>
            </li>
            <li class="nav-item @if(request()->routeIs('theme.show')) active @endif">
                <a class="nav-link" href="{{ route('theme.show') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg>
                    {{ __('Theme') }}
                </a>
            </li>
        @endif
        @if (auth()->user()->level == "user" && @$getStatus->status != 0)
                <li class="nav-item @if(request()->routeIs('wedding.index')) active @endif">
                    <a class="nav-link" href="{{ route('wedding.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                        </svg>
                        {{ __('Setting Wedding') }}
                    </a>
                </li>
        @endif
    @endauth
</ul>
