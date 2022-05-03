<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="logo">
            <a href="/" class="logo">
                <img class="logo" src="{{ asset('images/Logo-text-gold.png') }}" alt="Logo Muntenharker">
            </a>
        </x-slot>

        <h1 class="text-center ml-3 font-size-30">Registreer</h1>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                {{-- <x-label for="name" :value="__('Name')" /> --}}

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Naam" required autofocus />
            </div>

            <!-- Panel Position -->
            <div>
                {{-- <x-label for="panelposition" :value="Gebruiker" /> --}}
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                {{-- <x-label for="email" :value="__('Email')" /> --}}

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Emailadres" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                {{-- <x-label for="password" :value="__('Password')" /> --}}

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Wachtwoord"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                {{-- <x-label for="password_confirmation" :value="__('Confirm Password')" /> --}}

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required
                                placeholder="Bevestig wachtwoord"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Al geregistreerd?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registreer') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
