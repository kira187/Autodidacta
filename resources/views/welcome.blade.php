<x-app-layout>

    {{--  Header site  --}}
    <section class="bg-cover bg-white"}})">
        <div class="container py-10 lg:py-36">
            <div class="grid gird-rows-1 grid-cols-1 lg:grid-cols-2">
                <div class="grid gird-rows-3 order-last grid-cols-1 md:mx-20 lg:order-first lg:mx-0 lg:ml-28">
                    <h1 class="font-popins title-header font-bold text-black text-4xl text-gray-700 text-center lg:text-left">La plataforma donde <span class="text-primary">aprendes</span> y enseñas.</h1>
                    <p class="text-black text-lg mt-2 mb-10 md:mb-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus tenetur sunt laboriosam ratione quos eos laborum quam dolor.</p>
                    
                    @livewire('search')
                    
                </div>
                <div class="lg:pl-16 xl:pl-24 lg:pr-28 box-image">
                    <img class="inline" src="{{ asset('img/home/header_img.svg')}}" alt="...">
                </div>
            </div>
        </div>
    </section>


    <section class="bg-cover bg-primary"}})">
        <div class="container py-10 ">
            <div class="grid gird-rows-1 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div class="pb-8 lg:pb-0 text-center">
                    <i class="fas fa-laptop-code icon-large text-white"></i>
                    <p class="text-white text-left ml-2" style="display: inline-block"><b>Cursos y proyectos</b> <br>Potencia tus conocimientos</p>
                </div>
                <div class="pb-8 lg:pb-0 text-center">
                    <i class="fas fa-chalkboard-teacher icon-large text-white"></i>
                    <p class="text-white text-left ml-2" style="display: inline-block"><b>Asesorias personalizadas</b> <br>Potencia tus conocimientos</p>
                </div>
                <div class="col-span-1 md:col-span-2 lg:col-span-1 text-center">
                    <i class="fas fa-hands-helping icon-large text-white"></i>
                    <p class="text-white text-left ml-2" style="display: inline-block"><b>Apoyo entre alumnos</b> <br>Potencia tus conocimientos</p>
                </div>
            </div>
        </div>
    </section>

    {{--  Contenido del sitio  --}}
    <section class="my-40">
        <h1 class="text-gray-600 text-center text-3xl mb-6 font-bold">Categorias</h1>

        <div class="max-w-7xl mx-auto px-10 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article class="rounded-3xl bg-white shadow-card">
                <figure >
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{asset('img/home/math.jpg')}}" alt="">
                </figure>
                <div class="my-8 mx-6">
                    <header class="">
                        <h1 class="text-xl font-bold text-gray-700">Matemáticas</h1>
                    </header>
    
                    <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi maiores veniam </p>

                    <p class="text-sm font-bold text-gray-500 mt-10">Ver todos los cursos <span class="text-md">></span></p>
                </div>
            </article>
            
            <article class="rounded-3xl bg-white shadow-card">
                <figure >
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{asset('img/home/programming.jpg')}}" alt="">
                </figure>
                <div class="my-8 mx-6">
                    <header class="">
                        <h1 class="text-xl font-bold text-gray-700">Programación</h1>
                    </header>
    
                    <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi maiores veniam </p>

                    <p class="text-sm font-bold text-gray-500 mt-10">Ver todos los cursos <span class="text-md">></span></p>
                </div>
            </article>

            <article class="rounded-3xl bg-white shadow-card">
                <figure >
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{asset('img/home/quimica.jpg')}}" alt="">
                </figure>
                <div class="my-8 mx-6">
                    <header class="">
                        <h1 class="text-xl font-bold text-gray-700">Química</h1>
                    </header>
    
                    <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi maiores veniam </p>

                    <p class="text-sm font-bold text-gray-500 mt-10">Ver todos los cursos <span class="text-md">></span></p>
                </div>
            </article>

            <article class="rounded-3xl bg-white shadow-card">
                <figure >
                    <img class="rounded-t-3xl h-36 w-full object-cover card-image" src="{{asset('img/home/electronica.jpg')}}" alt="">
                </figure>
                <div class="my-8 mx-6">
                    <header class="">
                        <h1 class="text-xl font-bold text-gray-700">Electrónica</h1>
                    </header>
    
                    <p class="text-sm text-gray-500 mt-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi maiores veniam </p>

                    <p class="text-sm font-bold text-gray-500 mt-10">Ver todos los cursos <span class="text-md">></span></p>
                </div>
            </article>
        </div>
    </section>

    {{--  Catalago de cursos  --}}
    <section class="mt-24 bg-primary py-12">
        <h1 class="text-center font-bold text-white text-3xl"> ¿No sabes que curso llevar? </h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y filtralos
             por categoría o nivel </p>

        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-white hover:bg-gray-500 hover:text-white text-primary font-bold py-2 px-4 rounded"> Catalago de cursos </a>
        </div>

    </section>
    
    {{-- Ultimos cursos --}}
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ULTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6"> Hay cursos nuevos diariamente</p>

        <div class="container grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course"/>
            @endforeach
        </div>
    </section>
    
</x-app-layout>