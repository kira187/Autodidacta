@props(['course'])

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