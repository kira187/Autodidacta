<div class="my-10">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            @if(session('alert'))
                <div class="card flex w-full  mx-auto overflow-hidden bg-white mb-5 alert">
                    <div class="flex items-center justify-center w-12 bg-green-500">
                        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                        </svg>
                    </div>
                    
                    <div class="px-4 py-2 -mx-3">
                        <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-green-400">Aviso</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">{{ session('alert' )}} </p>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Iframe video -->
            <div class="embed-responsive rounded-lg shadow-md">
                {!!$currentLesson->iframe!!}
            </div>

           
            <!-- Name video -->
            <div class="text-xl text-gray-700 font-medium mt-6 text-opacity-80">
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
                <div class="bg-white rounded-full p-2 shadow-md col-span-3 md:col-span-1 sm:col-span-2">
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
                <div class="hidden sm:block col-1">
                    <div x-data="{ tooltip: false }" class="relative z-30 inline-flex cursor-pointer" wire:click="completed">
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
                          <svg class="absolute z-10 w-6 h-6 text-black-500 transform -translate-x-9 -translate-y-3 fill-current stroke-current" width="8" height="8">
                            <rect x="12" y="-10" width="8" height="8" transform="rotate(45)" />
                          </svg>
                        </div>
                    </div>
                </div>
                @if($currentLesson->resource)
                    <div class="hidden sm:flex justify-center bg-white rounded-full p-2 shadow-md text-gray-500 cursor-pointer" wire:click="download">
                        <i class="fas fa-arrow-down"></i>
                        <p class="text-sm ml-2 mr-2 font-semibold">Descargar recursos</p>
                    </div>
                @endif
            </div>
            <!-- Checked video -->
            <div class="sm:hidden flex items-center mt-4 p-2 cursor-pointer text-center bg-white rounded-full shadow-md" wire:click="completed">
                @if ($currentLesson->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar tema como visto</p>
            </div>
            @if($currentLesson->resource)
                <div class="sm:hidden flex justify-center bg-white rounded-full p-2 shadow-md text-gray-500 cursor-pointer mt-4" wire:click="download">
                    <i class="fas fa-arrow-down"></i>
                    <p class="text-sm ml-2 mr-2 font-semibold">Descargar recursos</p>
                </div>
            @endif
            <!-- Description video -->
            @if ($currentLesson->description)
                <div class="ml-5" x-data="{ show: false }">
                    <div x-show="show" class="text-sm text-gray-700 mt-5 tracking-wide">
                        {!! $currentLesson->description->name !!}
                    </div>
                    <button x-on:click.debounce.100="show = !show" x-text="show ? 'Mostrar menos': 'Mostrar mas'" class="mt-4 font-semibold text-sm focus:outline-none text-gray-700"></button>
                </div>
            @endif
            <div class="flex items-center justify-between my-4">
                <span class="w-full border-b dark:border-gray-600"></span>
            </div>
            <!-- Comments section -->
            <livewire:courses.comments key="{{ now() }}" :course="$course" :lesson="$currentLesson" />

        </div>
        <!-- Left section lessons -->
        <div class="col">
            @can('valued', $course)
                <section class="card mb-8">
                    <div class="card-body text-center">
                        <button wire:click="openModalReview" wire:loading.attr="disabled"> <i class="fas fa-star mr-1 text-yellow-300 text-sm"></i> <span class="text-gray-600 fond-bold"> Dejar una Calificación </span> </button>
                    </div>
                </section>
            @endcan

            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4 mb-4">
                        <a href="{{ route('courses.info', $course) }}" class="text-xl leading-8 hover:text-gray-700">{{ $course->title }}</a>
                    </div>
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
    
                    <ul class="pt-4">
                        @foreach ($course->sections as $section)
                            <li class="text-gray-600 mb-4">
                                <div {{($section->lessons->contains('id', $currentLesson->id)) ? 'x-data={open:true}' : 'x-data={open:false}'}}>
                                    <button class="flex justify-between items-center w-full font-semibold text-sm mb-2" x-on:click="open =!open">{{$section->name}} 
                                        <i :class="{'rotate-180': open, 'rotate-0': !open}"class="fas fa-angle-up transition-transform duration-800 transform"></i>
                                    </button>
                                    <ul class="subindice relative overflow-hidden transition-all max-h-0 duration-700" x-ref="sectionContent" x-bind:style="open == true ? 'max-height: ' + $refs.sectionContent.scrollHeight + 'px' : ''">
                                        @foreach ($section->lessons as $lesson)
                                            <li class="flex mb-2">
                                                <div class="z-10">
                                                    @if ($lesson->completed)
                                                        @if ($currentLesson->id == $lesson->id)
                                                            <span class="inline-block w-4 h-4 border-2 bg-white border-blue-400 rounded-full mr-2 mt-1"></span>
                                                        @else
                                                            <span class="inline-block w-4 h-4 bg-blue-400 rounded-full mr-2 mt-1"></span>
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
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="openModal">
        <x-slot name="title">
            Calificar curso
        </x-slot>
        <x-slot name="content">
            {!! Form::textarea('comment', null, ['rows' => '3', 'class' => 'form-input w-full shadow-sm border border-gray-200', 'placeholder' => 'Cuentanos que te parecio el curso', 'wire:model.defer' => 'comment']) !!}
            <x-jet-input-error for="comment" class="mt-2" />
        </x-slot>
        <x-slot name="footer">
            <div class="flex items-center">
                <x-jet-secondary-button  wire:click="storeReview"> Calificar </x-jet-secondary-button>
                <ul class=" ml-2 flex">
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)">
                        <i class="fas fa-star text-{{$rating >= 1 ? 'yellow' : 'gray'}}-300"></i>                                                                                                
                    </li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)">
                        <i class="fas fa-star text-{{$rating >= 2 ? 'yellow' : 'gray'}}-300"></i>
                    </li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)">
                        <i class="fas fa-star text-{{$rating >= 3 ? 'yellow' : 'gray'}}-300"></i>
                    </li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)">
                        <i class="fas fa-star text-{{$rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                    </li>
                    <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)">
                        <i class="fas fa-star text-{{$rating == 5 ? 'yellow' : 'gray'}}-300"></i>
                    </li>
                </ul>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>

<x-slot name="js">
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
</x-slot>