<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ url('assets_admin/img/default.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DB</span>
    </a>


    <div class="sidebar">
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets_admin/img/default.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div> -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('pt.route') }}" class="nav-link {{ request()->is('PT/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('PT/absensi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-week"></i>
                        <p>Absensi</p>
                    </a>
                </li>

                <li class="nav-header">Database</li>
                <li class="nav-item has-treeview 
                {{ request()->is('PT/teruna') ? 'menu-open' : '' }}
                {{ request()->is('PT/pengurus-pelayan') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Jemaat
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pt.teruna') }}" class="nav-link 
                            {{ request()->is('PT/teruna') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Teruna</p>
                            </a>
                            <a href="{{ route('pt.pengurus') }}" class="nav-link 
                            {{ request()->is('PT/pengurus-pelayan') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelayan & Pengurus</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>