<div>
    <x-jet-dropdown align="right" width="w-80">
        <x-slot name="trigger">
            <button wire:click="markAsRead" class="items-center pt-1 text-sm font-poppins leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                Notificaciones
                @if ($count)
                    <span class="badget-notification"> {{ $count }} </span>
                @endif
            </button>
        </x-slot>

        <x-slot name="content">
            <div class="block px-4 py-2 text-xs text-gray-400">
                Actividad de cursos
            </div>

            <div class="divide-y-2">
                @foreach ($notifications as $notification)    
                    <x-jet-dropdown-link class="text-gray-700" href="{{ $notification->data['url'] }}">
                        {!! $notification->data['message'] !!}
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-right"> {{ $notification->created_at->diffForHumans() }} </span>
                        </div>
                    </x-jet-dropdown-link>
                @endforeach
            </div>
            <a href="#" class="block px-4 py-2 text-sm  font-semibold leading-5 text-white bg-gray-600 hover:bg-gray-800 transition duration-300 ease-in-out text-center">
                Ver todas las notificaciones
            </a>
        </x-slot>
    </x-jet-dropdown>
</div>


