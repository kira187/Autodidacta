<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('livewire-toast')
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <div class="container w-full flex flex-wrap mx-auto px-2 pt-8">
                <div class="w-full lg:w-1/5 lg:px-6 text-xl text-gray-800 leading-normal">
                    <button onclick="myFunction()">Click me</button>
                   <p class="text-base font-bold py-2 lg:pb-6 text-gray-700">Edición del curso</p>
                   <div class="block lg:hidden sticky inset-0">
                        <select id="country" onchange="location = this.value;" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="{{route('instructor.courses.edit', $course)}}">Información del curso</option>
                            <option value="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</option>
                            <option value="{{route('instructor.courses.goals', $course)}}">Metas del curso</option>
                            <option value="{{route('instructor.courses.students', $course)}}">Estudiantes</option>
                            @if ($course->observation)
                                <option value="{{route('instructor.courses.observation', $course)}}">Opservaciones</option>
                            </li>
                            @endif
                        </select>
                   </div>
                   <div class="w-full sticky inset-0 hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:5em;" id="menu-content">
                      <ul class="list-reset text-gray-700">
                         <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                            <a href="{{route('instructor.courses.edit', $course)}}" class="@routeIs('instructor.courses.edit', $course) border-blue-500 text-gray-900 font-bold @else border-transparent @endif block pl-4 align-middle no-underline hover:text-blue-500 border-l-4 lg:hover:border-blue-500">
                            <span class="pb-1 md:pb-0 text-sm">Información del curso</span>
                            </a>
                         </li>
                         <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                            <a href="{{route('instructor.courses.curriculum', $course)}}" class="@routeIs('instructor.courses.curriculum', $course) border-blue-500 text-gray-900 font-bold @else border-transparent @endif block pl-4 align-middle no-underline hover:text-blue-500 border-l-4 lg:hover:border-gray-400">
                            <span class="pb-1 md:pb-0 text-sm">Lecciones del curso</span>
                            </a>
                         </li>
                         <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                            <a href="{{route('instructor.courses.goals', $course)}}" class="@routeIs('instructor.courses.goals', $course) border-blue-500 text-gray-900 font-bold @else border-transparent @endif block pl-4 align-middle  no-underline hover:text-blue-500 border-l-4 lg:hover:border-gray-400">
                            <span class="pb-1 md:pb-0 text-sm">Metas del curso</span>
                            </a>
                         </li>
                         <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                            <a href="{{route('instructor.courses.students', $course)}}" class="@routeIs('instructor.courses.students', $course) border-blue-500 text-gray-900 font-bold @else border-transparent @endif block pl-4 align-middle text-gray-700 no-underline hover:text-blue-500 border-l-4 lg:hover:border-gray-400">
                            <span class="pb-1 md:pb-0 text-sm">Estudiantes</span>
                            </a>
                         </li>
                        @if ($course->observation)
                            <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                                <a href="{{route('instructor.courses.observation', $course)}}" class="@routeIs('instructor.courses.observation', $course) border-yellow-500 @else border-transparent @endif block pl-4 align-middle text-gray-700 no-underline hover:text-blue-500 border-l-4 lg:hover:border-gray-400">
                                <span class="pb-1 md:pb-0 text-sm">Observaciones</span>
                                </a>
                            </li>
                        @endif
                      </ul>
                      @switch($course->status)
                        @case(1)
                            <form action="{{ route('instructor.courses.status', ($course))}}" method="POST">
                                @csrf
                                <button class="mt-5 btn-danger btn-sm" type="submit"><i class="fas fa-paper-plane"></i> Enviar a revisión</button>
                            </form>
                            @break
                        @case(2)
                            <div class="mt-5 relative px-4 py-3 leading-normal text-yellow-700 bg-yellow-100 rounded-lg border border-yellow-500" role="alert">
                                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                    <svg class="h-4 w-4 text-yellow-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <polyline points="12 6 12 12 16 14" /></svg>
                                </span>
                                <p class="ml-6 text-sm">Curso en revisión</p>
                            </div>
                        @break
                        @default
                            <div class="mt-5 relative px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg border border-green-500" role="alert">
                                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                    <svg class="h-4 w-4 text-green-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="20 6 9 17 4 12" /></svg>
                                </span>
                                <p class="ml-6 text-sm">Curso publicado</p>
                            </div>
                    @endswitch
                   </div>
                </div>
                <div class="w-full lg:w-4/5 sm:p-8 mt-6 lg:mt-0 leading-normal bg-white card">
                    <div class="card-body text-gray-600">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts
        @stack('js')
        @stack('modals')
        <script>
            function myFunction() {
                Livewire.emitTo('livewire-toast', 'show', 'Project Added Successfully');

            }
        </script>
    </body>
</html>
