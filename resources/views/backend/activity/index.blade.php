@extends('layouts/main')

@section('title')
    <title>SMKK | Debet&Kredit</title>
@endsection

@section('page_name')
    <h1>Kegiatan Masjid</h1>
@endsection

@section('breadcrumb')
    {{-- Custom helpers, cek app/Helpers/helpers.php dan composer.json di bagian file jalankan composer dump-autoload utk memakainya --}}
    {!!
        breadcrumb([
            'Kegiatan Masjid' => 'Kegiatan Masjid'
        ])
    !!}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <div class="card card-primary">
                <div class="card-body p-0">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
      <!-- /.content -->

    @include('backend.include.modal.activity_detail_modal')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
@endsection

@push('child-scripts')
    {{-- <script>
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
    </script> --}}

<!-- Page specific script -->
<script>
    $(function () {

      /* initialize the external events
       -----------------------------------------------------------------*/
    //   function ini_events(ele) {
    //     ele.each(function () {

    //       // create an Event Object (https://fullcalendar.io/docs/event-object)
    //       // it doesn't need to have a start or end
    //       var eventObject = {
    //         title: $.trim($(this).text()) // use the element's text as the event title
    //       }

    //       // store the Event Object in the DOM element so we can get to it later
    //       $(this).data('eventObject', eventObject)

    //       // make the event draggable using jQuery UI
    //       $(this).draggable({
    //         zIndex        : 1070,
    //         revert        : true, // will cause the event to go back to its
    //         revertDuration: 0  //  original position after the drag
    //       })

    //     })
    //   }

    //   ini_events($('#external-events div.external-event'))

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

      // initialize the external events
      // -----------------------------------------------------------------

      // new Draggable(containerEl, {
      //   itemSelector: '.external-event',
      //   eventData: function(eventEl) {
      //     return {
      //       title: eventEl.innerText,
      //       backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      //       borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
      //       textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
      //     };
      //   }
      // });

      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left  : 'prev,next today',
          center: 'title',
          right : 'dayGridMonth,timeGridWeek,timeGridDay'
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
    //   $('#calendar').fullCalendar()
    })
</script>
@endpush
