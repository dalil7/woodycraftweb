<x-app-layout>
    <div class="py-16 bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="max-w-lg w-full bg-white p-10 rounded-2xl shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-center">💳 Choisissez votre mode de paiement</h2>

            <div class="mb-6 text-center">
                <p class="font-medium text-gray-700">👤 {{ Auth::user()->prenom ?? '' }} {{ Auth::user()->nom ?? Auth::user()->name ?? '' }}</p>
                <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>

            <form method="POST" action="{{ route('commande.valider') }}" class="space-y-4">
                @csrf

                <label class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition">
                    <input type="radio" name="paiement" value="cheque" required class="text-green-600 focus:ring-green-500">
                    <span class="text-gray-800">🧾 Paiement par chèque</span>
                </label>

                <label class="flex items-center space-x-3 border border-gray-200 rounded-lg p-3 hover:bg-gray-50 transition">
                    <input type="radio" name="paiement" value="paypal" required class="text-green-600 focus:ring-green-500">
                    <span class="text-gray-800">💰 Paiement par PayPal</span>
                </label>

                <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                    <a href="{{ route('cart.index') }}" 
                       class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
                        ⬅ Retour
                    </a>

                    <button type="submit" 
                            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 shadow-md transition">
                        ✅ Valider
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
