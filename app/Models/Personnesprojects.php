<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnesprojects extends Model
{
    use HasFactory;
    protected $fillable = ['id','personnels_id', 'project_id', 'statut'];

    public function personnels_id(){
        return $this->hasOne(Personnel::class, 'personnels_id');
    }
    
    
}
