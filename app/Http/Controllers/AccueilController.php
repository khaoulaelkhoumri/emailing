<?php

namespace App\Http\Controllers;

use App\Models\Compange;
use App\Models\Contact;
use App\Models\Loti;
use App\Models\Project;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(){

        $compagne=Compange::get();
        $project=Project::get();
        $lotis=Loti::get();
        $contact=Contact::get();
        return view('index', compact('compagne','project','lotis','contact'));
    }
}
