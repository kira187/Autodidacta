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
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <div class="container w-full flex flex-wrap mx-auto px-2 pt-8">
                <div class="w-full lg:w-1/5 lg:px-6 text-xl text-gray-800 leading-normal">
                   <p class="text-base font-bold py-2 lg:pb-6 text-gray-700">Edición del curso</p>
                   <div class="block lg:hidden sticky inset-0">
                      <button id="menu-toggle" class="flex w-full justify-end px-3 py-3 bg-white lg:bg-transparent border rounded border-gray-600 hover:border-blue-500 appearance-none focus:outline-none">
                         <svg class="fill-current h-3 float-right" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                         </svg>
                      </button>
                   </div>
                   <div class="w-full sticky inset-0 hidden h-64 lg:h-auto overflow-x-hidden overflow-y-auto lg:overflow-y-hidden lg:block mt-0 border border-gray-400 lg:border-transparent bg-white shadow lg:shadow-none lg:bg-transparent z-20" style="top:5em;" id="menu-content">
                      <ul class="list-reset text-gray-700">
                         <li class="py-1 md:my-0 hover:bg-purple-100 lg:hover:bg-transparent">
                            <a href="{{route('instructor.courses.edit', $course)}}" class="@routeIs('instructor.courses.edit', $course) border-blue-500 text-gray-900 font-bold @else border-transparent @endif block pl-4 align-middle no-underline hover:text-blue-500 border-l-4 lg:hover:border-blue-500">
                            <span class="pb-1 md:pb-0 text-sm">Informacion del curso</span>
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
                                <button class="mt-5 btn btn-danger text-sm btn-sm" type="submit">Solicitar revisión</button>
                            </form>
                            @break
                        @case(2)
                            <div class="mt-5 relative px-4 py-3 leading-normal text-yellow-700 bg-yellow-100 rounded-lg border border-yellow-500" role="alert">
                                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                    <svg class="h-4 w-4 text-yellow-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <polyline points="12 6 12 12 16 14" /></svg>
                                {{-- <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg> --}}
                                </span>
                                <p class="ml-6 text-sm">Curso en revisión</p>
                            </div>
                            @break
                        @default
                            <div class="mt-5 relative px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg border border-green-500" role="alert">
                                <span class="absolute inset-y-0 left-0 flex items-center ml-4">
                                    <svg class="h-4 w-4 text-green-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="20 6 9 17 4 12" /></svg>
                                  {{-- <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" fill-rule="evenodd"></path></svg> --}}
                                </span>
                                <p class="ml-6 text-sm">Curso publicado</p>
                            </div>
                    @endswitch
                   </div>
                </div>
                <div class="w-full lg:w-4/5 p-8 mt-6 lg:mt-0 leading-normal bg-white card">
                    <div class="card-body text-gray-600">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
            {{ $js }}
        @endisset
        
    </body>
</html>
