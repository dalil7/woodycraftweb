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

    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow pt-6">
                    <table class="min-w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-2 py-2 text-xs text-gray-500">#</th>
                                <th class="px-2 py-2 text-xs text-gray-500">Nom</th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                                <th class="px-2 py-2 text-xs text-gray-500"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($puzzles as $puzzle)
                                <tr class="whitespace-nowrap">
                                    <td class="px-4 py-4 text-sm text-gray-500">{{ $puzzle->id }}</td>
                                    <td class="px-4 py-4">{{ $puzzle->nom }}</td>

                                    <x-link-button href="{{ route('puzzles.show', $puzzle->id) }}">
                                        @lang('Afficher')
                                    </x-link-button>

                                    <x-link-button href="{{ route('puzzles.edit', $puzzle->id) }}">
                                        @lang('Modifier')
                                    </x-link-button>

                                    <x-link-button
                                        onclick="event.preventDefault(); document.getElementById('destroy{{ $puzzle->id }}').submit();">
                                        @lang('Supprimer')
                                    </x-link-button>

                                    <form id="destroy{{ $puzzle->id }}" action="{{ route('puzzles.destroy', $puzzle->id) }}"
                                          method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">
                                        Aucun puzzle trouvé @if(isset($categorie)) pour cette catégorie @endif.
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
