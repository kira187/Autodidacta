<div class="container py-8">
    <h2 class="text-2xl font-semibold text-gray-700 leading-tight mb-4">Mis Cursos</h2>        
    <div class="max-w-7xl mx-auto px-4 pb-10 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <article class="rounded-3xl shadow-card">
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
                </article>
            @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
</div>
