<section>
    <h1 class="text-2xl font-bold"> AUDIENCIA DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->audience as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($audience->id == $item->id)
                    <form wire:submit.prevent="update">
                        <x-input type="text" class=" w-full" wire:model="audience.name"/>
                        <x-jet-input-error for="audience.name" class="mt-2" />
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1> {{ $item->name }} </h1>
                        <div>
                            <i class="fas fa-edit text-gray-600 cursor-pointer" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-trash text-red-600 cursor-pointer ml-2" wire:click="destroy({{ $item }})"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <x-input type="text" class="mt-1 block w-full" wire:model="name" placeholder="Audiencia a la que va dirigido"/>
                <x-jet-input-error for="name" class="mt-2" />
                <div class="flex justify-end mt-4">
                    <x-jet-button type="submit"><i class="fas fa-users mr-1"></i> Agregar audiencia</x-jet-button>
                </div>
            </form>
        </div>
    </article>
</section>