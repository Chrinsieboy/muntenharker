<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="logo">
            <a href="/" class="logo">
                <img class="logo" src="{{ asset('images/Logo-text-gold.png') }}" alt="Logo Muntenharker">
            </a>
        </x-slot>

        {{-- <a href="/">
            <img class="logo" src="{{ asset('images/Logo-text-gold.png') }}" alt="">
        </a> --}}

        <h1 class="ml-3 text-center font-size-30">Inloggen</h1>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 text-center" :errors="$errors" />


        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                {{-- <x-label for="email" :value="__('Email')" /> --}}

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus placeholder="Emailadres" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                {{-- <x-label for="password" :value="__('Password')" /> --}}

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" placeholder="Wachtwoord" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Onthoud me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 underline hover:text-gray-900"
                        href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten? ') }}
                    </a>
                @endif

                <div class="ml-3">

                    <a class="ml-3 button" href="{{ route('register') }}">
                        {{ __('Registreren') }}
                    </a>
                </div>

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
