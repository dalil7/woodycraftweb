<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Passer commande</h2>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('checkout.store') }}" class="bg-white p-6 rounded shadow">
            @csrf

            <h3 class="text-lg font-bold mb-4">Adresse de livraison</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm">Numéro</label>
                    <input type="text" name="numero" value="{{ old('numero', $adresse->numero ?? '') }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm">Rue</label>
                    <input type="text" name="rue" value="{{ old('rue', $adresse->rue ?? '') }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm">Ville</label>
                    <input type="text" name="ville" value="{{ old('ville', $adresse->ville ?? '') }}" class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm">Code Postal</label>
                    <input type="text" name="cp" value="{{ old('cp', $adresse->cp ?? '') }}" class="w-full border rounded p-2">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm">Pays</label>
                    <input type="text" name="pays" value="{{ old('pays', $adresse->pays ?? '') }}" class="w-full border rounded p-2">
                </div>
            </div>

            <button type="submit" class="mt-6 bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Enregistrer & Continuer
            </button>
        </form>
    </div>
</x-app-layout>
