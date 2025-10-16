<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    use HasFactory;

    protected $table = 'puzzles';

    protected $fillable = [
        'nom',
        'id_categorie',
        'description',
        'image',
        'prix',
        'stock',
    ];

    /**
     * 🔹 Un puzzle appartient à une catégorie
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }

    /**
     * 🔹 Un puzzle peut appartenir à plusieurs paniers (via la table "appartient")
     * ⚠️ La table pivot contient : id_Puzzle et id_Panier
     */
    public function paniers()
    {
        return $this->belongsToMany(Panier::class, 'appartient', 'id_Puzzle', 'id_Panier')
                    ->withPivot('quantite')
                    ->withTimestamps(); // utile pour suivre les ajouts au panier
    }
}
