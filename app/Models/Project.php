<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['slug','nom', 'logo','statut','entite_id'];

    public function entite(){
        return $this->belongsTo(Entite::class);
    }

    public function personnels_project(){
        return $this->hasMany(Personnesprojects::class, "personnels_id");
    }
}
