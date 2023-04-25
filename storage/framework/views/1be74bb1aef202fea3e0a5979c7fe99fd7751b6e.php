<?php $__env->startSection('title'); ?>
    <title>SMKK | Laporan Keuangan</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Laporan Keuangan</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Laporan Keuangan' => 'Laporan Keuangan'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-box">
            <form action="<?php echo e(route("balance.search")); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="text-center mt-5">
                <div class="form-group">
                    <div class="row">
                        <h5 class="col-2 mt-1">Pilih Data</h5>
                        <div class="col-4 ">
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Bulan</span>
                                </div>
                                <select class="custom-select" name="month[]" id="month">
                                    <?php $__currentLoopData = monthNameArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $month_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value); ?>" <?php echo e($month == $value ? 'selected' : ''); ?> ><?php echo e($month_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Tahun</span>
                                </div>
                                <select class="custom-select" name="year[]" id="year">
                                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year_list => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value); ?>" <?php echo e($value == $year ? 'selected' : ''); ?> ><?php echo e($value); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="input-group">
                                <button id="search_button" name="search_button" class="btn btn-primary btn-sm waves-effect waves-light btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="card-body">
            <div class="text-center">
                <div class="row">
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                            <h3 class="m-b-10 text-success"><b><?php echo e(balanceFormat($sum_debit)); ?></b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Debet</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                           <h3 class="m-b-10 text-danger"><b><?php echo e(balanceFormat($sum_credit)); ?></b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Total Kredit</p>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-4">
                        <div class="m-t-20 m-b-20">
                            <h3 class="m-b-10 text-primary"><b><?php echo e(balanceFormat($total_sum)); ?></b></h3>
                            <p class="text-uppercase m-b-5 font-13 font-600">Sisa Saldo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Daftar Pembukuan</h5>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">Tgl Input</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Deskripsi</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Kategori</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">No. Invoice</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Tanggal Diterima</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Debet (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">kredit (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Saldo (Rp)</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $balances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $balance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="">
                            <td class="dtr-control sorting_1 text-center" tabindex="0">
                                <?php echo e($balance->created_at->format('d F Y')); ?> <br>
                                <?php echo e($balance->created_at->format('H:i:s')); ?>

                            </td>
                            <td><?php echo e($balance->description); ?></td>
                            <td><?php echo e($balance->BalanceCategories->category_name); ?></td>
                            <td><?php echo e($balance->no_invoice); ?></td>
                            <td><?php echo e($balance->date_received->format('d F Y')); ?></td>
                            <?php if($balance->debit_credit == 0): ?>
                                <td><?php echo e(balanceFormat($balance->total_amount)); ?></td>
                                <td>0</td>
                                <td><?php echo e(balanceFormat($balance->total_amount)); ?></td>
                            <?php else: ?>
                                <td>0</td>
                                <td><?php echo e(balanceFormat($balance->total_amount)); ?></td>
                                <td> - <?php echo e(balanceFormat($balance->total_amount)); ?></td>
                            <?php endif; ?>
                            <td class="text-center">
                                <a class='btn btn-warning' href="<?php echo e(route('balance.edit', [$balance->id])); ?>">Edit</a>
                                <form action="<?php echo e(route('balance.destroy', [$balance->id])); ?>" method="post" style="display: inline">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button class="btn btn-danger show_confirm" data-toggle="tooltip">Delete</button>
                                    
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
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function search(){
            var month = $('#month').val();
            var year = $('#year').val();
            $.ajax({
                type: "Get",
                url: "<?php echo e(url('balance/search')); ?>",
                data: "month" +month
            })
        }
    </script>
    <?php echo $__env->make('backend.include.alert.toastr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backend.include.alert.swalert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/balance/index.blade.php ENDPATH**/ ?>