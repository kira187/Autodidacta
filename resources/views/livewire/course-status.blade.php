<div class="my-10">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <!-- Iframe video -->
            <div class="embed-responsive rounded-lg shadow-md">
                {!!$currentLesson->iframe!!}
            </div>
            <!-- Name video -->
            <div class="text-2xl text-gray-700 font-medium mt-6 text-opacity-80">
                <div class="flex items-center">
                    <svg class="mr-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
                    {{$currentLesson->name}}
                </div>
            </div>
            <div class="flex items-center justify-between mt-6 mb-4">
                <span class="w-full border-b dark:border-gray-600"></span>
            </div>
            <!-- Control Videos -->
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
            <!-- Checked video -->
            <div class="sm:hidden flex items-center mt-4 p-2 cursor-pointer text-center bg-white rounded-full shadow-md" wire:click="completed">
                @if ($currentLesson->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar tema como finalizado</p>
            </div>
            <!-- Description video -->
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
            <!-- Comments section -->
            <div class="card">
                <div class="card-body">
                    <div class="sm:px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                        <!--Buscar-->
                        <div class="-mx-3 md:flex mb-2">
                          <div class="md:w-full px-3">
                            <div class="relative flex w-full flex-wrap items-stretch mb-3">
                              <span
                                class="z-10 h-full leading-snug font-normal text-center text-gray-400 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-2 py-2">
                                <i class="fas fa-search"></i>
                              </span>
                              <input type="text" placeholder="Buscar todas las preguntas del curso" class="px-2 py-2 placeholder-gray-400 text-gray-600 border border-gray-300 relative bg-white rounded text-sm border border-grey-lighter w-full pl-10 focus:outline-none" />
                            </div>
                          </div>
                        </div>
                        <!-- Filtros -->
                        <div class="-mx-3 md:flex mb-4">
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                                    <option hidden selected>Todas las clases</option>
                                    <option>Element 1</option>
                                    <option>Element 2</option>
                                    <option>Element 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                          </div>
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                                    <option hidden selected>Seleccionar orden</option>
                                    <option>Element 1</option>
                                    <option>Element 2</option>
                                    <option>Element 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                          </div>
                          <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <div class="relative">
                                <select class="block appearance-none rounded-md shadow-sm w-full border border-gray-300 py-2 bg-white px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500 sm:text-sm text-gray-500">
                                    <option hidden selected>Filtrar preguntas</option>
                                    <option>Element 1</option>
                                    <option>Element 2</option>
                                    <option>Element 3</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                          </div>
                        </div>

                        <h3 class="font-bold text-lg py-4 text-opacity-60">Todos las preguntas de este curso (23)</h3>
                        <div>
                            <div class="flex items-start pt-6">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"/>
                                <div class="ml-3">
                                  <span class="font-bold text-gray-700 sm:text-base text-sm">ERROR AL MARCAR UNIDAD COMO CULMINADA</span>
                                  <p class="text-gray-500 text-sm sm:block hidden pb-4">Buenas noches profesor!Cuando le doy como culminada una unidad me arroja este error y por ende no</p>
                                  <div class="text-xs flex">
                                    <a href="#" class="text-blue-500">Lucas </a>
                                    <a href="#" class="px-2 text-blue-500">• Clase 25 •</a>
                                    <div class="text-gray-500 text-xs ">hace 2 días</div>
                                  </div>
                                </div>
                                <div class="ml-4">
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                                  </div>
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                                  </div>      
                                </div>
                            </div>
                            <div class="flex items-start pt-6">
                                <img class="h-10 w-10 rounded-full" src="https://images.pexels.com/photos/61100/pexels-photo-61100.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb"/>
                                <div class="ml-3">
                                  <span class="font-bold text-gray-700">$withCount</span>
                                  <p class="text-gray-500 text-sm sm:block hidden pb-4">En el minuto 5:59 me genera el siguiente error : SQLSTATE[42S02]: Base table or view not found: 1146</p>
                                  
                                  <div class="text-xs flex">
                                    <a href="#" class="text-blue-500">Alexa Correa </a>
                                    <a href="#" class="px-2 text-blue-500">• Clase 39 •</a>
                                    <div class="text-gray-500">hace 1 días</div>
                                  </div>
                                </div>
                                <div class="ml-4">
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                                  </div>
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                                  </div>      
                                </div>
                            </div>
                            <div class="flex items-start pt-6">
                                <img class="h-10 w-10 rounded-full" src="https://images.pexels.com/photos/220453/pexels-photo-220453.jpeg?crop=faces&fit=crop&h=200&w=200&auto=compress&cs=tinysrgb"/>
                                <div class="ml-3">
                                  <span class="font-bold text-gray-700">ErrorException</span>
                                  <p class="text-gray-500 text-sm sm:block hidden pb-4">Saludos estoy en el minuto 21:35 de la sección 2 capitulo 9 y al correr la migración me aparece el siguie..</p>
                                  
                                  <div class="text-xs flex">
                                    <a href="#" class="text-blue-500">Javier de Jesus Correa </a>
                                    <a href="#" class="px-2 text-blue-500">• Clase 25 •</a>
                                    <div class="text-gray-500">hace 2 días</div>
                                  </div>
                                </div>
                                <div class="ml-4">
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">1</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="12" y1="5" x2="12" y2="19" />  <line x1="16" y1="9" x2="12" y2="5" />  <line x1="8" y1="9" x2="12" y2="5" /></svg>
                                  </div>
                                  <div class="flex pb-0.5">
                                    <span class="font-semibold pr-2">0</span> <svg class="h-6 w-6 text-gray-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10" />  <path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2" /></svg>
                                  </div>      
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <!-- Left section lessons -->
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
                                                    <span class="inline-block w-4 h-4 border-2 bg-white border-yellow-300 rounded-full mr-2 mt-1"></span>
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
