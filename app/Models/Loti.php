<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loti extends Model
{
    use HasFactory;

    protected $fillable = ['id','slug','titre', 'statut','entite_id '];

    public function emailing(){
        return $this->hasMany(Emailing::class, 'loti_id');
    }
    public function contacts(){
        return $this->hasMany(Contact::class, 'loti_id');
    }
    
}
