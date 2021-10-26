<div class="container py-6">
    <h2 class="text-xl font-semibold text-gray-700 leading-tight mb-4">Mis Cursos</h2>
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="resetPage" wire:model="search" class="form-input flex-1 shadow-sm" placeholder="Buscar curso...">
            <a class="btn btn-danger ml-2" href="{{route('instructor.courses.create')}}">Nuevo curso</a>
        </div>

        @if($courses->count())      
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center"> Nombre </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center"> Inscritos </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center"> Calificacion </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center"> Status </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider text-center"> Acciones </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($courses as $course)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="https://images.pexels.com/photos/4497761/pexels-photo-4497761.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"> {{$course->title}} </div>
                                        <div class="text-sm text-gray-500"> {{$course->category->name}} </div>
                                    </div>
                                </div>
                            </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                <div class="text-sm text-gray-900">
                                    {{$course->students->count()}}  Alumnos
                                </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center"> {{$course->rating}}
                                    <div class="flex text-sl ml-2">
                                        @php $rating = $course->rating; @endphp  
                                        @foreach(range(1,5) as $i)
                                            <span class="fa-stack mr-1" style="width:1em">
                                                <i class="far fa-star fa-stack-1x" style="color:#6B7280"></i>
                                                @if($rating > 0)
                                                    @if($rating > 0.5)
                                                        <i class="fas fa-star fa-stack-1x" style="color:#FBBF24"></i>
                                                    @else
                                                        <i class="fas fa-star-half fa-stack-1x" style="color:#FBBF24"></i>
                                                    @endif
                                                @endif
                                                @php $rating--; @endphp
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="text-sm text-gray-500">Valoraciones del curso </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                @switch($course->status)
                                    @case(1)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Borrador </span> 
                                    @break
                                    @case(2)
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800"> Revisión </span>  
                                    @break
                                    @case(3)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Publicado </span>  
                                    @break
                                    @default     
                                @endswitch
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                            <a href="{{ route('instructor.courses.edit', $course) }}" class="text-indigo-500 hover:text-blue-800"> Editar </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4"> No hay ningun curso coincidente </div>
        @endif
    </x-table-responsive>
</div>
 