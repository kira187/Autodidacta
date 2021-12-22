<div>
    @foreach ($section->lessons as $item)
        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">

                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <x-jet-label for="lesson.name" value="Nombre" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="lesson.name" />
                        <x-jet-input-error for="lesson.name" class="mt-2" />
                                                
                        <div class="text-gray-700 my-4">
                            <label class="block mb-1">Plataforma</label>
                            <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-jet-label for="lesson.url" value="URL del video" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="lesson.url" />
                        <x-jet-input-error for="lesson.url" class="mt-2" />

                        <div class="mt-4 flex justify-center sm:justify-end">
                            <x-jet-button type="submit"> Actualizar</x-jet-button>
                            <x-jet-danger-button type="button" class="ml-2" wire:click="cancel">Cancelar </x-jet-danger-button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-700 mr-1"></i> Lección: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">
                        <div 
                        x-data="{
                            openTab: 1,
                            activeClasses: 'text-white bg-blue-500',
                            inactiveClasses: 'text-gray-600 bg-white hover:text-blue-500'
                        }"

                        class="flex flex-wrap">
                            <div class="w-full">
                              <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                                <li @click="openTab = 1" class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                  <a :class="openTab === 1 ? activeClasses : inactiveClasses" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal cursor-pointer">
                                    <i class="fas fa-video text-base mr-1"></i>  Video
                                  </a>
                                </li>
                                <li @click="openTab = 2" class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                  <a :class="openTab === 2 ? activeClasses : inactiveClasses" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal cursor-pinter" >
                                    <i class="fas fa-align-left text-base mr-1"></i>  Descripción
                                  </a>
                                </li>

                                <li @click="openTab = 3" class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                                  <a :class="openTab === 3 ? activeClasses : inactiveClasses" class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal cursor-pointer">
                                    <i class="fas fa-file-archive text-base mr-1"></i>  Recursos
                                  </a>
                                </li>
                              </ul>
                              <div class="relative flex flex-col min-w-0 break-words bg-white w-full">
                                <div class="px-4 py-5 flex-auto">
                                  <div class="tab-content tab-space">
                                    <div x-show="openTab === 1">
                                        <p class="text-sm"> <strong>Plataforma:</strong> {{$item->platform->name}} </p>
                                        <p class="text-sm"> <strong>Enlace:</strong> <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>
                
                                        <div class="flex justify-end mt-4">
                                            <button class="btn-sm btn-primary text-sm" wire:click="edit({{$item}})" >Editar</button>
                                            <button class="btn-sm btn-danger text-sm ml-2" wire:click="destroy({{$item}})">Eliminar</button>
                                        </div>
                                    </div>
                                    <div x-show="openTab === 2" class="mb-4">
                                        @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description' .$item->id))
                                    </div>
                                    <div x-show="openTab === 3" class="mb-4">
                                        @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources' .$item->id))
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                    </div>
                @endif
            </div>
        </article>
    @endforeach

    <div class="mt-4" x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva lección
        </a>
        
        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4"> Agregar nueva lección</h1>
                
                <div>
                    <div class="md:flex md:items-center">
                        <label for="" class="w-32">Nombre:</label>
                        <input wire:model="name" type="text" class="form-input w-full border">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror

                    <div class="md:flex md:items-center mt-4">
                        <label for="" class="w-32">Plataforma: </label>
                        <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('platform_id')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror

                    <div class="md:flex md:items-center mt-4">
                        <label for="" class="w-32">URL:</label>
                        <input wire:model="url" type="text" class="form-input w-full border">
                    </div>

                    @error('url')
                        <span class="text-xs text-red-700">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mt-4 flex justify-end">
                    <button class="btn-sm btn-danger" x-on:click="open = false">Cancelar</button>
                    <button class="btn-sm btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>
</div>