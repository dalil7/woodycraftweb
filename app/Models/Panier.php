<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    /**
     * 🔹 Nom de la table en base
     */
    protected $table = 'panier';

    /**
     * 🔹 Laravel ne doit pas essayer d’écrire dans created_at / updated_at
     */
    public $timestamps = false;

    /**
     * 🔹 Colonnes modifiables
     */
    protected $fillable = [
        'status',
        'total',
        'id_utilisateur',
    ];

    /**
     * 🔹 Un panier appartient à un utilisateur
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    /**
     * 🔹 Un panier contient plusieurs puzzles
     *    via la table pivot "appartient"
     *    → colonnes : id_Panier / id_Puzzle / quantite
     */
    public function puzzles()
    {
        return $this->belongsToMany(Puzzle::class, 'appartient', 'id_Panier', 'id_Puzzle')
                    ->withPivot('quantite'); // pas de withTimestamps() → pas d'erreur SQL
    }
}
