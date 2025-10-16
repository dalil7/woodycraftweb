<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * 🔹 Nom de la table (facultatif si c’est bien "users")
     */
    protected $table = 'users';

    /**
     * 🔹 Champs remplissables (si tu veux créer des users via formulaire)
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 🔹 Relation : un utilisateur peut avoir plusieurs paniers
     */
    public function paniers()
    {
        return $this->hasMany(Panier::class, 'id_utilisateur');
    }

    /**
     * 🔹 Méthode pratique pour obtenir le nom complet
     */
    public function getFullNameAttribute()
    {
        return trim(($this->prenom ?? '') . ' ' . ($this->nom ?? ''));
    }
}
