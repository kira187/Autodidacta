
<form class="pt-2 relative text-gray-600" autocomplete="off">
    <input wire:model="search" class="w-full shadow-search bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="buscar...">

    <button type="submit" class="absolute right-0 top-0 mt-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-10 rounded"> Buscar </button>

    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                    <a href="{{route('courses.info', $result)}}">{{$result->title}}</a>
                </li>
            @empty
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                    Sin coincidencias
                </li>
            @endforelse
        </ul>
    @endif
</form>

{{-- <form class="pt-2 relative text-gray-600" autocomplete="off">
    <div class="flex rounded-full w-full shadow-search">
        <input wire:model="search" class="rounded-l-full w-full py-2 px-6 text-gray-700 leading-tight focus:outline-none" type="search" name="search" placeholder="Buscar...">
        <div class="p-1">
            <button type="submit" class="bg-blue-500 text-white rounded-full p-2 hover:bg-blue-400 focus:outline-none w-10 h-10 flex items-center justify-center">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    @if ($search)
        <ul class="absolute z-50 left-0 w-full bg-white mt-2 rounded-xl overflow-hidden shadow-lg">
            @forelse ($this->results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-200">
                    <a href="{{route('courses.info', $result)}}">{{$result->title}}</a>
                </li>
            @empty
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-200">
                    Sin coincidencias
                </li>
            @endforelse
        </ul>
    @endif
</form> --}}
