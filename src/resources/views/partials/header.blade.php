<header>
    <nav class="navbar navbar-expand-sm bg-green navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('main') }}">Tiketor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('main') }}>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('complaint.list') }}">Complaints</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('system.list') }}">Systems</a>
                    </li>
                    @if((Auth::user()->is_admin ?? '') === 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.list') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Admin</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href={{ route('main') }} id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name ?? '' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.show', [Auth::user()->id ?? '']) }}">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
