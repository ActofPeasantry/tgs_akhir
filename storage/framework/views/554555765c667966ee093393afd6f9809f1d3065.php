<?php $__env->startSection('title'); ?>
    <title>SMKK | Debet&Kredit</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Kategori Debet & Kredit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Debet & Kredit' => 'Debet & Kredit'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="card">
        <div class="card-header">
            <h5 class="card-title">Daftar kategori</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Nama Kategori</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $b_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                            <td><?php echo e($b_category->category_name); ?></td>
                            <td class="text-center">
                                <a class='btn btn-warning' href="<?php echo e(route('balance_categories.edit', [$b_category->id])); ?>">Edit</a>
                                <form action="<?php echo e(route('balance_categories.destroy', [$b_category->id])); ?>" method="post" style="display: inline">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button onclick="return confirm('Menghapus kategori akan menghapus data debet dan kredit pada kategori tersebut. Apakah anda yakin?')" class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
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

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/balance/categories/index.blade.php ENDPATH**/ ?>