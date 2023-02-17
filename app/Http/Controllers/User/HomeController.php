<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{ 
    public function index()
    {
        // dd('okk');
        return view('user.index');
    }

}
