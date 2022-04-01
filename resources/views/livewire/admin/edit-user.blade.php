<div>
    {{-- <a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a> --}}

    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Editar
      </button> --}}

      <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="name" placeholder="" value="{{$nombre}}">

                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <input type="text" class="form-control" id="email" value="{{$email}}">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" wire:click="resetInputFields" data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>

</div>
