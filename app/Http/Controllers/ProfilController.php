<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ProfilController extends Controller
{
    public function profile(FacadesRequest $request){
        return view('admin.profil');
    }
}
