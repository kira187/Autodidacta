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
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
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
            <div class="grid grid-cols-3 gap-4 mt-6 -mx-2">
                <div class="col-span-2">
                    <a href="{{ url('login/google')}}" class="w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-medium text-sm rounded-lg px-4 py-2 border border-gray-300">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6" viewBox="0 0 48 48"><defs><path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"/><path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"/><path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"/><path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"/></svg>
                            <span class="ml-4"> Log in with Google</span>
                        </div>
                    </a>
                </div>
                <div class="col-span-1">
                    <a href="{{ url('login/facebook') }}" class="w-full block bg-white hover:bg-gray-100 focus:bg-gray-100 text-gray-900 font-medium text-sm rounded-lg px-4 py-2 border border-gray-300">
                        <div class="flex items-center justify-center">
                            <svg class="w-6 h-6" viewBox="0 0 167.657 167.657" xml:space="preserve"> <g> <path style="fill:#4267B2;" d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626 v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006 c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154 C167.657,37.881,130.125,0.349,83.829,0.349z"/> </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                        </div>
                    </a>
                </div>                
            </div>
        </div>
        <p class="mt-8 text-xs font-light text-center text-gray-400"> No tienes cuenta? <a href="{{ route('register') }}" class="font-medium text-gray-800 dark:text-gray-200 hover:underline">Crea una</a></p>
    </x-authentication-card>
</x-guest-layout>
