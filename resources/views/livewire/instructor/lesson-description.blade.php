<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open"class="cursor-pointer">Descripción de la lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" class="form-input w-full"></textarea>

                        @error('description.name')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button type="button" class="btn-sm btn-danger" wire:click="destroy({{$lesson}})">Eliminar</button>
                            <button type="sumbit" class="btn-sm btn-primary ml-2">Actualizar</button>
                        </div>
                    </form>
                    @else
                        <div >
                            <textarea wire:model="name" class="form-input w-full" placeholder="Agrege una descripción de la lección..."></textarea>

                            @error('name')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror

                            <div class="flex justify-end mt-2">
                                <button type="sumbit" class="btn-sm btn-primary text-sm ml-2" wire:click="store">Agregar</button>
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </article>
</div>
