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
   <div class="card card-primary">
        <div class="card-header">
            <h5 class="card-title">Tambah Data</h5>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <form action="<?php echo e(route("balance.store")); ?>" method="POST">
                <?php echo csrf_field(); ?>
                    <?php echo $__env->make('backend.include.balance_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('child-scripts'); ?>
    <script type="text/javascript">
        $(function () {
            $('#dtp_date_received').datetimepicker({format:'DD-MM-YYYY', locale:'id'});
        });
    </script>
    
    <script>
        // Jquery Dependency

        $("#total_amount").on({
            keyup: function () {
                formatCurrency($(this));
                $('#hidden_total_amount').val($('#total_amount').val().replace(/\D/g, ""));
                console.log($('#total_amount').val().replace(/\D/g, ""));
            }
        });

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatCurrency(input) {
            // get input value
            var input_val = input.val();
            // don't validate empty input
            if (input_val === "") {
                return;
            }

            // no decimal entered
            // remove all non-digits
            input_val = formatNumber(input_val);
            input_val = "Rp " + input_val;

            // send updated string to input
            input.val(input_val);
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts/main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/backend/balance/create.blade.php ENDPATH**/ ?>