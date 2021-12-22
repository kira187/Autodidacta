<x-app-layout>
    <section class="bg-gray-800 py-12 mb-12 shadow-md">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover rounded" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://i.pinimg.com/originals/03/89/30/038930bfa7f643504c11efda1a750795.jpg" alt="">
                @endif
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

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">

        @if (session('info'))
            <div class="lg:col-span-3">
                <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                    <p class="font-bold">Ocurrio un error!</p>
                    <p>{{ session('info') }}</p>
                  </div>
            </div>
        @endif
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-semibold text-2xl mb-4 text-gray-700"><i class="far fa-list-alt mr-2"></i> Lo que aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="flex items-baseline">
                                <i class="fas fa-check text-green-500 mr-2"></i> 
                                <span class="text-gray-700 text-sm">{{ $goal->name }}</span>
                            </li>
                        @empty
                            <li class="text-gray-700 text-base"> Este curso no cuenta con metas.</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            {{-- Temario --}}
            <section class="mb-10">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @forelse ($course->sections as $section)
                    <article class="bg-white mb-4 py-1 pr-1 shadow-lg rounded-lg" {{($loop->first) ? 'x-data={open:true}' : 'x-data={open:false}'}}>
                        <header class=" px-4 py-2 cursor-pointer bg-white" x-on:click="open =!open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name}}</h1>
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
                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso aun no cuenta con secciones.
                        </div>
                    </article>
                @endforelse
            </section> 

            {{-- Requicitos --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl mb-2">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base pb-1">{{ $requirement->name }}</li>
                    @empty
                        <li class="text-gray-700 text-base">Este curso aun no cuenta con requerimientos.</li>
                    @endforelse
                </ul>
            </section>

            {{-- Descripción --}}
            <section class="pb-8">
                <h1 class="font-bold text-3xl mb-2">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>

            <!-- Audiencia -->
            <section class="mb-10">
                <h1 class="font-bold text-3xl mb-2 text-gray-800">¿Para quién es este curso?</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->audience as $audience)
                        <li class="text-gray-700 text-base pb-1">{{ $audience->name }}</li>
                    @empty
                        <li class="text-gray-700 text-base">Este curso aun no cuenta con audiencia a la que va dirigida este curso.</li>
                    @endforelse
                </ul>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-8">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadown-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}"}>
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg"> Prof: {{$course->teacher->name}} </h1>
                            <a href="text-blue-400 text-sm text font-bold">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>
                    <form action="{{ route('admin.courses.approved', $course )}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-full">Aprobar curso</button>
                    </form>

                    <a href="{{ route('admin.courses.observation', $course) }}" class="btn btn-danger w-full block text-center mt-4">Realizar observaciones del curso</a>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>