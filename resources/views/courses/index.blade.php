<x-app-layout>

    {{--  Header site  --}}
    <section class="bg-cover bg-white">
        <div class="container py-10 lg:py-36">
            <div class="grid gird-rows-1 grid-cols-1 lg:grid-cols-2">
                <div class="lg:pl-16 xl:pl-24 lg:pr-28 box-image">
                    <img class="inline" src="{{ asset('img/home/aprende.svg')}}" alt="...">
                </div>
                <div class="grid gird-rows-3 grid-cols-1 md:mx-20 lg:mx-0 lg:mr-28 box-center">
                    <div>   
                        <h1 class="font-popins title-header font-bold text-black text-4xl text-gray-700 text-center lg:text-left">Ingresa el curso que estas buscando.</h1>
                        <p class="text-black text-lg mt-0 mb-10 md:mb-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus tenetur sunt laboriosam ratione quos eos laborum quam dolor.</p>
                        
                        @livewire('search')
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    @livewire('courses-index')
</x-app-layout>