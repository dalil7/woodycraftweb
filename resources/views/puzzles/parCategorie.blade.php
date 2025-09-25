<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Puzzles de la catégorie : {{ $categorie->nom }}
        </h2>
    </x-slot>

    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow pt-6">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-2 text-xs text-gray-500">#</th>
                                <th class="px-2 py-2 text-xs text-gray-500">Nom</th>
                                <th class="px-2 py-2 text-xs text-gray-500">Description</th>
                                <th class="px-2 py-2 text-xs text-gray-500">Prix</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($puzzles as $puzzle)
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $puzzle->id }}</td>
                                    <td class="px-4 py-4">{{ $puzzle->nom }}</td>
                                    <td class="px-4 py-4">{{ $puzzle->description }}</td>
                                    <td class="px-4 py-4">{{ $puzzle->prix }} €</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-center text-gray-500">
                                        Aucun puzzle trouvé pour cette catégorie.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
