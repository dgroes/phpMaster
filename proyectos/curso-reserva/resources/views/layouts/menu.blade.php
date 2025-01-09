<div class="app-menu navbar-menu">

    <!-- LOGO de sidebar -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/calendar.png') }}" alt="" height="70">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/calendar2.png') }}" alt="" height="70">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/calendar2.png') }}" alt="" height="20">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/calendar2.png') }}" alt="" height="70">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                {{-- __MENÚ USUARIO__ --}}
                @if (Auth::user()->rol_id == 3)
                    <li class="menu-title"><span>Usuario</span></li>

                    {{-- Nueva Reserva --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Nueva Reserva</span>
                        </a>
                    </li>

                    {{-- Consultar Reserva --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Consultar Reserva</span>
                        </a>
                    </li>

                    {{-- Calendario --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Calendario</span>
                        </a>
                    </li>

                    {{-- Ver pagos --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Ver Pagos</span>
                        </a>
                    </li>
                @endif

                {{-- __MENÚ CONSULTOR__ --}}
                @if (Auth::user()->rol_id == 2)
                    <li class="menu-title"><span>Consultor</span></li>

                    {{-- Calendario --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Calendario</span>
                        </a>
                    </li>
                @endif


                {{-- __MENÚ ADMINITRADOR__ --}}
                @if (Auth::user()->rol_id == 1)
                    <li class="menu-title"><span>Administrador</span></li>

                    {{-- Nueva Reserva --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Nueva Reserva</span>
                        </a>
                    </li>

                    {{-- Consultar Reserva --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Consultar Reserva</span>
                        </a>

                        {{-- Ver Pagos --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Ver Pagos</span>
                        </a>

                        {{-- Mnt. Usuarios --}}
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#">
                            <i class="ri-dashboard-2-line"></i> <span>Mnt. Usuarios</span>
                        </a>


                    </li>
                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
