@php
    $nav_links = [
        [
            'name' => 'Inicio',
            'route' => route('home'),
            'active' => request()->routeIs('home')
        ],
        [
            'name' => 'Cursos',
            'route' => route('courses.index'),
            'active' => request()->routeIs('courses.*')
        ],
        [
            'name' => 'Descubre',
            'route' => route('courses.index'),
            'active' => request()->routeIs('instructor.*')
        ],
    ]
@endphp
<nav x-data="{ open: false }" class="bg-white mt-2">
    <!-- Primary Navigation Menu -->
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}"  class="font-poppins font-bold text-2xl text-primary">
                        Autodidacta
                    </a>
                </div>

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">                    

                    @foreach ($nav_links as $nav_link)
                        <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-nav-link>                    
                    @endforeach
                </div> --}}
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <div class=" space-x-8 sm:-my-px sm:mr-10">                    
                    @foreach ($nav_links as $nav_link)
                        <x-jet-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-nav-link>                    
                    @endforeach
                </div>
                @auth
                     <div x-data="{ isOpen: false }">
                    {{--     <button @click="isOpen = !isOpen" class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1 text-sm font-poppins leading-5 text-gray-500 hover:text-gray-700">Mis cursos</span>
                            <span>
                                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" > <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                            </span>
                        </button>  --}}
                  <button @click="isOpen = !isOpen" class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring">
                    <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                    </svg>
                  </button>

                  <!-- Dropdown -->
                  <div @click.away="isOpen = false" @keydown.escape="isOpen = false" x-show.transition.opacity="isOpen" class="absolute mt-3 transform bg-white rounded-md shadow-lg z-10 -translate-x-2/4 min-w-max" style="">
                    <ul class="flex flex-col p-2 my-3 space-y-3">
                      <li>
                        <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                          <span class="block mt-1">
                            <div class="pl-2 w-16">
                                <img class="w-12 h-12 rounded-lg" src="https://source.unsplash.com/50x50/?nature">
                            </div>
                            
                          </span>
                          <span class="flex flex-col">
                            <span class="text-lg">Atlassian</span>
                            <span class="text-sm text-gray-400">Lorem ipsum dolor sit.</span>
                          </span>
                        </a>
                      </li>
                      <li>
                        <a href="#" class="flex items-start px-2 py-1 space-x-2 rounded-md hover:bg-gray-100">
                          <span class="block mt-1">
                            <svg class="w-6 h-6 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                          </span>
                          <span class="flex flex-col">
                            <span class="text-lg">Slack</span>
                            <span class="text-sm text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</span>
                          </span>
                        </a>
                      </li>
                    </ul>
                    <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                      <a href="#">Ir a mis cursos</a>
                    </div>
                  </div>
                </div>
                    {{--  <div class="group sm:-my-px sm:mr-10">
                        <button class="outline-none focus:outline-none px-3 py-1 bg-white rounded-sm flex items-center min-w-32">
                            <span class="pr-1 flex-1 text-sm font-poppins leading-5 text-gray-500 hover:text-gray-700">Mis cursos</span>
                            <span>
                                <svg class="fill-current h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" > <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                            </span>
                        </button>
                        <ul class="bg-white group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top mt-2 transform rounded-md shadow-lg w-70 scale-0">
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                <div class="flex items-center justify-between my-2 mr-4">
                                    <div class="pl-2 w-16">
                                        <img class="w-12 h-12 rounded-lg" src="https://source.unsplash.com/50x50/?nature">
                                    </div>
                                    <div class="flex-1 pl-2">
                                        <div class="text-gray-700 font-semibold">
                                            PHP Developers
                                        </div>
                                        <div class="text-gray-600 font-thin">
                                            Web House
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                <div class="flex items-center justify-between my-2 mr-4">
                                    <div class="pl-2 w-16">
                                        <img class="w-12 h-12 rounded-lg" src="https://source.unsplash.com/50x50/?nature">
                                    </div>
                                    <div class="flex-1 pl-2">
                                        <div class="text-gray-700 font-semibold">
                                            PHP Developers
                                        </div>
                                        <div class="text-gray-600 font-thin">
                                            Web House
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                <div class="flex items-center justify-between my-2 mr-4">
                                    <div class="pl-2 w-16">
                                        <img class="w-12 h-12 rounded-lg" src="https://source.unsplash.com/50x50/?nature">
                                    </div>
                                    <div class="flex-1 pl-2">
                                        <div class="text-gray-700 font-semibold">
                                            PHP Developers
                                        </div>
                                        <div class="text-gray-600 font-thin">
                                            Web House
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
                                    <a href="#">Ir a mis cursos</a>
                                </div>
                            </li>
                        </ul>
                        
                    </div>  --}}
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @can('Leer cursos')
                                <x-jet-dropdown-link href="{{ route('instructor.courses.index') }}">
                                    Instructor
                                </x-jet-dropdown-link>    
                            @endcan

                            @can('Ver dashboard')
                                <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                    Administrador
                                </x-jet-dropdown-link>    
                            @endcan
                            
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach

                                <div class="border-t border-gray-100"></div>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    
                    <a href="{{ route('login') }}" class="bg-gray-500 hover:bg-gray-600 text-white text-sm font-poppins font-light	py-2 px-4 mr-2  rounded-full">
                        Iniciar sesión
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-poppins font-light	py-2 px-4 rounded-full">
                            Registrate
                        </a>
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            
            @foreach ($nav_links as $nav_link)
                <x-jet-responsive-nav-link href="{{ $nav_link['route'] }}" :active="$nav_link['active']">
                    {{ $nav_link['name'] }}
                </x-jet-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @can('Leer cursos')
                    <x-jet-responsive-nav-link href="{{ route('instructor.courses.index') }}">
                        Instructor
                    </x-jet-responsive-nav-link>    
                    @endcan

                    @can('Ver dashboard')
                        <x-jet-responsive-nav-link href="{{ route('admin.home') }}">
                            Administrador
                        </x-jet-responsive-nav-link>
                    @endcan                    

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @else
            <div class="py-1 border-t border-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Login
                </x-jet-responsive-nav-link>
                <x-jet-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Register
                </x-jet-responsive-nav-link>
            </div>
        @endauth
        
    </div>
</nav>

