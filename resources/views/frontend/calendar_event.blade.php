@extends('layouts.master')
@section('content')

<section class="about-section pos-rel pb-4 pt-4 " style="background: url('{{ asset('public/frontend_assets/css/img/teacher-bg.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container">
        <h3 class="cute text-center"><span style="border-bottom: 2px solid rgb(3, 3, 3); ">Calendar Events</span></h3><br>
        <div id='calendar' class="p-4" style="margin:0 auto; box-shadow: rgb(131 125 125) 1px 0px 8px 9px; background: rgba(0, 0, 0, 0.06);">
          
        </div>
    </div>
</section>

@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        calendarEl.style.width = '100%';
        calendarEl.style.height = '40%'; 
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            eventClick: function(info) {
                alert('Full Text: ' + info.event.extendedProps.description);
            },
            events: {!! json_encode($formattedEvents) !!},
        });
        calendar.render();
    });
</script>
    

