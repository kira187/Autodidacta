<section>
    <h1 class="text-2xl font-bold"> AUDIENCIA DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->audience as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="audience.name" class="form-input w-full">

                        @error('audience.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>                            
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1> {{ $item->name }} </h1>
                        <div>
                            <i class="fas fa-edit text-blue-500 cursor-pointer" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-trash text-red-500 cursor-pointer ml-2" wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full" placeholder="Agregar la audiencia del curso">

                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>    
                @enderror

                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn-sm btn-primary "><i class="fas fa-users"></i> Agregar audiencia</button>
                </div>
            </form>
        </div>
    </article>
</section>