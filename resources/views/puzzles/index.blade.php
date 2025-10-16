<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(isset($categorie))
                Puzzles de la catégorie : {{ $categorie->nom }}
            @else
                @lang('Liste des puzzles')
            @endif
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if($puzzles->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($puzzles as $puzzle)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        {{-- Image --}}
                        @if($puzzle->image)
                            <img src="{{ asset($puzzle->image) }}" 
                                 alt="{{ $puzzle->nom }}" 
                                 class="w-full h-56 object-cover rounded-t">
                        @else
                            <div class="w-full h-56 flex items-center justify-center bg-gray-100 text-gray-500 rounded-t">
                                Pas d'image
                            </div>
                        @endif

                        {{-- Infos produit --}}
                        <div class="p-4">
                            <h3 class="text-lg font-bold truncate">{{ $puzzle->nom }}</h3>
                            <p class="text-sm text-gray-500 mb-2">
                                Catégorie : {{ $puzzle->categorie->nom ?? '—' }}
                            </p>
                            <p class="text-indigo-600 font-bold text-lg mb-4">{{ $puzzle->prix }} €</p>

                            <div class="flex space-x-2">
                                <a href="{{ route('puzzles.show', $puzzle->id) }}"
                                   class="flex-1 text-center bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-600 text-sm">
                                   Voir détails
                                </a>
                                <a href="{{ route('cart.add', $puzzle->id) }}"
                                   class="flex-1 text-center bg-green-500 text-white px-3 py-2 rounded hover:bg-green-600 text-sm">
                                   🛒 Ajouter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-600 text-center">Aucun puzzle trouvé @if(isset($categorie)) pour cette catégorie @endif.</p>
        @endif
    </div>
</x-app-layout>
