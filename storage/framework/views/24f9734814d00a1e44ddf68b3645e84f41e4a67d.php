<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
    
    <li class="nav-header"> Navigasi </li>
    <li class="nav-item">
        <a href="/home" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p> Dashboard </p>
        </a>
    </li>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
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
                    <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat User</p>
                    </a>
                </li>
            </ul>
        </li>
        
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['is-admin', 'is-sekre'])): ?>
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
                    <a href="<?php echo e(route('balance.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Laporan Keuangan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('balance.create')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah L. Keuangan</p>
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
                    <a href="<?php echo e(route('activity.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('activity_categories.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('activity.propose')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Kegiatan</p>
                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accept_activity.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Kegiatan</p>
                    </a>
                </li>
                <?php endif; ?>
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
                    <a href="<?php echo e(route('asset.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('asset_categories.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat Kategori Aset</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('asset.propose')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Mengajukan Aset</p>
                    </a>
                </li>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accept_asset.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menyetujui Aset</p>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </li>
    <?php endif; ?>

    <li class="nav-item">
        <a href="" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
                Santri Masjid
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-jamaah')): ?>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo e(route('santri.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pendaftaran Santri</p>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('is-admin')): ?>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accept_santri.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Menerima Santri</p>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </li>
</ul>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/layouts/sidebar_menu.blade.php ENDPATH**/ ?>