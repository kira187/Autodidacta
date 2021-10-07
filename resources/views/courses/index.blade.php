<x-app-layout>
    {{--  Header site  --}}
    <section class="bg-cover bg-white">
        <div class="container py-10 lg:py-36">
            <div class="grid gird-rows-1 grid-cols-1 lg:grid-cols-2">
                <div class="lg:pl-16 xl:pl-24 lg:pr-28 box-image">
                    <img class="inline" src="{{ asset('img/home/busca.svg')}}" alt="...">
                </div>
                <div class="grid gird-rows-3 grid-cols-1 md:mx-20 lg:mx-0 lg:mr-28 box-center">
                    <div>
                        <h1 class="font-popins title-header font-bold text-4xl text-gray-700 text-center lg:text-left leading-tight">Ingresa el curso que estás buscando.</h1>
                        <p class="text-black text-lg mt-0 mb-10 md:mb-14">Aquí encontrarás una gran variedad de cursos que pueden ser útiles para cumplir con tus tareas, explora y aprende.</p>
                        @livewire('search')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout>