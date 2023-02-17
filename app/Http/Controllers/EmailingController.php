<?php

namespace App\Http\Controllers;

use App\Models\Emailing;
use Illuminate\Http\Request;

class EmailingController extends Controller
{
    public function index(){

        return view('emailing');
    }

    
}
