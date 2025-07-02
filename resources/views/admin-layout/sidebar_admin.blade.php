<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ url('assets_admin/img/logo_gpib.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
                @if((auth()->user()->is_admin == 1))
                <li class="nav-item">
                    <a href="{{ route('admin.route') }}" class="nav-link {{ request()->is('Admin/home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-header">CONFIG WEBSITE</li>
                <li class="nav-item">
                    <a href="{{ route('admin.web.linkutube') }}" class="nav-link {{ request()->is('Admin/webconfig/*') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-youtube"></i>
                        <p>Link Utube</p>
                    </a>
                </li>

                <li class="nav-header">Absensi Pelkat</li>
                <li class="nav-item has-treeview 
                {{ request()->is('Admin/absensi/*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-map-pin"></i>
                        <p>
                            Pelkat
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('absence.search.pa') }}" class="nav-link 
                            {{ request()->is('Admin/absensi/pa') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PA</p>
                            </a>
                            <a href="{{ route('absence.search.pt') }}" class="nav-link 
                            {{ request()->is('Admin/absensi/pt') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PT</p>
                            </a>
                            
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.web.linkutube') }}" class="nav-link {{ request()->is('Admin/webconfig/*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-pencil-alt"></i>
                        <p>Kegiatan</p>
                    </a>
                </li>

                <li class="nav-header">JEMAAT</li>
                <li class="nav-item has-treeview 
                {{ request()->is('Admin/jemaat') ? 'menu-open' : '' }}
                {{ request()->is('Admin/jemaat/edit/*') ? 'menu-open' : '' }}
                {{ request()->is('Admin/jemaat/scheduleHbd') ? 'menu-open' : '' }}
                {{ request()->is('Admin/jemaat/searchHbd*') ? 'menu-open' : '' }}
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
                            <a href="{{ route('admin.jemat') }}" class="nav-link 
                            {{ request()->is('Admin/jemaat') ? 'active' : '' }}
                            {{ request()->is('Admin/jemaat/edit/*') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data</p>
                            </a>
                            <a href="{{ route('admin.jemat.hbd') }}" class="nav-link 
                            {{ request()->is('Admin/jemaat/scheduleHbd') ? 'active' : '' }}
                            {{ request()->is('Admin/jemaat/searchHbd') ? 'active' : '' }}
                            {{ request()->is('Admin/jemaat/searchHbdR*') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cek HBD</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">LAMPIRAN-LAMPIRAN</li>
                <li class="nav-item has-treeview 
                {{ request()->is('Admin/lampiran') ? 'menu-open' : '' }}
                {{ request()->is('Admin/lampiran/*') ? 'menu-open' : '' }}
                ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-prescription"></i>
                        <p>
                            Lampiran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.lampiran.upload.create') }}" class="nav-link 
                            {{ request()->is('Admin/lampiran/upload') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload</p>
                            </a>
                            <a href="{{ route('admin.lampiran') }}" class="nav-link 
                            {{ request()->is('Admin/lampiran') ? 'active' : '' }}
                            ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tabel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                <li class="nav-header">PROFILE</li>

                <li class="nav-item">
                    {{-- <a href="{{ route('changePassword') }}" class="nav-link {{ request()->is('changePassword') ? 'active' : '' }}">
                        <i class="fas fa-key nav-icon"></i>
                        <p>Change Password</p>
                    </a> --}}
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

                @endif




            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>