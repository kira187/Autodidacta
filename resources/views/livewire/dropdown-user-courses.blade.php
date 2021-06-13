<div x-data="{ open:false }" class="relative my-32">
    <button x-on:click="open = true" class="inline-flex items-center mr-10 pt-1 border-b-2 border-transparent text-sm font-poppins leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
        Mi aprendizaje
    </button>

    <div x-show="open" x-on:click.away="open = false" x-transition:enter="transition ease-out origin-top-left duration-200" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition origin-top-left ease-in duration-100" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="absolute right-0 mt-2 bg-white rounded-md shadow overflow-hidden z-20" style="width:20rem;">
        <div class="py-2">
            @forelse ($courses as $course)
                <a href="{{ route('course.status', $course) }}" class="transition-colors duration-200 flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                    <img class="h-14 w-14 rounded object-cover mx-1" src="{{Storage::url($course->image->url)}}" alt="avatar">
                    <p class="text-gray-600 text-sm mx-2">
                        <span class="font-medium" href="#"> {{$course->title}} </span>
                    </p>
                </a>
            @empty
                <p class="px-4 py-3 border-b text-gray-600 text-sm mx-2 text-center bg-gray-200">Aun no cuentas con cursos</p>
            @endforelse
        </div>
        @if ($courses->count() != 0)            
            <a href="#" class="block bg-gray-600 text-white text-center font-bold py-2 hover:bg-gray-800">Ir a mis cursos</a>
        @endif
    </div>
</div>
