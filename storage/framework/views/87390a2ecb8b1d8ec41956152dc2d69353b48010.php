<?php $__env->startSection('title'); ?>
    <title>SMKK | Debet&Kredit</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Kategori Aset</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Aset' => 'Aset'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="card card-primary col-md-10">
        <div class="card-header">
            <h5 class="card-title" >Tambah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="<?php echo e(route("asset_categories.store")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                    <?php echo $__env->make('backend.include.asset_categories_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('child-scripts'); ?>
    <script>
        $(function(){
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/mosque_asset/categories/create.blade.php ENDPATH**/ ?>