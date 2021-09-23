<div class="my-10">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive rounded-lg shadow-md">
                {!!$currentLesson->iframe!!}
            </div>
            <div class="text-2xl text-gray-700 font-medium mt-6 text-opacity-80">
                <div class="flex items-center">
                    <svg class="mr-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    {{$currentLesson->name}}
                </div>
            </div>

            <div class="flex items-center justify-between mt-6 mb-4">
                <span class="w-full border-b dark:border-gray-600"></span>
            </div>
            <div class="grid grid-cols-3 gap-4 items-center">
                <div class="bg-white rounded-full p-2 shadow-md col-span-3 lg:col-span-1 md:col-span-2">
                    <div class=" flex items-center text-gray-500">
                        @if ($this->previous)
                            <svg class="h-5 w-5 lg:h-6 lg:w-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="15 6 9 12 15 18" /></svg>
                            <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer font-semibold text-sm lg:text-base">Anterior</a>
                        @endif
                        @if ($this->next)
                            <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer font-semibold text-sm lg:text-base">Siguiente </a>
                            <svg class="h-5 w-5 lg:h-6 lg:w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg> 
                        @endif
                    </div>
                </div>
                <div class="hidden sm:block cursor-pointer" wire:click="completed">
                    <div x-data="{ tooltip: false }" class="relative z-30 inline-flex">
                        <div x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false" class="rounded-full h-10 w-10 flex items-center justify-center bg-white shadow-md">
                          @if ($currentLesson->completed)
                              <svg class="h-6 w-6 text-green-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />  <circle cx="12" cy="12" r="3" /></svg>
                          @else
                              <svg class="h-6 w-6 text-gray-600"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                              </svg>                          
                          @endif
                        </div>
                        <div class="relative" x-cloak x-show.transition.origin.top="tooltip">
                          <div class="absolute top-0 z-10 w-40 p-2 -mt-1 text-sm leading-tight text-white transform -translate-x-1/2 -translate-y-full bg-black rounded-lg shadow-lg text-center">
                            Marcar como visto
                          </div>
                          <svg class="absolute z-10 w-6 h-6 text-black-500 transform -translate-x-12 -translate-y-3 fill-current stroke-current" width="8" height="8">
                            <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                          </svg>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sm:hidden flex items-center mt-4 p-2 cursor-pointer text-center bg-white rounded-full shadow-md" wire:click="completed">
                @if ($currentLesson->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar tema como finalizado</p>
            </div>

            @if ($currentLesson->description)
                <div class="ml-5" x-data="{ show: false }">
                    <button x-on:click="show = !show" x-text="show ? 'Mostrar menos': 'Mostrar mas'" class="mt-4 text-bold text-sm focus:outline-none text-gray-700"></button>
                    <div x-show="show" class="text-sm text-gray-700 mt-5 tracking-wide">
                        {{$currentLesson->description->name}}
                    </div>
                </div>
            @endif
            <div class="flex items-center justify-between my-4">
                <span class="w-full border-b dark:border-gray-600"></span>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="flex items-center space-x-2">
                        <div class="group relative flex flex-shrink-0 self-start cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1507965613665-5fbb4cbb8399?ixid=MXwxMjA3fDB8MHx0b3BpYy1mZWVkfDQzfHRvd0paRnNrcEdnfHxlbnwwfHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" class="h-8 w-8 object-fill rounded-full">
                        </div>
                
                        <div class="flex items-center justify-center space-x-2">
                            <div class="block">
                                <div class="flex justify-center items-center space-x-2">
                                    <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                        <div class="font-medium">
                                            <a href="#" class="hover:underline text-sm">
                                                <small>Ganendra</small>
                                            </a>
                                        </div>
                                        <div class="text-xs">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, maiores!
                                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad alias sed vitae? Officiis repellendus dolorum eaque natus amet exercitationem, consequuntur similique, ullam totam esse possimus quam ipsam fugiat. Officiis, voluptatum?
                                        </div>
                                    </div>
                                    <div class="self-stretch flex justify-center items-center transform transition-opacity duration-200 opacity-0 hover:opacity-100">
                                        <a href="#" class="">
                                            <div class="text-xs cursor-pointer flex h-6 w-6 transform transition-colors duration-200 hover:bg-gray-100 rounded-full items-center justify-center">
                                                <svg class="w-4 h-6 bg-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex justify-start items-center text-xs w-full">
                                    <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                        <a href="#" class="hover:underline"> <small>Like</small></a>
                                        <small class="self-center">.</small>
                                        <a href="#" class="hover:underline"> <small>Reply</small></a>
                                        <small class="self-center">.</small>
                                        <a href="#" class="hover:underline"><small>15 hour</small></a>
                                    </div>
                                </div>
                                <!-- Subcomment Sample -->
                                <div class="flex items-center space-x-2 space-y-2">
                                    <div class="group relative flex flex-shrink-0 self-start cursor-pointer pt-2">
                                        <img x-on:mouseover="open2 = true" x-on:mouseleave="open2 = false" src="https://images.unsplash.com/photo-1610156830615-2eb9732de349?ixid=MXwxMjA3fDB8MHx0b3BpYy1mZWVkfDExfHJuU0tESHd3WVVrfHxlbnwwfHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" class="h-8 w-8 object-fill rounded-full">
                                    </div>
                                    <div class="flex items-center justify-center space-x-2">
                                        <div class="block">
                                            <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                                <div class="font-medium">
                                                    <a href="#" class="hover:underline text-sm"><small>Hasan Muhammad</small></a>
                                                </div>
                                                <div class="text-xs">
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, maiores!
                                                </div>
                                            </div>
                                            <div class="flex justify-start items-center text-xs w-full">
                                                <div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                                    <a href="#" class="hover:underline"><small>Like</small></a>
                                                    <small class="self-center">.</small>
                                                    <a href="#" class="hover:underline">
                                                        <small>Reply</small>
                                                    </a>
                                                    <small class="self-center">.</small>
                                                    <a href="#" class="hover:underline">
                                                        <small>15 hour</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="self-stretch flex justify-center items-center transform transition-opacity duration-200 opacity-0 translate -translate-y-2 hover:opacity-100">
                                        <a href="#" class="">
                                            <div class="text-xs cursor-pointer flex h-6 w-6 transform transition-colors duration-200 hover:bg-gray-100 rounded-full items-center justify-center">
                                                <svg class="w-4 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-xl leading-8 text-center mt-4 mb-4">{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4 shadow-xl" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div>
                        <p class="text-sm text-opacity-50 tracking-wide">{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-xs" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                <p class="text-gray-600 text-sm mt-6">{{$this->progress. '%'}} completado</p>
                <div class="h-3 relative max-w-xl rounded-full overflow-hidden mb-4">
                    <div class="w-full h-full bg-gray-200 absolute"></div>
                    <div class="h-full bg-green-400 absolute transtion-all duration-500" style="width:{{$this->progress. '%'}}"></div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-sm inline-block mb-2" href="">{{$section->name}}</a>
                            <ul class="subindice">
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex mb-2">
                                        <div class="z-10">
                                            @if ($lesson->completed)
                                                @if ($currentLesson->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($currentLesson->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 bg-white rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer text-sm tracking-wide text-opacity-75" wire:click="changeLesson({{$lesson}})" >{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
