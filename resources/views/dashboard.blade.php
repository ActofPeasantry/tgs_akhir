@extends('layouts.main')

@section('title')
    <title>SMKK | Dashboard</title>
@endsection

@section('page_name')
    <h1>Dashboard</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Dashboard' => 'Dashboard'
        ])
    !!}
@endsection

@section('content')
{{-- Main Row --}}
<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-male"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Santri Laki-Laki</span>
          <span class="info-box-number">
            {{$s_male}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-female"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Jumlah Santri Perempuan</span>
          <span class="info-box-number">{{ $s_female }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total santri TPQ</span>
          <span class="info-box-number">{{ $s_total }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-praying-hands"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Jamaah</span>
          <span class="info-box-number">{{ $jamaah }}</span>
        </div>
        <!-- /.info-box-content -->
      </div>
      <!-- /.info-box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

<div class="row">
    <!-- BAR CHART -->
    <section class="col-lg-8">
        <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title"> <i class="nav-icon fas fa-coins"></i> Laporan Keuangan Tahun Ini</h3>

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
                      {{-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> --}}
                      <h5 class="description-header text-success">{{ balanceFormat($sum_debit) }}</h5>
                      <span class="description-text">Total Debet</span>
                    </div>
                  </div>

                  <div class="col-sm-4 col-8">
                    <div class="description-block border-right">
                      {{-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> --}}
                      <h5 class="description-header text-danger">{{ balanceFormat($sum_credit) }}</h5>
                      <span class="description-text">Total Kredit</span>
                    </div>
                  </div>

                  <div class="col-sm-4 col-8">
                    <div class="description-block">
                      {{-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> --}}
                      <h5 class="description-header text-primary">{{ balanceFormat($total_sum) }}</h5>
                      <span class="description-text">Sisa Saldo</span>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>

    <!-- DONUT CHART -->
    <section class="col-lg-4">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title"> <i class="nav-icon fas fa-file"></i> Jumlah Aset Masjid</h3>

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
              <canvas id="donutChart" style="min-height: 336px; height: 336px; max-height: 336px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </section>

    <!-- Right col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Calendar -->
      <div class="card card-info">
          <div class="card-header border-0">

            <h3 class="card-title">
              <i class="far fa-calendar-alt"></i>
              Kalender Kegiatan
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
            <div style="width: 95%; height: 50%">
                <div id="calendar"></div>
            </div>
          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Right col -->

</div>

@endsection

@push('child-scripts')
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
            var activities = @json($events);
            //   var modal = document.getElementById('modal-xl')
            console.log(activities);

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : '',
                },
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
            $('#calendar').fullCalendar();
        })
    </script>

    <!-- Page specific script -->
    <script>
        $(function () {
            var d_data = @json($debit_data);
            var c_data = @json($credit_data);

            var asset_labels = @json($asset_labels);
            var asset_data = @json($asset_data);
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
                label               : 'Kredit',
                backgroundColor     : '#CAE2DC',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : c_data
              },
              {
                label               : 'Debet',
                backgroundColor     : '#5379C7',
                borderColor         : 'rgba(210, 214, 222, 1)',
                pointRadius         : false,
                pointColor          : 'rgba(210, 214, 222, 1)',
                pointStrokeColor    : '#c1c7d1',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : d_data
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
            datasetFill             : false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(value, index, values) {
                            if(parseInt(value) >= 1000){
                                return 'Rp.' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            } else {
                                return 'Rp.' + value;
                            }
                        }
                    }
                }]
            }
        }

          new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })

        const bgcolor = [];
        for(i=0; i < asset_labels.length; i++){
            const r = Math.floor(Math.random() * 255);
            const g = Math.floor(Math.random() * 255);
            const b = Math.floor(Math.random() * 255);
            console.log('rgba(' +r+ ', '+g+ ',' +b+ ', 0.2)');
            bgcolor.push('rgba(' +r+ ', '+g+ ',' +b+ ', 0.9)')
        }

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
                backgroundColor : bgcolor,
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
@endpush
