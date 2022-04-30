<script>
    let SITEURL = '{{ url("/") }}';
    let calendar = {};

    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let element = document.getElementById('calendar');
        calendar = new FullCalendar.Calendar(element, {
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
            businessHours: [ // specify an array instead
                {
                    daysOfWeek: [ 1, 2, 3 ], // Monday, Tuesday, Wednesday
                    startTime: '08:00', // 8am
                    endTime: '18:00' // 6pm
                },
                {
                    daysOfWeek: [ 4, 5 ], // Thursday, Friday
                    startTime: '10:00', // 10am
                    endTime: '16:00' // 4pm
                }
            ],
            dateClick: function (data) {
                eventModal(data.event, data, 'add');
            },
            eventClick: function (data) {
                setFormData(data.event);
                eventModal(data.event, data, 'edit');
            },
            eventDrop: function (data) {
                moveEvent(data.event);
            },
        });
        
        calendar.render();
    });

    function eventModal(event, data, action) {
        $('#eventModal').modal({});
        $('#turno-confirm').unbind('click');
        $('#turno-update').unbind('click');
        $('#turno-delete').unbind('click');
        $('#turno-cancel').unbind('click');

        if (action == 'add') {
            $('#turno-confirm').show();
            $('#turno-update').hide();
            $('#turno-delete').hide();
            $('#state-form').hide();

            $('#turno-confirm').on('click', function() {
                let form = getFormData();

                if (!(form.title && form.hours && form.minutes)) {
                    errorMessage('Se necesita especificar el título y la hora.');
                    return;
                }

                let today = data.date;
                let start = new Date(today);
                let end = new Date(today);
                start.setHours(form.hours);
                start.setMinutes(form.minutes);
                end.setHours(form.hours + 1);
                end.setMinutes(form.minutes);

                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        title: form.title,
                        start: sqlDate(start),
                        end: sqlDate(end),
                        typeService: form.typeService,
                        animalSize: form.animalSize,
                        state: 'en_curso',
                        description: form.description,
                        type: 'add'
                    },
                    type: 'POST',
                    success: function (data) {
                        $('#eventModal').modal('hide');
                        clearFormData();

                        successMessage('Turno añadido correctamente.');
                        calendar.getEventSources()[0].refetch();
                        calendar.unselect();
                    },
                    error: function (data) {
                        errorMessage('Error del servidor.');
                    }
                });
            });
        }

        if (action == 'edit') {
            $('#turno-confirm').hide();
            $('#turno-update').show();
            $('#turno-delete').show();
            $('#state-form').show();

            $('#turno-update').on('click', function() {
                let event = data.event;
                let form = getFormData();

                if (!(form.title && form.hours && form.minutes)) {
                    errorMessage('Se necesita especificar el título y la hora.');
                    return;
                }

                let start = event.start;
                let end = event.end;
                start.setHours(form.hours);
                start.setMinutes(form.minutes);
                end.setHours(form.hours + 1);
                end.setMinutes(form.minutes);

                $.ajax({
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        title: form.title,
                        start: sqlDate(start),
                        end: sqlDate(end),
                        typeService: form.typeService,
                        animalSize: form.animalSize,
                        state: form.state,
                        description: form.description,
                        type: 'update'
                    },
                    type: 'POST',
                    success: function (data) {
                        $('#eventModal').modal('hide');
                        clearFormData();

                        successMessage('Turno actualizado correctamente.');
                        calendar.getEventSources()[0].refetch();
                        calendar.unselect();
                    },
                    error: function (data) {
                        errorMessage('Error del servidor.');
                    }
                });
            });

            $('#turno-delete').on('click', function() {
                let event = data.event;
                let delConfirm = confirm('¿Desea borrar el turno?');

                if (!(delConfirm)) {
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        type: 'delete'
                    },
                    success: function (response) {
                        $('#eventModal').modal('hide');
                        clearFormData();

                        successMessage('Turno eliminado correctamente.');
                        calendar.getEventById(event.id).remove();
                    },
                    error: function (data) {
                        errorMessage('Error del servidor.');
                    }
                });
            });

            $('#turno-cancel').on('click', function() {
                clearFormData();
            });
        }
    }

    function moveEvent(event) {
        $.ajax({
            url: SITEURL + '/fullcalenderAjax',
            data: {
                id: event.id,
                title: event.title,
                start: sqlDate(event.start),
                end: sqlDate(event.end),
                typeService: event.extendedProps['type_service'],
                animalSize: event.extendedProps['animal_size'],
                state: event.extendedProps['state'],
                description: event.extendedProps['description'],
                type: 'update'
            },
            type: 'POST',
            success: function (response) {
                successMessage('Turno movido correctamente.');
                calendar.getEventSources()[0].refetch();
            }
        });
    }

    function getFormData() {
        let title = $('#turno-title').val();
        let startTime = $('#turno-start').val().split(':');
        let typeService = $('input[name=type-service]:checked', '#type-service-form').val();
        let animalSize = $('input[name=animal-size]:checked', '#animal-size-form').val();
        let state = $('input[name=state]:checked', '#state-form').val();
        let description = $('#description-form').val();

        return {
            title: title,
            hours: parseInt(startTime[0]),
            minutes: parseInt(startTime[1]),
            description: description,
            typeService: typeService,
            animalSize: animalSize,
            state: state
        }
    }

    function setFormData(event) {
        let hours = event.start.getHours().toString().padStart(2, '0');
        let minutes = event.start.getMinutes().toString().padStart(2, '0');
        $('#turno-start').val(`${hours}:${minutes}`);

        $('#turno-title').val(event.title);
        $('#description-form').val(event.extendedProps['description']);
        $('input[name=animal-size]', '#animal-size-form').val([event.extendedProps['animal_size']]);
        $('input[name=type-service]', '#type-service-form').val([event.extendedProps['type_service']]);
        $('input[name=state]', '#state-form').val([event.extendedProps['state']]);
    }

    function clearFormData(event) {
        $('#turno-title').val('');
        $('#turno-start').val('');
        $('#description-form').val('');
        $('input[name=animal-size]', '#animal-size-form').val(['pequeño']);
        $('input[name=type-service]', '#type-service-form').val(['baño']);
        $('input[name=state]', '#state-form').val(['en_curso']);
    }

    function sqlDate(date) {
        return date.toISOString().slice(0, 19).replace('T', ' ');
    }
     
    function successMessage(message) {
        toastr.success(message, 'Actualización');
    }

    function errorMessage(message) {
        toastr.error(message, 'Error');
    } 
      
</script>