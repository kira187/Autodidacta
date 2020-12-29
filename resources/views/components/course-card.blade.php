@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">

    <div class="card-body">
        <h1 class="card-title">{{Str::limit($course->title, 40)}}</h1>
        <p class="text-gray-500 text-sm mb-2">Prof: {{$course->teacher->name}}</p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                    <i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                    <i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                    <i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray' }}-400"></i>
                    <i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i>
                </li>
            </ul>
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i> ( {{$course->students_count}} )
             </p>
        </div>

        <a href="{{route('courses.info', $course)}}" class="mt-4 btn btn-primary btn-block"> Mas informacion </a>
    </div>

</article>