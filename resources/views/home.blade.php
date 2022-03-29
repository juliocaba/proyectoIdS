
@include('layouts.heads')
@extends('layouts.app')

@section('content')
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection

<script>
    $(document).ready(function () {
        
        let SITEURL = '{{ url("/") }}';
        
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let element = document.getElementById('calendar');
        let calendar = new FullCalendar.Calendar(element, {
            locale: 'es',
            editable: false,
            height: 512,
            initialView: 'timeGridWeek',
            headerToolbar: { 'end': '' },
            allDaySlot: false,
            expandRows: true,
            nowIndicator: true,
            slotMinTime: "08:00:00",
            slotMaxTime: "21:00:00",
            selectable: true,
            events: SITEURL + '/fullcalender',
            themeSystem: 'bootstrap',
        });
        
        calendar.render();
    });
      
</script>