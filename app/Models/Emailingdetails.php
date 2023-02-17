<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emailingdetails extends Model
{
    use HasFactory;

    protected $fillable = ['id','email', 'emailing_id', 'statut'];

    
    public function emailing(){
        return $this->belongsTo(Emailing::class,'emailing_id');
    }

}
