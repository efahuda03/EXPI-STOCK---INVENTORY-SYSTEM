<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center mb-0 text-muted"style="font-size: 15px;">
                        <span class="me-2"><?= date('d/m/y') ?></span>
                        <span id="jam-digital">00:00:00</span>
                    </div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalLogout" aria-expanded="false">
                    <i class="ti ti-logout"></i>
                    <span class="hide-menu">Logout</span>
                </a>
                </li>
            </ul>
        </div>
    </nav>
</header>