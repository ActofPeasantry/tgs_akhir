<?php $__env->startSection('title'); ?>
    <title>SMKK | Debet&Kredit</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Aset Masjid</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Aset Masjid' => 'Aset Masjid'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Aset</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Kategori Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Jumlah Aset</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $assets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($asset->submission_status == config('constants.submission_status.accepted')): ?>
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                <?php echo e($asset->asset_name); ?> <br>
                            </td>
                            <td class="dtr-control sorting_1 text-center"><?php echo e($asset->AssetCategory->category_name); ?></td>
                            <td class="dtr-control sorting_1 text-center"><?php echo e($asset->totalAsset($asset->id)); ?></td>

                            <td class="text-center">
                                <a class='btn btn-primary' href="<?php echo e(route('asset.show', [$asset->id])); ?>">Detail</a>
                                <a class='btn btn-warning' href="<?php echo e(route('asset.edit', [$asset->id])); ?>">Edit</a>
                                <form action="<?php echo e(route('asset.destroy', [$asset->id])); ?>" method="post" style="display: inline">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button onclick="return confirm('Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
              </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('child-scripts'); ?>
    <script>
        $(function(){
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/mosque_asset/index.blade.php ENDPATH**/ ?>