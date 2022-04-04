<div>
    {{-- <a name="" id="" class="btn btn-primary" href="#" role="button">Editar</a> --}}

    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Editar
      </button> --}}
      <button type="button" class="btn btn-primary fa-solid fa-pen-to-square" data-bs-toggle="modal"  data-bs-target="#exampleModal">
        EDT
      </button>
      <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form>
                <div class="mb-3">
                  <label for="recipient-name" class="col-form-label">Nombre:</label>
                  <input type="text"class="form-control" id="name" placeholder="" wire:model="user.name">

                </div>
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <input type="text"  class="form-control" id="email"  placeholder="" wire:model="user.email" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" class="disabled:opacity-50" wire:click="saveUser">Guardar</button>
            </div>
          </div>
        </div>
      </div>

</div>
