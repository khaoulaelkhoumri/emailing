<?php

namespace App\Http\Controllers;

use App\Models\Compange;
use App\Models\Entite;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Symfony\Contracts\Service\Attribute\Required;

class ProjectController extends Controller
{
    public function project(Request $request){
        $cond = [];
        if ($request->entiter) {
            $cond['entite_id']= $request->entiter;
        } 

        $project=Project::where($cond)->get();
        $entiter=Entite::get();
        return view('Parametrages.Project', compact('project', 'entiter'));
    }

    public function storeproject(Request $request){

            $request->validate([
                'entiter' => 'required',
                'logo' => 'required',
                'nom' => 'required'
            ],[
                'entiter.required' => 'Entiter is required',
                'logo.required' => 'Logo is required',
                'nom.required' => 'Nom is required',
            ]);
        try {
            $file=$request->file('logo');
            $originalName = $file->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $file->move('projects', $originalName);

            DB::beginTransaction();     
            $project= Project::create([
                'entite_id'=>$request->entiter,
                'nom'=>$request->nom,
                'logo'=>$originalName,
                'slug'=>Str::slug($request->nom),
            ]);
            // dd($project);
            DB::commit();
            return redirect()->back()->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('Parametrages.Project');
        }
    }
}

