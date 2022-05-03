<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo" class="logo">
            <a href="/" class="logo">
                <img class="logo" src="{{ asset('images/Logo-text-gold.png') }}" alt="Logo Muntenharker">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Wachtwoord vergeten? Dat is geen probleem. Vul je emailadres hier onder in en wij mailen je een wachtwoord reset link die je een nieuw wachtwoord laat kiezen.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                {{-- <x-label for="email" :value="__('Email')" /> --}}

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Emailadres" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email wachtwoord Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
