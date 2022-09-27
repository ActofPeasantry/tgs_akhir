<?php $__env->startSection('title'); ?>
    <title>SMKK | Debet&Kredit</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Debet & Kredit</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Debet & Kredit' => 'Debet & Kredit'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   <div class="card">
        <div class="card-header">
            <h5>Daftar Pembukuan</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Tgl Input</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No. Invoice</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Keterangan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kategori</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal Diterima</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Debet (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">kredit (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Saldo (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                <?php echo e($balance->created_at->format('d F Y')); ?> <br>
                                <?php echo e($balance->created_at->format('H:i:s')); ?> <br>
                            </td>
                            <td><?php echo e($balance->no_invoice); ?></td>
                            <td><?php echo e($balance->description); ?></td>
                            <td><?php echo e($balance->BalanceCategories->category_name); ?></td>
                            <td><?php echo e($balance->date_received->format('d F Y')); ?></td>
                            <?php if($balance->debit_credit == 0): ?>
                                <td><?php echo e($balance->total_amount); ?></td>
                                <td>0</td>
                                <td><?php echo e($balance->total_amount); ?></td>
                            <?php else: ?>
                                <td>0</td>
                                <td><?php echo e($balance->total_amount); ?></td>
                                <td>-<?php echo e($balance->total_amount); ?></td>
                            <?php endif; ?>
                            <td class="text-center">
                                <a class='btn btn-warning' href="<?php echo e(route('balance.edit', [$balance->id])); ?>">Edit</a>
                                <form action="<?php echo e(route('balance.destroy', [$balance->id])); ?>" method="post" style="display: inline">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button onclick="return confirm('Yakin?')" class="btn btn-danger" type="submit">Delete</button>
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

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/balance/index.blade.php ENDPATH**/ ?>