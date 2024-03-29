<x-app-layout>
    <section class="bg-gray-800 py-12 mb-12 shadow-md">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover rounded" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-2xl mb-2 font-bold">{{ $course->title }}</h1>
                <h2 class="text-base mb-8 font-semibold">{{ $course->subtitle }}</h2>
                <p class="mb-3 text-sm"><i class="fas fa-chart-line mr-1"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-3 text-sm"><i class="fas fa-tag mr-1"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-3 text-sm"><i class="fas fa-users mr-1"></i> Inscritos: {{ $course->students_count }}</p>
                <p class="text-sm"><i class="fas fa-star mr-1"></i> Calificación {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 pb-24">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <h1 class="header-title">Lo que aprenderas</h1>
            <section class="card mb-12">
                <div class="card-body">
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="flex items-center">
                                <i class="fas fa-check text-green-500 mr-2"></i> 
                                <span class="text-gray-700 text-sm text-justify">{{ $goal->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="pb-8">
                <h1 class="header-title">Temario</h1>
                @foreach ($course->sections as $section)
                    <article class="bg-white mb-4 py-1 pr-1 shadow-lg rounded-lg" {{($loop->first) ? 'x-data={open:true}' : 'x-data={open:false}'}}>
                        <header class="flex items-center w-full text-left px-4 py-2 cursor-pointer bg-white" x-on:click="open =!open">
                            <h1 class="course-section-title">{{ $section->name}}</h1>
                            <span class="ml-auto">
                                {{ $section->lessons->count() }} clases
                            </span>
                        </header>                      

                            <div class="px-4 border-l-4 bg-grey-lightest border-blue-400 relative overflow-hidden transition-all max-h-0 duration-700" 
                                x-ref="sectionContent" 
                                x-bind:style="open == true ? 'max-height: ' + $refs.sectionContent.scrollHeight + 'px' : ''">
                            <ul class="grid grid-cols-1 gap-2 py-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-600 flex items-center">
                                        <i class="fas fa-play-circle mr-2 text-gray-500"></i>
                                        <span class="text-base"></p>{{ $lesson->name }} </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>            

            <section class="pb-8">
                <h1 class="header-title">Requisitos del curso</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base pb-1">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            <section class="pb-8">
                <h1 class="header-title">Descripción</h1>
                <div class="text-gray-700 text-base tracking-wide leading-relaxed text-justify">
                    {!! $course->description !!}
                </div>
            </section>

            <section class="pb-8">
                <h1 class="header-title">¿Para quién es este curso?</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->audience as $audience)
                        <li class="text-gray-700 text-base pb-1">{{ $audience->name }}</li>
                    @endforeach
                </ul>
            </section>

            @livewire('courses-reviews', ['course' => $course])
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-8">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadown-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}"}>
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg"> Prof: {{$course->teacher->name}} </h1>
                            <a href="#" class="text-blue-700 text-sm text">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>

                    @can('enrolled', $course)
                        <a href="{{route('course.status', $course)}}" class="btn-danger btn-block mt-4 px-6 py-2 leading-6 rounded-full focus:outline-none">Continuar curso</a>
                    @else
                        <form action="{{route('course.enrolled', $course)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn-danger btn-block mt-4 px-6 py-2 leading-6 rounded-full focus:outline-none">Tomar curso</button>
                        </form>
                    @endcan
                    
                </div>
            </section>

            <aside class="hidden lg:block">
                <h1 class="header-title">Recomendaciones</h1>
                @foreach ($similares as $course)
                    <article class="flex mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1 class="mt-2">
                                <a href="{{route('courses.info', $course)}}" class="font-bold text-gray-500 mb-3" href="">{{Str::limit($course->title, 35)}}</a>
                            </h1>
                            
                            <div class="flex items-center mb-2">
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="">
                                <p class="text-gray-700 text-sm ml-2">{{$course->teacher->name}}</p>
                            </div>

                            <p class="text-sm"><i class="fas fa-star mr-2 text-yellow-300"></i>{{$course->rating}}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>