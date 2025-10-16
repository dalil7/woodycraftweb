<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Panier;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.checkout');
    }

    public function validerCommande(Request $request)
    {
        $request->validate([
            'paiement' => 'required',
        ]);

        // 🔹 Récupère le panier de l'utilisateur connecté
        $panier = null;
        if (Auth::check()) {
            $panier = Panier::with('puzzles')
                ->where('id_utilisateur', Auth::id())
                ->where('status', 'en cours')
                ->first();
        }

        // 🔹 Si aucun panier trouvé
        if (!$panier || $panier->puzzles->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        // --- Paiement via PayPal ---
        if ($request->paiement === 'paypal') {
            return redirect('https://www.paypal.com/fr/home');
        }

        // --- Paiement par chèque ---
        if ($request->paiement === 'cheque') {
            $total = $panier->puzzles->sum(function ($p) {
                return $p->prix * $p->pivot->quantite;
            });

            $pdf = Pdf::loadView('facture', [
                'panier' => $panier,
                'user' => Auth::user(),
                'total' => $total
            ]);

            return $pdf->download('facture_woodycraft.pdf');
        }

        return redirect()->back()->with('error', 'Méthode de paiement invalide.');
    }
}
