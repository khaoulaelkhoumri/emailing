<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entite extends Model
{
    use HasFactory;

    protected $fillable = ['id','slug','nom','logo','statut'];

    public function projects(){
        return $this->hasMany(Project::class,'entite_id');
    }

    public function companges(){
        return $this->hasMany(Compange::class,'entite_id');
    }

    public function personnels_entites(){
        return $this->hasMany(Personneentites::class,'entite_id');
    }
}
