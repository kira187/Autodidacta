<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure> 
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @else
                    <img class="h-60 w-full object-cover" src="https://i.pinimg.com/originals/03/89/30/038930bfa7f643504c11efda1a750795.jpg" alt="">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{ $course->level->name }}</p>
                <p class="mb-2"><i class="fas fa-tag"></i> Categoria: {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados: {{ $course->students_count }}</p>
                <p class=""><i class="far fa-star"></i> Calificacion {{ $course->rating }}</p>
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
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderas</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i> {{ $goal->name }}</li>
                        @empty
                            <li class="text-gray-700 text-base"> Este curso no cuenta con ninguna meta.</li>
                        @endforelse
                    </ul>
                </div>
            </section>

            {{-- Temario --}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>

                @forelse ($course->sections as $section)
                    <article class="mb-4 shadow" {{($loop->first) ? 'x-data={open:true}' : 'x-data={open:false}'}}>
                        <header class="border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open =!open">
                            <h1 class="font-bold text-lg text-gray-600">{{ $section->name}}</h1>
                        </header>

                        <div class="bg-white py-2 px-4 border-l-2 bg-grey-lightest border-indigo" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{ $lesson->name }}</li>                                    
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @empty
                    <article class="card">
                        <div class="card-body">
                            Este curso no tiene ninguna sección asignada.
                        </div>
                    </article>
                @endforelse
            </section>

            {{-- Requicitos --}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl mb-2">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @empty
                    <li class="text-gray-700 text-base">Este curso no tiene ningún requerimiento.</li>
                    @endforelse
                </ul>
            </section>

            {{-- Descripción --}}
            <section>
                <h1 class="font-bold text-3xl mb-2">Descripción</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
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
                        <button type="submit" class="btn btn-danger w-full">Aprovar curso</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>