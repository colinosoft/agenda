@extends('layouts.app')
@section('content')

<div class="container">
  
   
    <!-- Modal -->
    <div class="modal fade" id="evento" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Su reserva</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="post" id="formularioCita">
                         
                        {!!  csrf_field() !!}

                        <div class="mb-3 d-none">
                          <label for="id" class="form-label ">ID</label>
                          <input type="text"
                            class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Help text</small>
                        </div>

                        
                        <div class="mb-3">
                          <label for="servicio" class="form-label"></label>
                          <select class="form-control" name="servicio" id="servicio">
                          <option>Depilación</option>
                            <option>Uñas</option>
                            <option>Laser</option>
                            <option>Rayos</option>
                            <option>Limpieza</option>
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="start" class="form-label">Incio</label>
                          <input type="datetime-local"
                            class="form-control" name="start" id="start" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Fecha y hora de incio</small>
                        </div>

                        <div class="mb-3">
                          <label for="end" class="form-label">Fin</label>
                          <input type="datetime-local"
                            class="form-control" name="end" id="end" aria-describedby="helpId" placeholder="">
                          <small id="helpId" class="form-text text-muted">Fecha y hora de fin</small>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" id="btnGuardar"   class="btn btn-success">Guardar</button>
                    <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
                    <button type="button" id="btnEliminar"  class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="agenda">
    </div>

</div>


@endsection