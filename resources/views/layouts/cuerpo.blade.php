<div class="container">
    <h1>Turnos</h1>
    <div id='calendar'></div>
    <div class="modal fade" id="eventModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEvento"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-8">
                        <label>Titulo: </label>
                        <input type="text" id="turno-title" class="form-control">		
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora: </label>
                        <input type="time" id="turno-start" class="form-control" name="appt" min="08:00" max="20:00" required>      		
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="turno-confirm" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
                </div>
            </div>
        </div>
    </div>
</div>