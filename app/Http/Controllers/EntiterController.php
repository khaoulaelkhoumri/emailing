<?php

namespace App\Http\Controllers;

use App\Models\Compange;
use App\Models\Entite;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EntiterController extends Controller
{
    public function entiter(){
        $entiter=Entite::get();
        $compange=Compange::get();
        // dd($entiter);
        return view('Parametrages.Entiter', compact('entiter','compange'));
    }


    public function storeentiter(Request $request){

            $request->validate([
                'logo' => 'required',
                'nom' => 'required'
            ],[
                'logo.required' => 'Logo is required',
                'nom.required' => 'Nom is required'
            ]);
        try {
            $file=$request->file('logo');
            $originalName = $file->getClientOriginalName();
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $file->move('entites', $originalName);

                DB::beginTransaction();     
                $entite= Entite::create([
                    'logo'=>$originalName,
                    'nom'=>$request->nom,
                    'slug'=>Str::slug($request->nom),
                ]);
                // dd($entite); 
                DB::commit();
            return redirect()->back()->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();     
            return redirect()->route('Parametrages.Entiter');
        }
    }
}
