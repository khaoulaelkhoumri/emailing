<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom', 'prenom' ,'email', 'tele', 'pays','ville','adresse','code_postal','nom_entreprise','num_if_entreprise','region', 'loti_id'];


}

