<x-app-layout>
    <div class="max-w-6xl mx-auto py-16 px-6 bg-white">
        <div class="grid md:grid-cols-2 gap-10 items-center">
            
            {{-- Image produit --}}
            <div class="bg-gray-50 rounded-lg shadow-sm flex justify-center items-center h-96">
                @if($puzzle->image)
                    <img src="{{ asset($puzzle->image) }}" alt="{{ $puzzle->nom }}" class="max-h-80 object-contain">
                @else
                    <span class="text-gray-400">Pas d'image disponible</span>
                @endif
            </div>

            {{-- Infos produit --}}
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $puzzle->nom }}</h1>
                <p class="text-gray-600 mb-6">{{ $puzzle->description }}</p>

                <p class="mb-2"><span class="font-semibold">Catégorie :</span> {{ $puzzle->categorie->nom ?? '—' }}</p>
                <p class="mb-4"><span class="font-semibold">Stock :</span> {{ $puzzle->stock }}</p>

                <p class="text-3xl font-bold text-indigo-600 mb-6">{{ $puzzle->prix }} €</p>

                <form action="{{ route('cart.add', $puzzle->id) }}" method="GET" class="flex space-x-4 items-center">
                    <input type="number" name="quantity" value="1" min="1" max="{{ $puzzle->stock }}"
                           class="w-20 border rounded text-center">
                    <button type="submit" class="bg-black text-white px-6 py-3 rounded-lg shadow hover:bg-gray-800 transition">
                        🛒 Ajouter au panier
                    </button>
                    <a href="{{ route('home') }}" class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg shadow hover:bg-gray-300 transition">
                        Retour
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
