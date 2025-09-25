<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'description',
        'prix',
        'image',
    ];

public function categorie()
{
    return $this->belongsTo(Categorie::class);
}
}
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    protected $table = 'puzzles';

    protected $fillable = ['nom', 'categorie', 'description', 'image', 'prix'];

    public function categorie()
    {
        // Relation inversée : Puzzle appartient à une Categorie
        return $this->belongsTo(Categorie::class, 'categorie', 'nom');
    }
}
