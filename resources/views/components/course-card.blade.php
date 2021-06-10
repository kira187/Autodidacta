@props(['course'])

<article class="card">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">

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
            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i> ( {{$course->students_count}} )
             </p>
        </div>

        <a href="{{route('courses.info', $course)}}" class="mt-4 btn btn-primary btn-block"> Mas informacion </a>
    </div>
    
</article>