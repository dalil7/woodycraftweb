<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            📦 Adresse de livraison
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto bg-white shadow rounded p-6 mt-6">
        <form method="POST" action="{{ route('checkout.adresse.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Numéro</label>
                <input type="text" name="numero" value="{{ old('numero', $adresse->numero ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Rue</label>
                <input type="text" name="rue" value="{{ old('rue', $adresse->rue ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Ville</label>
                <input type="text" name="ville" value="{{ old('ville', $adresse->ville ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Code postal</label>
                <input type="text" name="cp" value="{{ old('cp', $adresse->cp ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Pays</label>
                <input type="text" name="pays" value="{{ old('pays', $adresse->pays ?? '') }}"
                       class="w-full border rounded p-2">
            </div>

            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Valider mon adresse
            </button>
        </form>
    </div>
</x-app-layout>
