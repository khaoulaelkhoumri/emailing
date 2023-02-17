<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compange extends Model
{
    use HasFactory;
    
    protected $fillable = ['id','slug','nombre_email','entite_id ','loti_id','statut','nom_exp','email_exp','description', 'sujet','project_id','titre','message'];
    
    public function loti(){
        return $this->belongsTo(Loti::class,'loti_id');
    }

    public function emailing(){
        return $this->hasOne(Emailing::class,'compange_id');
    }

    public function project(){
        return $this->hasMany(Project::class,'entite_id');
    }



}