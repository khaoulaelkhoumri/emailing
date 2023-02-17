<?php

namespace App\Http\Controllers;

use App\Models\Entite;
use App\Models\Personneentites;
use App\Models\Personnel;
use App\Models\personnesentites;
use App\Models\Personnesprojects;
use App\Models\Project;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UtilisateurController extends Controller
{
    public function utilisateur(Request $request){

        $utilisateur=Personnel::get();
        // dd($utilisateur);
        return view('Parametrages.Utilisateurs.Liste_Utilisateurs', compact('utilisateur'));
    }

    public function nvutilisateur(Request $request){
        return view('Parametrages.Utilisateurs.Nouveaux_Utilisateur');
    }

    public function storeutilisateur(Request $request){
        // dd($request->all());
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                'type' => 'required|in:indivi,entre',
                'nomentreprise' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'region' => 'required',
                // // 'pays' => 'required',
                'code_postal' => 'required',
                'numidentifi' => 'required'
            ],[
                'nom.required' => 'Nom is required',
                'prenom.required' => 'Prénom is required',
                'email.required' => 'Email is required',
                'telephone.required' => 'Numéro de téléphone is required',
                // 'type.required' => 'type is required',
                'nomentreprise.required' => 'Nom entreprise is required',
                'adresse.required' => 'Adresse is required',
                'ville.required' => 'Ville is required',
                'region.required' => 'Région is required',
                'code_postal.required' => 'Code Postal is required',
                'numidentifi.required' => 'Numéro is required',
                
            ]);

        try {
            DB::beginTransaction();     
            $utilisateur= Personnel::create(([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'email'=>$request->email,
                'telephone'=>$request->telephone, 
                'type'=>$request->type,   
                'nom_entite'=>$request->nomentreprise,  
                'adresse'=>$request->adresse,
                'ville'=>$request->ville,   
                'region'=>$request->region,   
                'pays'=>$request->pays,   
                'code_postal'=>$request->code_postal, 
                'numero_ident_fiscale'=>$request->numidentifi,
                'statut'=>0,
            ]));
            // dd($utilisateur);
            DB::commit();
            return redirect()->route('Parametrages.Utilisateurs.Liste_Utilisateurs')->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
           //throw $th;
            DB::rollBack();         
        }
        
    }
    
    public function utilisateurdetails(Request $request){
        try {
                $utilisateur= Personnel::where('id',$request->utilisateur)->first();
                // dd($utilisateur->personne_entites);
                $arrayEntite = [];
                foreach ($utilisateur->personne_entites as $key => $personne_entite) {
                    array_push($arrayEntite, $personne_entite->entite_id);
                }

                $arrayProject = [];
                foreach ($utilisateur->Personnes_projects as $key => $Personnes_project) {
                    array_push($arrayProject, $Personnes_project->project_id);
                }
                
                // dd($cond=[]);
                $entites=Entite::wherehas('personnels_entites', function($p){
                    $p->where(['personnels_id'=> Auth::user()->profil_id]);
                })->get();
                // dd($entites);
                

                $entites_prjt=Entite::wherehas('personnels_entites', function($p) use($utilisateur) {
                    $p->where(['personnels_id'=> $utilisateur->id,'statut'=>1]);
                })->get();
                // dd($entites_prjt);

                $project=Project::wherehas('personnels_project', function($p){
                    $p->where(['personnels_id'=> Auth::user()->profil_id]);
                })->get();
                
            return view ('Parametrages.Utilisateurs.Utilisateur_Details', compact('utilisateur', 'entites','entites_prjt', 'arrayEntite', 'arrayProject'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function personnelsentites(Request $request){
        try {   
            $personnels= Personneentites::where(['personnels_id'=>$request->personnels_id])->update(['statut'=>0]);
                // dd(Request('entite_id'));
            if (!empty(Request('entite_id'))) {
                foreach ( Request('entite_id') as $key => $entite) {
                    if (!empty($personnels)) { 

                        $personnels= Personneentites::where(['personnels_id'=>$request->personnels_id,'entite_id'=>$entite])->update(['statut'=>1]);
                    }else{ 
                        Personneentites::create([
                            'personnels_id'=>$request->personnels_id,
                            'entite_id'=>$entite,
                            'statut'=>1,
                        ]);
                    }
                    // dd($personnels);
                    // dd($pers);
                }
            }
            // dd(Request('entite_id') );
            return back();
        } catch (\Throwable $th) {
        //     //throw $th;
        //     return back();
        }
    }   
    
    public function personnelprojects(Request $request){
        // dd(Request('project_id') );
        try {
            $personnelsepro=Personnesprojects::where(['personnels_id'=>$request->personnels_id])->update(['statut'=>0]);
            if (!empty(Request('project_id'))) {
                foreach (Request('project_id') as $key => $project) {
                    if (!empty($personnelsepro)) {
                        $personnelsepro = Personnesprojects::where(['personnels_id'=>$request->personnels_id, 'project_id'=>$project])->update(['statut'=>1]);
                    }else{
                        Personnesprojects::create([
                            'personnels_id'=>$request->personnels_id,
                            'project_id'=>$project,
                            'statut'=>1,
                        ]);
                    }
                }
            }
            return back();
        } catch (\Throwable $th) {
            // throw $th;
        }
        
    }

    public function editeutilisateur(Request $request){

            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required',
                'telephone' => 'required',
                // 'type' => 'required',
                // 'nom_entite' => 'required',
                'adresse' => 'required',
                'ville' => 'required',
                'region' => 'required',
                // 'pays' => 'required',
                'code_postal' => 'required',
                // 'numidentifi' =>'required'
            ],[
                'nom.required' => 'nom is required',
                'prenom.required' => 'prenom is required',
                'email.required' => 'email is required',
                'telephone.required' => 'telephone is required',
                'type.required' => 'type is required',
                'nom_entite.required' => 'nom entite is required',
                'adresse.required' => 'nom entite is required',
                'ville.required' => 'nom entite is required',
                'region.required' => 'nom entite is required',
                'code_postal.required' => 'nom entite is required',
                'numidentifi.required' => 'numidentifi is required',
            ]);

        try {
            DB::beginTransaction();
            $utilisateur= Personnel::where('id',$request->utilisateur_id)->first();
            if (!empty($utilisateur)) {
                $utilisateur->update(([
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email,
                    'telephone'=>$request->telephone, 
                    'type'=>$request->type,   
                    'nom_entite'=>$request->nomentite,
                    'adresse'=>$request->adresse,
                    'ville'=>$request->ville,   
                    'region'=>$request->region,   
                    'pays'=>$request->pays,   
                    'code_postal'=>$request->code_postal, 
                    'numero_ident_fiscale'=>$request->numidentifi,
                    'statut'=>0,
                ]));
                // dd($utilisateur);
            }
            DB::commit();
            return redirect()->back()->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
        //     //throw $th;
            DB::rollBack(); 
            return redirect()->route('Parametrages.Utilisateurs.Liste_Utilisateur');
        }
    }


}
