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
        <link rel="stylesheet" href="{{ ('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <section class="bg-cover bg-gray-200">
                <div class="container py-10 lg:py-16">
                    <div class="grid gird-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <div class="col-span-1 md:col-span-2 lg:col-span-1">
                            <a href="{{ route('home') }}" class="hover:text-primary text-gray-600"><p class="name-title font-bold">Autodidacta</p></a>
                        </div>
                        <div class="pr-10 md:pr-16 lg:pr-28 pt-10 lg:pt-0">
                            <p  class="font-bold text-gray-600 subtitle mb-4">Alumnos</p>
                            <hr class="hr-gray">
                            <a href="{{ route('courses.index')}} " class="hover:text-primary hover:font-bold text-gray-600"><p class=" mt-6 mb-4">Cursos</p></a>
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class=" mb-4">Conocer más</p></a>
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class="">Recomendaciones</p></a>
                        </div>
                        <div class="pr-10 md:pr-16 lg:pr-28 pt-10 lg:pt-0">
                            <p  class="font-bold text-gray-600 subtitle mb-4">Instructores</p>
                            <hr class="hr-gray">
                            <a href="{{ route('make-instructor')}}" class="hover:text-primary hover:font-bold text-gray-600"><p class=" mt-6 mb-4">Convertirme en instructor</p></a>
                            <a href="{{ route('contact-us')}}" class="hover:text-primary hover:font-bold text-gray-600"><p class="">Contacto</p></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-cover bg-primary">
                <div class="container py-10 lg:py-6">
                    <div class="grid gird-rows-1 grid-cols-1 md:grid-cols-3 xl:grid-cols-2">
                        <div class="col-span-1 text-center  md:text-left order-last sm:order-first">
                            <p class="text-white">Copyright © 2021 Autodidacta</p>
                        </div>
                        <div class="pr-0 xl:pr-28 text-center  md:text-right col-span-1 sm:col-span-2 xl:col-span-1">
                            <a href="" class=" mb-4 md:mb-0 hover:text-gray-700 inline-block text-white mr-0 sm:mr-10"><p>Politicas de privacidad</p></a>
                            <a href="" class=" mb-4 md:mb-0 hover:text-gray-700 inline-block text-white"><p>Terminos y condiciones</p></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @stack('modals')

        @livewireScripts

        @isset($js)
            {{ $js }}
        @endisset
        
    </body>
</html>
