<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MuntenHarker</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-background.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/65a6759121.js" crossorigin="anonymous"></script>

</head>

<body class="font-sans">
    <div id="Top"></div>
    @if (Auth::check())
    <div id="Sidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a class="nav-logo" href="/"><img src="{{ asset('images/Logo-text-gold.png') }}" alt="Logo"></a>
        <a class="navlink {{ request()->is('/dashboard') ? 'active' : '' }}" href="/dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        {{-- Dashboard icon --}}
        
        <a class="navlink {{ request()->is('/transactions') ? 'active' : '' }}" href="/transactions"><i class="fas fa-euro-sign"></i> Transacties</a>
        {{-- <a class="navlink {{ request()->is('/uitgaven') ? 'active' : '' }}" href="/uitgaven">Uitgaven</a> --}}
        {{-- <a class="navlink {{ request()->is('/inkomen') ? 'active' : '' }}" href="/inkomen">Inkomen</a> --}}
        <a class="navlink {{ request()->is('/categorie') ? 'active' : '' }}" href="/categorie"><i class="fas fa-tags"></i> Categorieën</a>
        <a class="navlink {{ request()->is('/spaardoelen') ? 'active' : '' }}" href="/spaardoelen"><i class="fas fa-piggy-bank"></i> Spaardoelen</a>
        <div class="navbottom">
            <a class="navlink {{ request()->is('/kennisbank') ? 'active' : '' }}" href="/kennisbank"><i class="fas fa-book"></i> Kennisbank</a>
            @if (Auth::user()->admin)
                <a href="adminpanel"
                    class="navlink-bottom {{ request()->is('/adminpanel') ? 'active' : '' }}"><i class="fas fa-cog"></i>Adminpanel</a>
            @endif
            <a class="navlink-bottom navlink-bottom-account {{ request()->is('/mijn-muntenharker') ? 'active' : '' }}"
                href="/mijn-muntenharker" >Mijn Muntenharker</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link class="navlink-bottom" :href="route('logout')" onclick="event.preventDefault();
                                this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Uitloggen
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
    </x-slot>
    @elseif (!Auth::check())
    @endif
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    @if (Auth::check())
                        <div class="openbtn">
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()"><i
                                    class="fas fa-bars"></i></span>
                        </div>
                    @elseif (!Auth::check())
                        <!-- Navigation Links -->
                        <div class="space-x-8 sm:flex bg:flex">
                            <x-nav-link :href="route('home.index')" :active="request()->routeIs('Home')">
                                {{ __('Home') }}
                            </x-nav-link>
                            <x-nav-link :href="route('kennisbank.index')" :active="request()->routeIs('Kennisbank')">
                                {{ __('Kennisbank') }}
                            </x-nav-link>
                        </div>
                    @endif
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        @if (!Auth::check())
                            <x-slot name="trigger">
                                <x-nav-link :href="route('login')" :active="request()->routeIs('Login')">
                                    {{ __('Login') }}
                                </x-nav-link>
                                <x-nav-link :href="route('register')" :active="request()->routeIs('Registreer')">
                                    {{ __('Registreer') }}
                                </x-nav-link>
                            </x-slot>

                            <x-slot name="content">

                            </x-slot>
                        @else
                            <x-slot name="trigger">
                                <button
                                    class="flex text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300">
        
                                    <?php if (Auth::user()->admin): ?>
                                    <div class="flex" style="text-align: right"><p>{{ Auth::user()->name }}<br><i class="fas fa-user-cog"></i> Admin</p></div>
        
                                    <?php else: ?>
                                    <div class="flex" style="text-align: right"><p>{{ Auth::user()->name }}<br><i class="fas fa-user"></i> Gebruiker</p></div>
        
                                    <?php endif ?>
        
        
        
                                    <div class="ml-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <!-- Authentication -->
                                <x-dropdown-link :href="route('mijn-muntenharker.index')">
                                    {{ __('Mijn MuntenHarker') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Uitloggen
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        @endif
                    </x-dropdown>

                </div>

                <!-- Hamburger -->
                <div class="flex items-center -mr-2 sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                {{-- test --}}
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    {{-- <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div> --}}
                    {{-- <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div> --}}
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Authentication -->
                    <x-dropdown-link :href="route('login')">
                        {{ __('Log in') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('register')">
                        {{ __('Registreer') }}
                    </x-dropdown-link>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img style="height: 153px;margin-left: auto;margin-right: auto;" src="/images/Logo-text-gold.png"
                        alt="Man met hark">
                    <h1 class="py-2 text-center font-size-30">Welkom bij MuntenHarker</h1>
                    <p>Boekhouding is een belangrijke aspect van een bedrijf. <br>Het is belangrijk dat u de
                        boekhouding goed overziet en dat u deze goed doet. Met MuntenHarker kun je de boekhouding van je
                        bedrijf makkelijker maken.<br>
                        Niet meer moeilijke boekhoudingstappen, maar een eenvoudige interface om de boekhouding te doen.
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

<script src="{{ asset('js/navbar.js') }}" defer></script>

</html>

{{-- <x-app-layout>

</x-app-layout> --}}
