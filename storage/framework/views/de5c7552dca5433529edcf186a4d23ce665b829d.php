<?php $__env->startSection('title'); ?>
    <title>SMKK | Dashboard</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_name'); ?>
    <h1>Dashboard</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    
    <?php echo breadcrumb([
            'Dashboard' => 'Dashboard'
        ]); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo e($s_male); ?></h3>

          <p>Jumlah Santri Laki-Laki</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?php echo e($s_female); ?></h3>

          <p>Jumlah Santri Perempuan</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?php echo e($s_total); ?></h3>

          <p>Total Santri</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?php echo e($jamaah); ?></h3>

          <p>Total Jamaah</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <!-- BAR CHART -->
    <section class="col-lg-12">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Data Keuangan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="chart">
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
            <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 col-8">
                    <div class="description-block border-right">
                      
                      <h5 class="description-header text-success"><?php echo e(balanceFormat($sum_debit)); ?></h5>
                      <span class="description-text">Total Debet</span>
                    </div>
                  </div>

                  <div class="col-sm-4 col-8">
                    <div class="description-block border-right">
                      
                      <h5 class="description-header text-danger"><?php echo e(balanceFormat($sum_credit)); ?></h5>
                      <span class="description-text">Total Kredit</span>
                    </div>
                  </div>

                  <div class="col-sm-4 col-8">
                    <div class="description-block">
                      
                      <h5 class="description-header text-primary"><?php echo e(balanceFormat($total_sum)); ?></h5>
                      <span class="description-text">Sisa Saldo</span>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

    <!-- Right col -->
    <section class="col-lg-8 connectedSortable">
      <!-- Calendar -->
      <div class="card card-info">
          <div class="card-header border-0">

            <h3 class="card-title">
              <i class="far fa-calendar-alt"></i>
              Calendar
            </h3>
            <!-- tools card -->
            <div class="card-tools">
              <button type="button" class="btn btn-info btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-info btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.card-header -->
          <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Right col -->

    <!-- DONUT CHART -->
    <section class="col-lg-4">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Jumlah Aset Masjid</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </section>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('child-scripts'); ?>
    <script>
        $(function () {
            /* initialize the calendar
            -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            // var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');
            var activities = <?php echo json_encode($events, 15, 512) ?>;
            //   var modal = document.getElementById('modal-xl')
            console.log(activities);

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : '',
                },
                aspectRatio: 2.5,
                themeSystem: 'bootstrap',
                events: activities,
                // testing seeding event form db
                // event:
                editable  : false,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                drop      : function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
                },
            });

            calendar.render();
            $('#calendar').fullCalendar()
        })
    </script>

    <!-- Page specific script -->
    <script>
        $(function () {
            var d_data = <?php echo json_encode($debit_data, 15, 512) ?>;
            var c_data = <?php echo json_encode($credit_data, 15, 512) ?>;

            var asset_labels = <?php echo json_encode($asset_labels, 15, 512) ?>;
            var asset_data = <?php echo json_encode($asset_data, 15, 512) ?>;
            // console.log(asset_label, asset_data);

          /* ChartJS
           * -------
           * Here we will create a few charts using ChartJS
           */

          //-------------
          //- BAR CHART -
          //-------------

          var barChartData = {
            labels  : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December'],
            datasets: [
              {
                label               : 'Debet',
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : d_data
              },
              {
                label               : 'Kredit',
                backgroundColor     : 'rgba(210, 214, 222, 1)',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : c_data
              },
            ]
          }

          var barChartCanvas = $('#barChart').get(0).getContext('2d')
          var temp0 = barChartData.datasets[0]
          var temp1 = barChartData.datasets[1]
          barChartData.datasets[0] = temp1
          barChartData.datasets[1] = temp0

          var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
          }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

          //-------------
          //- DONUT CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
          var donutData        = {
            labels: asset_labels,
            datasets: [
              {
                data: asset_data,
                backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
              }
            ]
          }
          var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
          })

          //-------------
          //- PIE CHART -
          //-------------
          // Get context with jQuery - using jQuery's .get() method.
          var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
          var pieData        = donutData;
          var pieOptions     = {
            maintainAspectRatio : false,
            responsive : true,
          }
          //Create pie or douhnut chart
          // You can switch between pie and douhnut using the method below.
          new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
          })

          //---------------------
          //- STACKED BAR CHART -
          //---------------------
          var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
          var stackedBarChartData = $.extend(true, {}, barChartData)

          var stackedBarChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            scales: {
              xAxes: [{
                stacked: true,
              }],
              yAxes: [{
                stacked: true
              }]
            }
          }

          new Chart(stackedBarChartCanvas, {
            type: 'bar',
            data: stackedBarChartData,
            options: stackedBarChartOptions
          })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\informationSystemStuff\laragon\www\tugas_akhir\resources\views/dashboard.blade.php ENDPATH**/ ?>