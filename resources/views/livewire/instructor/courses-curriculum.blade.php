<div>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <h1 class="text-2xl font-bold uppercase">Lecciones del curso</h1>
    <hr class="mt-2 mb-6">
    
    @foreach ($course->sections as $item)
        <article class="card mb-6">
            <div class="card-body bg-gray-100">                
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" type="text" class="form-input w-full" placeholder="Ingrese el nombre de la sección">
                        @error('section.name')
                            <span class="text-xs text-red-600 font-bold">{{$message}}</span>
                        @enderror
                    </form>
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Sección:</strong> {{$item->name}}</h1>
                        <div>                        
                            <button class="p-1 focus:outline-none text-teal-500 hover:text-teal-600" wire:click="edit({{ $item }})">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            
                            <button class="cursor-pointer p-1 focus:outline-none text-red-500 hover:text-red-600" wire:click="destroy({{ $item }})">
                                <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </header>    
                @endif
                
            </div>
        </article>
    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva sección
        </a>
        
        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4"> Agregar nueva sección</h1>

                <div>
                    <input wire:model="name" type="text" class="form-input w-full" placeholder="Escriba el nombre de la sección">
                    @error('name')
                        <span class="text-xs text-red-600 font-bold">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>
