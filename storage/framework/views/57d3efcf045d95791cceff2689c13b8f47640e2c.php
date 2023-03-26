<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    

    <!-- Messages Dropdown Menu -->
    

    <!-- Notifications Dropdown Menu -->
    
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">
            logout
        </a>
    </li>
    <form id="logout-form" method="POST" action="<?php echo e(route('logout')); ?>">
        <?php echo csrf_field(); ?>
    </form>
</ul>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/layouts/navbar_right.blade.php ENDPATH**/ ?>