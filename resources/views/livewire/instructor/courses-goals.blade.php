<section>
    <h1 class="text-2xl font-bold"> METAS DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->goals as $item)
        <article class="card mb-4">
            <div class="card-body bg-gray-100">
                @if ($goal->id == $item->id)
                    <form wire:submit.prevent="update">
                        <x-input type="text" class="block w-full" wire:model="goal.name"/>
                        <x-jet-input-error for="goal.name" class="mt-2" />
                    </form>
                @else
                    <header class="flex justify-between">
                        <h1> {{ $item->name }} </h1>
                        <div>
                            <i class="fas fa-edit text-gray-600 cursor-pointer" wire:click="edit({{ $item }})"></i>
                            <i class="fas fa-trash text-red-600 cursor-pointer ml-2" wire:click="confirmGoalDeletion({{ $item }})" wire:loading.attr="disabled"></i>
                        </div>
                    </header>
                @endif
            </div>
        </article>
    @endforeach

    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <x-input type="text" class="mt-1 block w-full" wire:model="name" placeholder="Descripción de la meta"/>
                <x-jet-input-error for="name" class="mt-2" />
                <div class="flex justify-end mt-4">
                    <x-jet-button type="submit"><i class="fas fa-flag-checkered mr-1"></i> Agregar meta</x-jet-button>
                </div>
            </form>
        </div>
    </article>

    <x-jet-dialog-modal wire:model="confirmingGoalDeletion">
        <x-slot name="title">
            Eliminar Meta
        </x-slot>
        <x-slot name="content">
            Estas seguro que deseas eliminar la meta?
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingGoalDeletion', false)" wire:loading.attr="disabled"> Mantenerlo </x-jet-secondary-button>
            <x-jet-danger-button class="ml-2" wire:click="deleteGoal({{ $confirmingGoalDeletion }})" wire:loading.attr="disabled">Eliminar</x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</section>