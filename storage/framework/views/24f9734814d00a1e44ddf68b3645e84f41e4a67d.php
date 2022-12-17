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
                    <a href="<?php echo e(route('user.index')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Lihat User</p>
                    </a>
                </li>
                
            </ul>
        </li>
    <?php endif; ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['is-admin', 'is-sekre'])): ?>
        <li class="nav-item">
            <a href="<?php echo e(route('balance.index')); ?>" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                    Debet & Kredit
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('activity.index')); ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Kegiatan Masjid
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(route('asset.index')); ?>" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Aset Masjid
                </p>
            </a>
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
                    <a href="<?php echo e(route('santri.create')); ?>" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pendaftaran Santri</p>
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </li>
</ul>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/layouts/sidebar_menu.blade.php ENDPATH**/ ?>