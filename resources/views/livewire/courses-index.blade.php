<div>    
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray700 mr-4 focus:outline-none" wire:click="resetFilters">
                <i class="fas fa-stream text-xs mr-2"></i> Todos los cursos
            </button>

            <!-- Dropdown categorias-->
            <div class="relative" x-data="{ open:false }">
                <button class="bg-white shadow block h-12 rounded-lg overflow-hidden focus:outline-none px-4 text-gray-700 mr-4" x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i> Categorias
                    <i fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="fas fa-angle-down text-sm ml-2 inline w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></i>                    
                </button>
                <!-- Dropdown Body -->                
                <div x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($categories as $category)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 hover:bg-blue-500 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open=false">{{$category->name}}</a>
                    @endforeach
                    
                </div>
            </div>

            <!-- Dropdown niveles -->
            <div class="relative" x-data="{ open:false }">
                <button class="bg-white shadow block h-12 rounded-lg overflow-hidden focus:outline-none px-4 text-gray-700" x-on:click="open = true">
                    <i class="fas fa-glasses text-sm mr-2"></i> Niveles                     
                    <i fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="fas fa-angle-down text-sm ml-2 inline w-4 h-4 mt-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></i>                    
                </button>
                <!-- Dropdown Body -->                
                <div x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">
                    @foreach ($levels as $level)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 hover:bg-blue-500 hover:text-white" wire:click="$set('level_id', {{$level->id}})" x-on:click="open=false">{{$level->name}}</a>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
            <x-course-card :course="$course"/>
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$courses->links()}}
    </div>
</div>
