<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailing extends Model
{
    use HasFactory;

    protected $fillable = ['id','compange_id', 'loti_id', 'statut'];


    public function emailingdetails(){
        return $this->hasMany(Emailingdetails::class);
    }

}
