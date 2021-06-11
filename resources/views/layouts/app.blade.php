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
        <link rel="stylesheet" href="{{ ('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 pb-10">
            @livewire('navigation-dropdown')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <section class="bg-cover bg-gray-200">
                <div class="container py-10 lg:py-16">
                    <div class="grid gird-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                        <div class="col-span-1 md:col-span-2 lg:col-span-1">
                            <a href="" class="hover:text-primary text-gray-600"><p class="name-title font-bold">Autodidacta</p></a>
                        </div>
                        <div class="pr-10 md:pr-16 lg:pr-28 pt-10 lg:pt-0">
                            <p  class="font-bold text-gray-600 subtitle mb-4">Alumnos</p>
                            <hr class="hr-gray">
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class=" mt-6 mb-4">Cursos</p></a>
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class=" mb-4">Conocer más</p></a>
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class="">Recomendaciones</p></a>
                        </div>
                        <div class="pr-10 md:pr-16 lg:pr-28 pt-10 lg:pt-0">
                            <p  class="font-bold text-gray-600 subtitle mb-4">Instructores</p>
                            <hr class="hr-gray">
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class=" mt-6 mb-4">Convertirme en instructor</p></a>
                            <a href="" class="hover:text-primary hover:font-bold text-gray-600"><p class="">Contacto</p></a>
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

        <footer>
            <footer class="bg-white shadow" >
                <div class="bg-gray-50 border-t border-gray-200">
                    <div class="px-4 pt-5 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-7">
                      
                      <div class="flex flex-col justify-between pb-5 sm:flex-row">
                        <p class="text-sm text-gray-500">
                          © Copyright 2020 Lorem Inc. All rights reserved.
                        </p>
                        <div class="flex items-center mt-4 space-x-4 sm:mt-0">
                          <a href="#" class="text-gray-500 transition-colors duration-300 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                              <path d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z"></path>
                            </svg>
                          </a>
                          <a href="#" class="text-gray-500 transition-colors duration-300 hover:text-teal-accent-400">
                            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
                              <circle cx="15" cy="15" r="4"></circle>
                              <path d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z"></path>
                            </svg>
                          </a>
                          <a href="#" class="text-gray-500 transition-colors duration-300 hover:text-teal-accent-400">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
                              <path d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z"></path>
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
            </footer>
        </footer>
        @stack('modals')

        @livewireScripts

        @isset($js)
            {{ $js }}
        @endisset
        
    </body>
</html>
