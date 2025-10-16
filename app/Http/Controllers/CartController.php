<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Panier;
use App\Models\Puzzle;

class CartController extends Controller
{
    /**
     * 🧾 Afficher le panier
     */
    public function index()
    {
        if (Auth::check()) {
            // Panier du user connecté
            $panier = Panier::with('puzzles')
                ->where('id_utilisateur', Auth::id())
                ->where('status', 'en cours')
                ->first();

            return view('cart.index', compact('panier'));
        }

        // Panier invité (session)
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    /**
     * ➕ Ajouter un produit au panier
     */
    public function add($id, Request $request)
    {
        $quantite = $request->input('quantity', 1);
        $puzzle = Puzzle::findOrFail($id);

        if (Auth::check()) {
            // 🔹 Récupère ou crée le panier "en cours" de l'utilisateur
            $panier = Panier::firstOrCreate(
                ['id_utilisateur' => Auth::id(), 'status' => 'en cours'],
                ['total' => 0]
            );

            // 🔹 Vérifie si le produit existe déjà dans ce panier
            $existant = $panier->puzzles()->where('id_Puzzle', $id)->first();

            if ($existant) {
                // Met à jour la quantité
                $panier->puzzles()->updateExistingPivot($id, [
                    'quantite' => $existant->pivot->quantite + $quantite
                ]);
            } else {
                // Ajoute un nouveau produit
                $panier->puzzles()->attach($id, ['quantite' => $quantite]);
            }

            // 🔹 Recalcul du total
            $total = $panier->puzzles->sum(fn($p) => $p->prix * $p->pivot->quantite);
            $panier->update(['total' => $total]);

            return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
        }

        // 🔓 Utilisateur non connecté → panier stocké en session
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantite;
        } else {
            $cart[$id] = [
                'nom' => $puzzle->nom,
                'prix' => $puzzle->prix,
                'image' => $puzzle->image,
                'quantity' => $quantite,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier.');
    }

    /**
     * ♻️ Mettre à jour la quantité
     */
    public function update(Request $request, $id)
    {
        $quantite = (int) $request->input('quantity', 1);

        if (Auth::check()) {
            $panier = Panier::where('id_utilisateur', Auth::id())->where('status', 'en cours')->first();
            if ($panier) {
                $panier->puzzles()->updateExistingPivot($id, ['quantite' => $quantite]);
                $total = $panier->puzzles->sum(fn($p) => $p->prix * $p->pivot->quantite);
                $panier->update(['total' => $total]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantite;
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Quantité mise à jour.');
    }

    /**
     * 🗑️ Supprimer un produit
     */
    public function remove($id)
    {
        if (Auth::check()) {
            $panier = Panier::where('id_utilisateur', Auth::id())->where('status', 'en cours')->first();
            if ($panier) {
                $panier->puzzles()->detach($id);
                $total = $panier->puzzles->sum(fn($p) => $p->prix * $p->pivot->quantite);
                $panier->update(['total' => $total]);
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Produit supprimé.');
    }

    /**
     * ❌ Vider complètement le panier
     */
    public function clear()
    {
        if (Auth::check()) {
            $panier = Panier::where('id_utilisateur', Auth::id())->where('status', 'en cours')->first();
            if ($panier) {
                $panier->puzzles()->detach();
                $panier->update(['total' => 0]);
            }
        } else {
            session()->forget('cart');
        }

        return redirect()->route('cart.index')->with('success', 'Panier vidé.');
    }
}
