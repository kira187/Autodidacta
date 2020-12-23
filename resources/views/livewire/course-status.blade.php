<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive">
                {!!$currentLesson->iframe!!}
            </div>

            <div class="text-3xl text-gray-600 font-bold mt-4">
                {{$currentLesson->name}}
            </div>

            @if ($currentLesson->description)
                <div class="text-gray-600 ">
                    {{$currentLesson->description->name}}
                </div>
            @endif

            <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                @if ($currentLesson->completed)
                    <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar unidad como finalizada</p>
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500">
                    @if ($this->previous)
                        <svg class="h-6 w-6"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="15 6 9 12 15 18" /></svg>
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer font-bold">Tema anterior</a>
                    @endif
                    
                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer font-bold">Tema siguiente </a>
                        <svg class="h-6 w-6"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                          </svg> 
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mt-4 mb-4">{{ $course->title }}</h1>
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>

                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                    </div>
                </div>

                <p class="text-gray-600 text-sm mt-4">{{$this->progress. '%'}} completado</p>
                <div class="h-3 relative max-w-xl rounded-full overflow-hidden mb-4">
                    <div class="w-full h-full bg-gray-200 absolute"></div>
                    <div class="h-full bg-green-500 absolute transtion-all duration-500" style="width:{{$this->progress. '%'}}"></div>
                </div>                

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base inline-block mb-2" href="">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($currentLesson->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($currentLesson->id == $lesson->id)
                                                    <span class="inline-block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="inline-block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})" >{{$lesson->name}}</a>
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
