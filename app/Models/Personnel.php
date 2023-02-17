<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nom', 'prenom','email','telephone', 'type', 'nom_entite','adresse','ville', 'region', 'pays', 'code_postal','numero_ident_fiscale', 'statut' ];

    public function personne_entites(){
        return $this->hasMany(Personneentites::class, "personnels_id");
    }

    public function Personnes_projects(){
        return $this->hasMany(Personnesprojects::class, "personnels_id");
    }
    
    
}
