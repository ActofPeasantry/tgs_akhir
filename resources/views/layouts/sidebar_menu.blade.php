<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    <li class="nav-header"> Navigasi </li>
    <li class="nav-item">
        <a href="/home" class="nav-link @if(Route::is('dashboard')) {{ 'active' }} @endif">
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
                    <a href="{{ route('admin.user.index') }}" class="nav-link @if(Route::is('admin.user.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat User</p>
                    </a>
                </li>
            </ul>
        </li>
    @endcan

    @canany(['is-admin', 'is-sekre'])
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                    Laporan Keuangan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('balance.index') }}" class="nav-link @if(Route::is('balance.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Laporan Keuangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('balance_categories.index') }}" class="nav-link @if(Route::is('balance_categories.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori</p>
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
                    <a href="{{ route('activity.index') }}" class="nav-link @if(Route::is('activity.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activity_categories.index') }}" class="nav-link @if(Route::is('activity_categories.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Kegiatan</p>
                    </a>
                </li>
                @can('is-sekre')
                <li class="nav-item">
                    <a href="{{ route('activity.propose') }}" class="nav-link @if(Route::is('activity.propose')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Kegiatan</p>
                    </a>
                </li>
                @endcan

                @can('is-admin')
                <li class="nav-item">
                    <a href="{{ route('admin.accept_activity.index') }}" class="nav-link @if(Route::is('admin.accept_activity.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Kegiatan</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
    @endcanany

    @canany(['is-admin','is-sekre'])
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Aset Masjid <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('asset.index') }}" class="nav-link @if(Route::is('asset.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('asset_categories.index') }}" class="nav-link @if(Route::is('asset_categories.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Aset</p>
                    </a>
                </li>

                @can('is-sekre')
                <li class="nav-item">
                    <a href="{{ route('asset.propose') }}" class="nav-link @if(Route::is('asset.propose')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Aset</p>
                    </a>
                </li>
                @endcan

                @can('is-admin')
                <li class="nav-item">
                    <a href="{{ route('admin.accept_asset.index') }}" class="nav-link @if(Route::is('admin.accept_asset.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Aset</p>
                    </a>
                </li>
                @endcan
            </ul>
        </li>
    @endcanany

    @canany(['is-admin', 'is-jamaah'])
        <li class="nav-item">
            <a href="" class="nav-link">
                <i class="nav-icon fas fa-praying-hands"></i>
                <p>
                    Santri Masjid
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>

            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('santri.index') }}" class="nav-link @if(Route::is('santri.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Santri</p>
                    </a>
                </li>
            </ul>

            @can('is-jamaah')
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('santri.propose') }}" class="nav-link @if(Route::is('santri.propose')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pendaftaran Santri</p>
                    </a>
                </li>
            </ul>
            @endcan

            @can('is-admin')
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.accept_santri.index') }}" class="nav-link @if(Route::is('admin.accept_santri.index')) {{ 'active' }} @endif">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menerima Santri</p>
                    </a>
                </li>
            </ul>
            @endcan
        </li>
    @endcanany
</ul>
