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
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label>Titulo: </label>
                            <input type="text" id="turno-title" class="form-control">		
                        </div>
                        <div class="form-group col-md-4">
                            <label>Hora: </label>
                            <input type="time" id="turno-start" class="form-control" name="appt" min="08:00" max="20:00" required>      		
                        </div>
                    </div>
                  <!-- aca enpeza lo mio jajajaj   -->
                    
                    <label>Descripcion:</label>
                    <br>
                    <textarea id="description-form" class="form-control" maxlength="65535"></textarea>
                    <br>
                    <label>Tamaño del animal:</label>
                    <br>
                    <form id="animal-size-form" class="form-group col-md-12">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1"  value="pequeño" name="animal-size"  class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Pequeño</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2"  value="mediano" name="animal-size" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Mediano</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3"  value="grande" name="animal-size" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Grande</label>
                        </div>
                    </form>

                    <label>Tipo de servicio:</label>
                    <br>
                    <form id="type-service-form" class="form-group col-md-12">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" value="baño" name="type-service" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline4">Baño</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline5" value="corte" name="type-service" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline5">Corte</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline6" value="ambos" name="type-service" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline6">Ambos</label>
                        </div>
                    </form>

                    <label>Estado del servicio:</label>
                    <br>
                    <form id="state-form" class="form-group col-md-12">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline7" value="en_curso" name="state" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline7">En curso</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline8" value="finalizado" name="state" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline8">Finalizado</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline9" value="cancelado" name="state" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline9">Cancelado</label>
                        </div>
                    </form>

                    <!-- acatermina lo mio -->


                </div>
                <div class="modal-footer">
                    <button type="button" id="turno-confirm" class="btn btn-success">Agregar</button>
                    <!-- ale -->
                    <button type="button" id="turno-update" class="btn btn-warning">Modificar</button>
                    <button type="button" id="turno-delete" class="btn btn-danger">Eliminar</button>
                    <!-- ale -->
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
                </div>
            </div>
        </div>
    </div>
</div>