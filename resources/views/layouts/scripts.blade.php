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
            height: 512,
            editable: true,
            initialView: 'dayGridMonth',
            selectable: true,
            events: SITEURL + '/fullcalender',
            timeZone: 'local',
            themeSystem: 'bootstrap',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            dateClick: function (data) {
                $('#eventModal').modal({});

                $('#turno-confirm').unbind('click');
                $('#turno-confirm').on('click', function(event) {
                    let title = $('#turno-title').val();
                    let startTime = $('#turno-start').val();

                    if (title && startTime) {
                        let today = data.date;

                        startTime = startTime.split(':');
                        let hours = parseInt(startTime[0]);
                        let minutes = parseInt(startTime[1]);

                        let start = new Date(today);
                        let end = new Date(today);
                        start.setHours(hours);
                        start.setMinutes(minutes);
                        end.setHours(hours + 1);
                        end.setMinutes(minutes);

                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: title,
                                start: sqlDate(start),
                                end: sqlDate(end),
                                type: 'add'
                            },
                            type: 'POST',
                            success: function (data) {
                                $('#eventModal').modal('hide');
                                $('#turno-title').val("");
                                $('#turno-start').val("");

                                calendar.getEventSources()[0].refetch();
                                calendar.unselect();
                            }
                        });
                    }
                });
            },
            eventDrop: function (data) {
                let event = data.event;

                let start = sqlDate(event.start);
                let end = sqlDate(event.end);
                let title = event.title;
                let id = event.id;

                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        title: event.title,
                        start: start,
                        end: end,
                        type: 'update'
                    },
                    type: 'POST',
                    success: function (response) {
                        calendar.getEventSources()[0].refetch();
                        displayMessage('Turno actualizado correctamente');
                    }
                });
            },
            eventClick: function (data) {
                let event = data.event;
                let deleteMsg = confirm('¿Deseas borrar el turno?');
                console.log(event);
                if (deleteMsg) {
                    $.ajax({
                        type: 'POST',
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.getEventById(event.id).remove();
                            displayMessage('Turno eliminado correctamente');
                        }
                    });
                }
            }
        });
        
        calendar.render();
    });

    function sqlDate(date) {
        return date.toISOString().slice(0, 19).replace('T', ' ');
    }
     
    function displayMessage(message) {
        toastr.success(message, 'Actualización');
    } 
      
    </script>