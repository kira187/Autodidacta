<div>
    @if ($lesson->resource)
    <div class="flex justify-between items-center">
        <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i> {{ $lesson->resource->url}}</p>
        <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
    </div>
    @else
        <form wire:submit.prevent="save">
            <div class="flex items-center">
                <input wire:model="file" type="file" class=" flex-1 border">
                <button type="submit" class="btn-sm btn-primary text-sm ml-2">Guardar</button>
            </div>

            <div class="text-gray-500 font-semibold mt-1" wire:loading wire:target="file">
                Cargando...
            </div>

            @error('file')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </form>
    @endif
</div>