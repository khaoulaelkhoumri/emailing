<?php

namespace App\Http\Controllers;

use App\Imports\ImportContacts;
use App\Models\Contact;
use App\Models\Loti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    public function listeContact(Request $request){
        $cond = [];
        if ($request->lotis) { 
            $cond['loti_id']= $request->lotis;
        }
        $contacts = Contact::where($cond)->get();
        $lotis = Loti::get();
        // dd($lotis);
        return view ('Contacts.Liste_Contacts', compact('contacts','lotis'));
    }
    
    public function nouveauxContact(Request $request){  
        $lotis = Loti::get();
        return view('Contacts.Nouveaux_Contact', compact('lotis'));
    }
    public function storecontact(Request $request){
            $request->validate([
                'nom'=>'required',
                'prenom'=>'required',
                'email'=>'required',
                'tele'=>'required',
                // 'pays'=>'required',
                'ville'=>'required',
                'adresse'=>'required',
                'code_postal'=>'required',
                'nom_entreprise'=>'required',
                'num_if_entreprise'=>'required',
                'region'=>'required',
                'loti'=>'required'
            ],[
                'nom.required' => 'Nom is required',
                'prenom.required' => 'Prénom is required',
                'email.required' => 'Email is required',
                'tele.required' => 'Téléphone is required',
                // 'pays.required' => 'Pays is required',
                'ville.required' => 'Ville is required',
                'adresse.required' => 'Adresse is required',
                'code_postal.required' => 'Code postal is required',
                'nom_entreprise.required' => 'Nom entreprise is required',
                'num_if_entreprise.required' => 'Numéro identification fiscale  is required',
                'region.required' => 'Région is required',
                'loti.required' => 'lotis is required', 

            ]);
            try{ 
                    DB::beginTransaction(); 
                    $contact= Contact::create(([
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email,
                    'tele'=>$request->tele, 
                    'pays'=>$request->pays,   
                    'ville'=>$request->ville,   
                    'adresse'=>$request->adresse,   
                    'code_postal'=>$request->code_postal,   
                    'nom_entreprise'=>$request->nom_entreprise,   
                    'num_if_entreprise'=>$request->num_if_entreprise,   
                    'region'=>$request->region, 
                    'loti_id'=>$request->loti,
                ])); 
                // dd($contact);
                DB::commit();
                return redirect()->route('Contacts.Liste_Contacts')->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
            } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('Contacts.Liste_Contacts');
        }
    }

    public function contactdetails(Request $request){  
        try {
            $contact= Contact::where('id',$request->contact)->first();
            return view('Contacts.Contact_Details',compact('contact'));
        } catch (\Throwable $th) {
            //throw $th;
            return view('Contacts.Contact_Details',compact('contact'));
        }
    }

    public function editcontact(Request $request){  
        
            $request->validate([
                'nom'=>'required',
                'prenom'=>'required',
                'email'=>'required',
                'tele'=>'required',
                // 'pays'=>'required',
                'ville'=>'required',
                'adresse'=>'required',
                'code_postal'=>'required',
                'nom_entreprise'=>'required',
                'num_if_entreprise'=>'required',
                'region'=>'required',
                'loti'=>'required'
            ],[
                'nom.required' => 'Nom is required',
                'prenom.required' => 'Prénom is required',
                'email.required' => 'Email is required',
                'tele.required' => 'Téléphone is required',
                // 'pays.required' => 'Pays is required',
                'ville.required' => 'Ville is required',
                'adresse.required' => 'Adresse is required',
                'code_postal.required' => 'Code postal is required',
                'nom_entreprise.required' => 'Nom entreprise is required',
                'num_if_entreprise.required' => 'Numéro identification fiscale  is required',
                'region.required' => 'Région is required',
                'loti.required' => 'lotis is required', 
            ]);
        try {
            DB::beginTransaction();
                $contact=Contact::where('id',$request->contact_id)->first();
                    $contact->update(([
                    'nom'=>$request->nom,
                    'prenom'=>$request->prenom,
                    'email'=>$request->email,
                    'tele'=>$request->tele, 
                    'pays'=>$request->pays,   
                    'ville'=>$request->ville,   
                    'adresse'=>$request->adresse,   
                    'code_postal'=>$request->code_postal,   
                    'nom_entreprise'=>$request->nom_entreprise,   
                    'num_if_entreprise'=>$request->num_if_entreprise,   
                    'region'=>$request->region,
                    'loti_id '=>$request->loti,   
                ]));
                DB::commit();
            return redirect()->back()->with(["alert" => ["type" => "success", "message" => "bien enregistrer" ]]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack(); 
            return redirect()->route('Contacts.Liste_Contacts');
        }

    }

    public function importecontacts(Request $request){
        try {
            // dd(request()->all());
            Excel::import(new ImportContacts, $request->file);
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('Contacts.Liste_Contacts');
        }
    }


}
