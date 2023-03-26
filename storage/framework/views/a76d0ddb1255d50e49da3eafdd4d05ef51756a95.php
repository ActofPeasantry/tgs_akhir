<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src=" <?php echo e(asset('assets/dist/img/user2-160x160.jpg')); ?>" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="<?php echo e(route('profile.index')); ?>" class="d-block"><?php echo e(auth()->user()->name); ?></a>
    </div>
</div>
<?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/layouts/user_panel.blade.php ENDPATH**/ ?>