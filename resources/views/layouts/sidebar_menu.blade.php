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

    @can('is-admin')
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
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat User</p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-wrench"></i>
                <p>
                    Administrasi
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.accept_santri.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menerima Santri</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.accept_asset.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menyetujui Asset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.accept_activity.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menyetujui Kegiatan</p>
                    </a>
                </li>
            </ul>
        </li> --}}
    @endcan

    @canany(['is-admin', 'is-sekre'])
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                    Debet & Kredit
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('balance.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Debet & Kredit</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('balance.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah Debet/Kredit</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Kegiatan Masjid <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('activity.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activity_categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activity.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Kegiatan</p>
                    </a>
                </li>
                @can('is-admin')
                <li class="nav-item">
                    <a href="{{ route('admin.accept_activity.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Kegiatan</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Aset Masjid <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('asset.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asset_categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asset.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Aset</p>
                    </a>
                </li>
                @can('is-admin')
                <li class="nav-item">
                    <a href="{{ route('admin.accept_asset.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Aset</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
    @endcanany

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Santri Masjid
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        @can('is-jamaah')
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('santri.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pendaftaran Santri</p>
                    </a>
                </li>
            </ul>
        @elsecan('is-admin')
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.accept_santri.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menerima Santri</p>
                    </a>
                </li>
            </ul>
        @endcan
    </li>
</ul>
