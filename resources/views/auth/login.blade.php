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
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="grid grid-cols-2 mt-10">
                <div class="col-span-2 lg:col-span-1">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                    </label>
                </div>

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

            <div class="flex justify-between items-center mt-1">
                <hr class="w-full border-gray-300"> 
                <span class="p-2 text-gray-400 text-xs">O</span>
                <hr class="w-full border-gray-300">
            </div>
            <div class="pt-2">
                <p class="text-gray-700 font-bold pb-2 pl-1" style="font-size: 10px;">Ingresa con:</p>
                <div class="flex justify-between items-center"> 
                    <button class="w-1/3 text-xs mx-1 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded focus:outline-none"> <i class="fab fa-facebook fa-2x"></i> </button>
                    <button class="w-1/3 text-xs mx-1 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded focus:outline-none"> <i class="fab fa-github fa-2x"></i> </button>
                    <button class="w-1/3 text-xs mx-1 bg-transparent hover:bg-gray-500 text-gray-500 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded focus:outline-none"> <i class="fab fa-google fa-2x"></i> </button>
                </div>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
