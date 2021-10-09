<div>    
    <div class="max-w-7xl mx-auto px-4 pb-10 sm:px-6 lg:px-8 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-x-6 gap-y-8">
        

        {{-- Recomendados --}}
        <div>
            <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-16">Creemos que te podría gustar.</h2>
        </div>
        <div id="recomender-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        
            @forelse ($courses as $course)
            
                <x-course-card :course="$course"/>
            @empty
                <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-yellow-50 text-yellow-800">
                    <span class="h-6 w-6 mr-4">
                        <svg  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span> Sin resultados.
                </div>
            @endforelse
        </div>


        {{-- Mas populares --}}
        <div>
            <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos más populares.</h2>
        </div>
        <div id="popular-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        
            @forelse ($courses as $course)
            
                <x-course-card :course="$course"/>
            @empty
                <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-yellow-50 text-yellow-800">
                    <span class="h-6 w-6 mr-4">
                        <svg  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span> Sin resultados.
                </div>
            @endforelse
        </div>


        {{-- Curso vistos --}}
        @if(isset($courses_view))
        <div>
            <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Continuar viendo.</h2>
        </div>
        <div id="view-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
            
            @foreach ($courses as $course)
                <x-course-card-progress :course="$course"/>
            @endforeach
        
            @forelse ($courses as $course)
            
                <x-course-card-progress :course="$course"/>
            @empty
                <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-yellow-50 text-yellow-800">
                    <span class="h-6 w-6 mr-4">
                        <svg  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span> Sin resultados.
                </div>
            @endforelse
            {{-- @foreach ($courses_view as $course)

                <article class="rounded-3xl shadow-card">
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{ Storage::url($course->image->url) }}" alt="">
                
                    <div class="card-body">
                        <p class="text-gray-500 mb-4 text-sm">{{$course->category->name}}</p>
                        <h1 class="card-title font-bold">{{Str::limit($course->title, 30)}}</h1>
                        <p class="text-gray-500 text-sm mb-2 h-teacher">{{$course->teacher->name}}</p>         
                        <div class="flex">
                            <ul class="flex text-sm">
                                <li class="mr-1">
                                    <i class="fas fa-star star-icon text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-300"></i>
                                    <i class="fas fa-star star-icon text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-300"></i>
                                    <i class="fas fa-star star-icon text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-300"></i>
                                    <i class="fas fa-star star-icon text-{{$course->rating >= 4 ? 'yellow' : 'gray' }}-300"></i>
                                    <i class="fas fa-star star-icon text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-300"></i>
                                </li>
                            </ul>
                            <p class="text-sm text-gray-500 font-bold">
                                ( {{$course->students_count}} )
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="{{route('courses.info', $course)}}" class=" font-bold text-primary hover:text-gray-700"> Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                        
                    </div>
                    
                </article>
            @endforeach     --}}
                {{-- <article class="rounded-3xl shadow-card">
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{ Storage::url($course->image->url) }}" alt="">
                
                    <div class="card-body">
                        <h1 class="card-title font-bold">{{Str::limit($course->title, 30)}}</h1>
                        <p class="text-gray-500 text-sm mb-2 h-teacher">{{$course->teacher->name}}</p>
                        <p class="text-gray-600 text-sm">{{$course->progress > 0 ? $course->progress.'% completado' : 'Empezar curso'}}</p>
                        <div class="h-3 relative max-w-xl rounded-full overflow-hidden mb-4">
                            <div class="w-full h-full bg-gray-200 absolute"></div>
                            <div class="h-full bg-green-500 absolute transtion-all duration-500" style="width:{{$course->progress. '%'}}"></div>
                        </div>
                        <div class="mt-4">
                            <a href="{{route('course.status', $course)}}" class=" font-bold text-primary hover:text-gray-700"> Continuar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                </article> --}}
            
        </div>
        @endif

        {{-- Cursos de programacion --}}
        <div>
            <h2 class="font-popins font-bold text-2xl text-gray-700 text-center lg:text-center leading-tight mt-4">Cursos de programación.</h2>
        </div>
        <div id="programming-slick" class=" course-slick container grid sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-8 ">
            @foreach ($courses_programming as $course)
                <x-course-card :course="$course"/>
            @endforeach
        
            @forelse ($courses_programming as $course)
            
                <x-course-card :course="$course"/>
            @empty
                <div class="flex w-full px-6 py-4 my-2 rounded-xl shadow-md font-semibold text-md bg-yellow-50 text-yellow-800">
                    <span class="h-6 w-6 mr-4">
                        <svg  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </span> Sin resultados.
                </div>
            @endforelse
        </div>

        

        
    </div>
</div>
