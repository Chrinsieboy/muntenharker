<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welkom bij MijnMuntenHarker! <br>
                    Naam: {{ Auth::user()->name }} <br>
                    Email: {{ Auth::user()->email }} <br>
                    <br>
                    Wanneer u problemen tegenkomt met uw account,<br>geef onze service desk uw Gebruikers ID mee. <br>
                    Gebruikers ID: {{ Auth::user()->id }}
                    <br>
                    <form method="POST" action="logout">
                        @csrf
                        <x-dropdown-link style="font-weight: bold; color:red;" :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{ __('Uitloggen') }}
                        </x-dropdown-link>
                    </form>
                    <form method="POST" action="destroyAccount">
                        @csrf
                        <x-dropdown-link style="font-weight: bold; color:red;" :href="route('destroyAccount')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{ __('Verwijder Account') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
