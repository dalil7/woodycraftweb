<x-app-layout>
    <div class="max-w-5xl mx-auto py-16 px-4 bg-white">
        <h1 class="text-3xl font-bold mb-8 text-center">🛒 Mon panier</h1>

        {{-- ✅ Cas 1 : utilisateur connecté (panier en base) --}}
        @if(Auth::check() && isset($panier) && $panier && $panier->puzzles->count() > 0)
            <table class="w-full border-t border-gray-200">
                <thead>
                    <tr class="text-gray-500 uppercase text-sm border-b">
                        <th class="py-3 text-left">Produit</th>
                        <th class="py-3 text-left">Quantité</th>
                        <th class="py-3 text-left">Prix</th>
                        <th class="py-3 text-right">Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($panier->puzzles as $p)
                        @php $subtotal = $p->prix * $p->pivot->quantite; $total += $subtotal; @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 flex items-center space-x-4">
                                <img src="{{ asset($p->image) }}" class="w-16 h-16 object-cover rounded-lg">
                                <span>{{ $p->nom }}</span>
                            </td>
                            <td>{{ $p->pivot->quantite }}</td>
                            <td>{{ number_format($p->prix, 2, ',', ' ') }} €</td>
                            <td class="text-right font-semibold">{{ number_format($subtotal, 2, ',', ' ') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-8">
                <p class="text-xl font-bold">Total : {{ number_format($total, 2, ',', ' ') }} €</p>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('cart.clear') }}" 
                   class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                    Vider le panier
                </a>
                <a href="{{ route('checkout.adresse') }}" 
                   class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
                    Valider la commande →
                </a>
            </div>

        {{-- ✅ Cas 2 : utilisateur non connecté (panier en session) --}}
        @elseif(isset($cart) && is_array($cart) && count($cart) > 0)
            <table class="w-full border-t border-gray-200">
                <thead>
                    <tr class="text-gray-500 uppercase text-sm border-b">
                        <th class="py-3 text-left">Produit</th>
                        <th class="py-3 text-left">Quantité</th>
                        <th class="py-3 text-left">Prix</th>
                        <th class="py-3 text-right">Sous-total</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $subtotal = $item['prix'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 flex items-center space-x-4">
                                <img src="{{ asset($item['image']) }}" class="w-16 h-16 object-cover rounded-lg">
                                <span>{{ $item['nom'] }}</span>
                            </td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['prix'], 2, ',', ' ') }} €</td>
                            <td class="text-right font-semibold">{{ number_format($subtotal, 2, ',', ' ') }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right mt-8">
                <p class="text-xl font-bold">Total : {{ number_format($total, 2, ',', ' ') }} €</p>
            </div>

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('cart.clear') }}" 
                   class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                    Vider le panier
                </a>
                <a href="{{ route('login') }}" 
                   class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">
                    Se connecter pour commander →
                </a>
            </div>

        {{-- 🕳 Cas 3 : panier vide --}}
        @else
            <p class="text-center text-gray-500 text-lg">Votre panier est vide.</p>
        @endif
    </div>
</x-app-layout>
