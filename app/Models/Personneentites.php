<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personneentites extends Model
{
    use HasFactory;

    protected $fillable = ['id','personnels_id', 'entite_id', 'statut'];

    public function personnels_id(){
        return $this->hasOne(Personnel::class, 'personnels_id');
    }

    public function entite_id(){
        return $this->belongsTo(Entite::class, 'entite_id');
    }
}
