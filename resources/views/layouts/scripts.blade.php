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
            themeSystem: 'bootstrap',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            select: function (data) {
                //$('#eventModal').modal({});
                let title = prompt('Event Title:');

                if (title) {
                    let start = sqlDate(data.start);
                    let end = sqlDate(data.end);
                    let allDay = data.allDay;

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            title: title,
                            start: start,
                            end: end,
                            type: 'add'
                        },
                        type: 'POST',
                        success: function (data) {
                            calendar.getEventSources()[0].refetch();
                            calendar.unselect();
                        }
                    });
                }
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
        toastr.success(message, 'Event');
    } 
      
    </script>