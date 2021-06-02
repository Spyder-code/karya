@if (Auth::user()->role == 3)
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home.funner') }}"
        aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span
            class="hide-menu">Dashboard</span></a></li>
    <li class="list-divider"></li>
    <li class="nav-small-cap"><span class="hide-menu">Funners</span></li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('funner.post') }}"
        aria-expanded="false"><i class="fas fa-clipboard"></i></i><span class="hide-menu">List
            Karya
        </span></a>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('funner.tambah.karya') }}"
        aria-expanded="false"><i class="fas fa-pen-square"></i><span
            class="hide-menu">Unggah Karya
        </span></a>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('funner.profile') }}"
        aria-expanded="false"><i class="fas fa-address-card"></i><span
            class="hide-menu">Profil</span></a></li>
@elseif(Auth::user()->role == 2)
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home.juri') }}"
        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
            class="hide-menu">Dashboard</span></a></li>
    <li class="list-divider"></li>
    <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('juri.event') }}"
        aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
        class="hide-menu">Nilai Karya</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('juri.profile') }}"
        aria-expanded="false"><i class="fas fas fa-user"></i><span
        class="hide-menu">Profile</span></a>
    </li>
@elseif(Auth::user()->role == 1)
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('home.admin') }}"
        aria-expanded="false"><i class="fas fa-tachometer-alt"></i><span
            class="hide-menu">Dashboard</span></a></li>
    <li class="list-divider"></li>
    <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('admin.tambah.karya') }}"
        aria-expanded="false"><i class="fas fa-pen-square"></i><span
            class="hide-menu">Unggah Karya
        </span></a>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('admin.user') }}"
        aria-expanded="false"><i class="fas fa-users"></i><span
            class="hide-menu">List User
        </span></a>
    </li>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.karya') }}"
        aria-expanded="false"><i class="fas fa-clipboard"></i><span fas fa-list
            class="hide-menu">List Karya</span></a></li>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('event.index') }}"
        aria-expanded="false"><i class="fas fas fa-list"></i><span
            class="hide-menu">Manajemen Event</span></a>
    <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.profile') }}"
        aria-expanded="false"><i class="fas fas fa-user"></i><span
            class="hide-menu">Profile</span></a>
</li>
@endif
<li class="list-divider"></li>
<li class="sidebar-item text-center">
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ route('admin.karya') }}"
    aria-expanded="false"><i class="fas fa-power-off"></i><span fas fa-list
        class="hide-menu"> Logout</span>
        </button>
    </form>
</li>
