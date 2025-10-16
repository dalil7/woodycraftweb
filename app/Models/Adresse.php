<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table = 'adresse'; // nom exact de ta table

    public $timestamps = false; // car ta table n’a pas created_at / updated_at

    protected $fillable = [
        'numero',
        'rue',
        'ville',
        'cp',
        'pays',
        'user_id', // ✅ à ajouter absolument
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
