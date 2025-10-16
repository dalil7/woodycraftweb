<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use Illuminate\Support\Facades\Auth;

class AdresseController extends Controller
{
    public function form()
    {
        // Vérifie si l’utilisateur a déjà une adresse
        $adresse = Adresse::where('user_id', Auth::id())->first();

        return view('checkout.adresse', compact('adresse'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:10',
            'rue' => 'required|string|max:150',
            'ville' => 'required|string|max:100',
            'cp' => 'required|string|max:20',
            'pays' => 'required|string|max:100',
        ]);

        // On cherche si une adresse existe déjà
        $adresse = Adresse::where('user_id', Auth::id())->first();

        if ($adresse) {
            // Mise à jour
            $adresse->update($request->only('numero', 'rue', 'ville', 'cp', 'pays'));
        } else {
            // Nouvelle adresse
            Adresse::create([
                'numero' => $request->numero,
                'rue' => $request->rue,
                'ville' => $request->ville,
                'cp' => $request->cp,
                'pays' => $request->pays,
                'user_id' => Auth::id(),
            ]);
        }

        // 🔁 Au lieu de revenir au panier, on redirige vers la page de paiement
        return redirect()->route('checkout.show')
                 ->with('success', 'Adresse enregistrée avec succès ✅');

    }
}
