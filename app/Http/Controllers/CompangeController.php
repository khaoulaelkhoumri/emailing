<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactMailing;
use App\Models\Compange;
use App\Models\Contact;
use App\Models\Emailing;
use App\Models\Emailingdetails;
use App\Models\Loti;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Notifications\Events\NotificationSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Foreach_;
use PhpParser\Node\Stmt\TryCatch; 
use Illuminate\Support\Str;

class CompangeController extends Controller
{

    public function listecompgane(Request $request){
        // dd($request->entiter);
        $cond = [];
        if ($request->project) { 
            $cond['project_id']= $request->project;
        } 
        if ($request->entiter) { 
            $cond['entite_id']= $request->entiter;
        } 
        $compagnes = Compange::where($cond)->where("statut","!=",4)->orderBy('id','desc')->get();
        // dd($compagnes);
        $projects = Project::get(); 
        // dd($email);
        return view ('Emails.Compagnes.Liste_Compagne', compact('compagnes','projects'));
    }

    public function storecompagne(Request $request){
        // dd($request->all());
        $request->validate([
            'project' => 'required',
            'titre' => 'required',
            'description' => 'required',
        ],[
            'project.required' => 'Project is required',
            'titre.required' => 'Nom is required',
            'description.required' => 'Description is required',
        ]);
        try {
            DB::beginTransaction();     
            $compange= Compange::create([
                'project_id'=>$request->project,
                'titre'=>$request->titre,
                'slug'=>Str::slug($request->titre),
                'description'=>$request->description,
            ]);
            // dd($compange);
            DB::commit();
            return redirect()->route("Emails.Compagnes.Compagne_details",['compange'=>$compange->id]);
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollBack();
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
    }


    public function copycompagne(Request $request){
        try {
            $compange= Compange::where('id',$request->compange)->first();
            // dd($compange);
            if (!empty($compange)) {
                $projects = Project::get(); 
                $lotis=Loti::get();
                return view ('compagnes.detailscom', compact('compange', 'lotis', 'projects'));
            }
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function editcopycompagne(Request $request){
        try {   
            DB::beginTransaction();  
                $compange= Compange::create(([ 
                'project_id'=>$request->project,
                'titre'=>$request->titre,
                'description'=>$request->description,
                'sujet'=>$request->sujet,
                'loti_id'=>$request->loti,
                'nom_exp'=>$request->nomexp,
                'email_exp'=>$request->emailexp,
                'message'=>$request->message,   
            ]));
            return redirect()->back();
            DB::commit(); 
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back();
        }
    }
    
    public function compagnedetails(Request $request){ 
        Try{
            $compange= Compange::where('id',$request->compange)->first();
            // dd($compange);
                $lotis=Loti::get();
                return view ('Emails.Compagnes.Compagne_details', compact('compange', 'lotis'));
        } catch(\Throwable $th){
            // throw $th;
            // Redirection with proble
            DB::rollBack();  
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
}

    public function editcompagne(Request $request){
        // dd($request->all());
        $request->validate([
            'sujet' => 'required',
            'loti' => 'required',
            'nomexp' => 'required',
            'emailexp' => 'required',
            'message' => 'required',
        ],[
            'sujet.required' => 'Sujet is required',
            'loti.required' => 'Contacts is required',
            'nomexp.required' => 'Nom is required',
            'emailexp.required' => 'Email is required',
            'message.required' => 'Message is required',
        ]);
        try {
                DB::beginTransaction();
                $compange=Compange::where('id',$request->compange_id)->first();
                if (!empty($compange)) {
                    if ($compange->statut == 0) {
                        $compange->update(([            
                            'sujet'=>$request->sujet,
                            'loti_id'=>$request->loti,
                            'nom_exp'=>$request->nomexp,
                            'email_exp'=>$request->emailexp,
                            'message'=>$request->message,   
                        ]));
                        // dd($compange );
                            if (empty($compange->emailing)) {
                                $emailing = Emailing::create([
                                    'compange_id'=> $compange->id,
                                    'loti_id'=>$request->loti,
                                    'statut'=>0,
                                ]);
                                // dd($compange->emailing); 	
                                $contacts = Contact::where('loti_id',$request->loti)->get();
                                if (!empty($contacts)) {
                                    foreach ($contacts as $key => $value) {
                                        $email_detail = Emailingdetails::create([
                                        'email'=>$value->email,
                                        'emailing_id'=>$emailing->id,
                                        'statut'=>0, 
                                        ]);
                                    }
                                }
                            }
                        DB::commit(); 
                    }else{
                        // "n'a pas le droit"; 
                    }
                } else {
                    # Not existe
                }
            return redirect()->back()->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
            //throw $th;
            // Redirection with problem
            DB::rollBack();
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
        // dd($compange);
    }

    public function testerlenvoi(Request $request){

        try {
            $emailing = Emailingdetails::where('emailing_id',$request->compange_id)->get(); 
            $compange=Compange::where('id',$request->compange_id)->first(); 
            $contact=Contact::first(); 
            // dd($contact);
                $msgemail = str_replace('{email}', $contact->email , $compange->message);
                $msgemail = str_replace('{first_name}', $contact->prenom , $msgemail);
                $msgemail = str_replace('{surname}', $contact->nom , $msgemail);
                $msgemail = str_replace('{tele}', $contact->tele , $msgemail);
                $msgemail = str_replace('{pays}', $contact->pays , $msgemail);
                $msgemail = str_replace('{adresse}', $contact->adresse , $msgemail);
                $msgemail = str_replace('{ville}', $contact->ville , $msgemail);
                $msgemail = str_replace('{code_postal}', $contact->code_postal , $msgemail);
                $msgemail = str_replace('{nom_entreprise}', $contact->nom_entreprise , $msgemail);
                $msgemail = str_replace('{num_if_entreprise}', $contact->num_if_entreprise , $msgemail);
                $msgemail = str_replace('{region}', $contact->region , $msgemail); 
                    // dd($msgemail);    
                $data = [
                    'message'=>$msgemail,
                ]; 
                Mail::to(Auth::user()->email)->send(new ContactMail($data));
                return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
    }

    public function demmarrerenvoi(Request $request){
        
        try {
            // dd('okk');
            $emailing = Emailingdetails::where('emailing_id',$request->compange_id)->get(); 
            $compange=Compange::where('id',$request->compange_id)->first();
            // $compange->update(['statut'=>1]);
            // dd($compange->loti); 
            if (!empty($compange->loti)) {
                if (!empty($compange->loti->contacts)) {
                    foreach ($compange->loti->contacts as $key => $value) {  
                        $msgemail = str_replace('{email}', $value->email , $compange->message);
                        $msgemail = str_replace('{first_name}', $value->prenom , $msgemail);
                        $msgemail = str_replace('{surname}', $value->nom , $msgemail);
                        $msgemail = str_replace('{tele}', $value->tele , $msgemail);
                        $msgemail = str_replace('{pays}', $value->pays , $msgemail);
                        $msgemail = str_replace('{adresse}', $value->adresse , $msgemail);  
                        $msgemail = str_replace('{ville}', $value->ville , $msgemail);
                        $msgemail = str_replace('{code_postal}', $value->code_postal , $msgemail);
                        $msgemail = str_replace('{nom_entreprise}', $value->nom_entreprise , $msgemail);
                        $msgemail = str_replace('{num_if_entreprise}', $value->num_if_entreprise , $msgemail);
                        $msgemail = str_replace('{region}', $value->region , $msgemail);    
                        // dd($msgemail);
                        $data = [
                            'message'=>$msgemail,   
                        ];
                        Mail::to($value->email)->queue(new ContactMail($data));
                        // dd($value->email);
                    }        
                }
            }
            // dd('all its okk');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
        
    }

    public function traiter(Request $request){
        
        try {
            $compange=Compange::where('id',$request->compange_id)->first();
            $compange->update(['statut'=>2]);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
        
    }

    public function archiver(Request $request){
        try {
            $compange=Compange::where('id',$request->compange_id)->first();
            $compange->update(['statut'=>3]);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('Emails.Compagnes.Liste_Compagne');
        }
        
    }
}