<x-app-layout>
    {{-- <div id="Sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="nav-logo" href="/"><img src="{{ asset('images/Logo-text-gold.png') }}" alt="Logo"></a>
        <a class="navlink {{ request()->is('/') ? 'active' : '' }}" href="/">Dashboard</a>
        <a class="navlink {{ request()->is('/transactions') ? 'active' : '' }}" href="/transactions">Transacties</a>
        <a class="navlink {{ request()->is('/uitgaven') ? 'active' : '' }}" href="/uitgaven">Uitgaven</a>
        <a class="navlink {{ request()->is('/inkomen') ? 'active' : '' }}" href="/inkomen">Inkomen</a>
        <a class="navlink {{ request()->is('/categorie') ? 'active' : '' }}" href="/categorie">Categorieën</a>
        <div class="navbottom">
            @if (Auth::user()->admin)
                <a href="navlink-bottom {{ request()->is('/Adminpanel') ? 'active' : '' }}"
                    href="/adminpanel">Adminpanel</a>
            @endif
            <a class="navlink-bottom {{ request()->is('/mijn-muntenharker') ? 'active' : '' }}"
                href="/mijn-muntenharker">MijnMuntenharker</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link class="navlink-bottom" :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Uitloggen') }}
                </x-dropdown-link>
            </form>
        </div>
    </div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ request()->is('/') ? 'Dashboard' : 'Dashboard' }}
            {{ request()->is('/uitgaven') ? 'Uitgaven' : '' }}
            {{ request()->is('/inkomen') ? 'Inkomen' : '' }}
            {{ request()->is('/categorie') ? 'Categorie' : '' }}
            {{ request()->is('/mijn-muntenharker') ? 'Mijn Munteharker' : '' }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center" style="font-size: 50px">Uitgaven</h1>
                    <div class="form">
                        <form method="POST" class="text-center">
                            @csrf
                            <input type="text" name="name" id="" placeholder="Naam">
                            <select name="category" id="" class="">
                                <option value="">Kies een categorie</option>
                                <option value="1">Blauw</option>
                                <option value="2">Geel</option>
                                <option value="3">Groen</option>
                                <option value="4">Rood</option>
                                {{-- @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach --}}
                            </select>
                            <select name="type">
                                <option value="-" class="">-</option>
                            </select>
                            <input type="number" step="0.01" name="value" placeholder="Bijvoorbeeld 5 of 10">
                            <button type="submit" class="btn">Verzenden</button>
                        </form>
                    </div>
                    {{-- {{ $error }} --}}
                    {{-- <div class="">
                        @if ($error)
                        {{$error}}
                        @endif
                    </div> --}}
                    <br>
                    <div class="list">
                        <table class="all-transactions">
                            <thead>
                                <tr>
                                    <th>Transactie ID</th>
                                    <th>Transactie Naam</th>
                                    <th>Transactie Categorie</th>
                                    <th>Transactie type</th>
                                    <th>Transactie hoeveelheid</th>
                                    <th>Transactie aangemaakt</th>
                                    <th>Verwijder</th>
                                <tr>
                            </thead>
                            @forelse ($transactions_all as $transaction)
                                <tbody>
                                    <tr>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->category_id }}</td>
                                        <td>{{ $transaction->type }}</td>
                                        <td>&euro;{{ $transaction->value }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        {{-- <td>X</td> --}}
                                        <td>
                                            <form method="post" class="text-center"
                                                action="{{ route('uitgaven.destroy', $transaction->id) }}">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm ">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @empty
                        </table>
                        <p class="text-center">Er zijn geen transacties</p>
                        @endforelse
                        </table>
                        <div>
                        </div>
                        <br>
                        <div>
                            {{-- <h1>Totaal aantal munten: &euro; {{ $transaction_total }}</h1> --}}
                            {{-- <h1>Munten ontvangen: &euro; {{ $transactions_total_inkomen }}</h1> --}}
                            <h1>Munten verloren: &euro; {{ $transactions_total_uitgaven }}</h1>
                            <h1>Totaal aantal Transacties: {{ $transactions_total_id }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
