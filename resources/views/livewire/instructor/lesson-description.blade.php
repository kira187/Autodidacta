<div>
    @if ($lesson->description)
    <form wire:submit.prevent="update">
        <textarea wire:model="description.name" rows="5" class="form-input w-full border"></textarea>

        @error('description.name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

        <div class="flex justify-end mt-4">
            <button type="sumbit" class="btn-sm btn-primary">Actualizar</button>
            <button type="button" class="btn-sm btn-danger ml-2" wire:click="destroy({{$lesson}})">Eliminar</button>
        </div>
    </form>
    @else
        <div >
            <textarea wire:model="name" class="form-input w-full border" placeholder="Agrege una descripción de la lección..."></textarea>

            @error('name')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-2">
                <button type="sumbit" class="btn-sm btn-primary text-sm ml-2" wire:click="store">Agregar</button>
            </div>
        </div>
@endif
</div>
