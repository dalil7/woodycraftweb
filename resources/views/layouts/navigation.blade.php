<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Accueil
                    </x-nav-link>

                    <x-nav-link :href="route('puzzles.index')" :active="request()->routeIs('puzzles.*')">
                        Boutique
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown + Cart -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- Bouton Panier --}}
                <a href="{{ route('cart.index') }}" 
                   class="relative inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                    🛒
                    @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs font-bold rounded-full px-1">
                            {{ count(session('cart')) }}
                        </span>
                    @endif
                </a>

                {{-- Si utilisateur connecté --}}
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->prenom ?? Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                {{-- Si invité (non connecté) --}}
                @guest
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 text-sm font-medium px-4">
                        Connexion
                    </a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900 text-sm font-medium">
                        Inscription
                    </a>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
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
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                Accueil
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('puzzles.index')" :active="request()->routeIs('puzzles.*')">
                Boutique
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart.index')">
                🛒 Panier
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="ml-2 bg-red-500 text-white text-xs font-bold rounded-full px-2">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                        {{ Auth::user()->prenom ?? Auth::user()->name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        Profil
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                            Déconnexion
                        </x-responsive-nav-link>
                    </form>
                </div>
            @endauth

            @guest
                <div class="px-4 space-y-2">
                    <a href="{{ route('login') }}" class="block text-gray-700 hover:text-gray-900">Connexion</a>
                    <a href="{{ route('register') }}" class="block text-gray-700 hover:text-gray-900">Inscription</a>
                </div>
            @endguest
        </div>
    </div>
</nav>
