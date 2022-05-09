<div>
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 items-center">
        <div class="mb-8">
          <label class="block text-gray-700 text-sm font-bold mb-3" >
              {{ $title }}
          </label>

          <label class="block text-gray-700 text-sm font-bold mb-3">
            Nombre del tratamiento
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tratamientos" type="text" wire:model.defer="tratamiento.nombreTratamiento">
        </div>

        <div class="mb-8">
          <label class="block text-gray-700 text-sm font-bold mb-3" >
            Duración
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="duracion" type="text" wire:model.defer="tratamiento.duracion">
        </div>

        <div class="mb-8">
            <label class="block text-gray-700 text-sm font-bold mb-3" >
              Cabina
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cabina" type="text" wire:model.defer="tratamiento.cabina">
          </div>

        <div class="flex items-center justify-between">
          <button wire:click='update' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
           Guardar
          </button>
          <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
              <button wire:click="$emit('closeModal')">Cerrar</button>
          </a>
        </div>
      </form>
</div>
