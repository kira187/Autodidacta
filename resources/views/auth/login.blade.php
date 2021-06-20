<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="grid my-5">
                <div class="col-span-2 lg:col-span-1">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-500 hover:text-gray-900 font-semi-bold" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                </div>
            </div>
            <x-button class="mt-4 w-full px-6">
                {{ __('Login') }}
            </x-button>
        </form>

        <div class="flex items-center justify-between mt-4">
            <span class="w-2/6 border-b dark:border-gray-600"></span>
            <a href="#" class="text-xs text-center text-gray-500 uppercase dark:text-gray-400">o ingresa con</a>
            <span class="w-2/6 border-b dark:border-gray-400"></span>
        </div>
        <div class="pt-2">
            <div class="flex items-center mt-6 -mx-2">
                <a href="{{ route('auth.google')}} " class="flex items-center justify-center w-full px-6 py-2 mx-2 text-sm font-medium text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:bg-blue-400 focus:outline-none">
                    <svg class="w-4 h-4 mx-2 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M12.24 10.285V14.4h6.806c-.275 1.765-2.056 5.174-6.806 5.174-4.095 0-7.439-3.389-7.439-7.574s3.345-7.574 7.439-7.574c2.33 0 3.891.989 4.785 1.849l3.254-3.138C18.189 1.186 15.479 0 12.24 0c-6.635 0-12 5.365-12 12s5.365 12 12 12c6.926 0 11.52-4.869 11.52-11.726 0-.788-.085-1.39-.189-1.989H12.24z">
                        </path>
                    </svg>
    
                    <span class="hidden mx-2 sm:inline">Sign in with Google</span>
                </button>
    
                <a href="#" class="p-2 mx-2 text-sm font-medium text-gray-500 transition-colors duration-200 transform bg-gray-300 rounded-md hover:bg-gray-200"> <i class="fab fa-facebook-square fa-lg"></i></a>
            </div>
        </div>
        <p class="mt-8 text-xs font-light text-center text-gray-400"> No tienes cuenta? <a href="{{ route('register') }}" class="font-medium text-gray-800 dark:text-gray-200 hover:underline">Crea una</a></p>
    </x-authentication-card>
</x-guest-layout>
