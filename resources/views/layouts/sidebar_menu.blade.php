<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    {{-- <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Active Page</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inactive Page</p>
                </a>
            </li>
        </ul>
    </li> --}}
    <li class="nav-header"> Navigasi </li>
    <li class="nav-item">
        <a href="/home" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p> Dashboard </p>
        </a>
    </li>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-wrench"></i>
            <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lihat User</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lihat Role</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{ route('balance.index') }}" class="nav-link">
            <i class="nav-icon fas fa-coins"></i>
            <p>
                Debet & Kredit
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('activity.index') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
                Kegiatan Masjid
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('asset.index') }}" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Aset Masjid
            </p>
        </a>
    </li>
</ul>
