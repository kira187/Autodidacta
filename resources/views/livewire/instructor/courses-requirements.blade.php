<section>
    <h1 class="text-2xl font-bold"> REQUERIMIENTOS DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->requirements as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($requirement->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="requirement.name" class="form-input w-full">

                        @error('requirement.name')
                            <span class="text-xs text-red-500">{{ $message }}</span>                            
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1> {{ $item->name }} </h1>
                        <div>
                            <i class="fas fa-edit text-blue-500 cursor-pointer" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-trash text-red-500 cursor-pointer ml-2" wire:click="confirmRequirementDeletion({{ $item }})" wire:loading.attr="disabled"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full" placeholder="Agregar el nombre de un requermiento">

                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>    
                @enderror

                <div class="flex justify-end mt-4">
                    <button type="submit" class="btn-sm btn-primary "><i class="fas fa-tasks"></i> Agregar Requerimiento</button>
                </div>
            </form>
        </div>
    </article>

    <x-jet-dialog-modal wire:model="confirmingRequirementDeletion">
        <x-slot name="title">
            Eliminar Requerimiento
        </x-slot>
        <x-slot name="content">
            Estas seguro que deseas eliminar el requerimiento ?
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingRequirementDeletion', false)" wire:loading.attr="disabled"> Mantenerlo </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="deleteRequirement({{ $confirmingRequirementDeletion }})" wire:loading.attr="disabled">Eliminar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</section>