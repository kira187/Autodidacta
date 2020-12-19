@props(['course'])

<article class="bg-white shadow-lg rounded overflow-hidden">
    <img class="h-36 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">

    <div class="px-6 py-4">
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($course->title, 40)}} {{$course->id}}</h1>
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

        <a href="{{route('courses.info', $course)}}" class="block text-center w-full mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> Mas informacion </a>
    </div>
    
</article>