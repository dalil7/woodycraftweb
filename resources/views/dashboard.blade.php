<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Catégories</h1>
                <ul>
                    @forelse($categories as $categorie)
                        <li>
                            <a href="{{ route('puzzles.parCategorie', $categorie->id) }}"
                               class="text-blue-500 hover:underline">
                                {{ $categorie->nom }}
                            </a>
                        </li>
                    @empty
                        <li>Aucune catégorie disponible.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    
</div>
</x-app-layout>
