<aside class="app-sidebar control-sidebar-push bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="./index.html" class="brand-link">
            <span class="brand-text fw-light">Pemilihan Ketua OSIS</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-person-fill"></i>
                        <p>
                            Kandidat
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('candidates.index') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Semua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('candidates.create') }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tambah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('votingTime') }}" class="nav-link">
                        <i class="nav-icon bi bi-clock"></i>
                        <p>Waktu voting</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.monitor') }}" class="nav-link">
                        <i class="nav-icon bi bi-eye"></i>
                        <p>Monitor</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
