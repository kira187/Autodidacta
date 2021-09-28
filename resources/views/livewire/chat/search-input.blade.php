<div class="input-group input-group-merge ml-1 w-100">
    <div class="input-group-prepend">
        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
    </div>
    <input type="text" class="form-control round" id="chat-search" placeholder="Buscar instructor" />
    {{-- wire:model.debounce.500ms="search" --}}
    {{-- @if (strlen($this->search) > 0)
        <h2 class="text-base text-white foont-bold ml-3">Usuarios</h2>
        @forelse ($users as $user)
            <a href="{{ route('chat', ['id' => $user->id ]) }}" class="flex py-3 px-2 hover:bg-gray-700">
                <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('js/icon.jpg')}}" alt="{{ Auth::user()->name }}" />
                <h3 class="text-white font-semibold text-base ml-2">{{ $user->name }}</h3>
            </a>
        @empty
            <div class="text-base text-white foont-bold ml-3 text-center w-full mb-3"> No se encontraron resultados</div>
        @endforelse
    @endif --}}
</div>
