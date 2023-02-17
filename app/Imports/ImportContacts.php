<?php

namespace App\Imports;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ImportContacts implements ToCollection, WithHeadingRow 
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if(!empty($row['email'])){
                $data=[
                    "nom" => $row['nom'],
                    "prenom" => $row['prenom'],
                    "email" => $row['email'],
                    "tele" => $row['tele'],
                    "pays" => $row['pays'],
                    "pays" => $row['pays'],
                    "ville" => $row['ville'],
                    "adresse" => $row['adresse'],
                    "code_postal" => $row['code_postal'],
                    "nom_entreprise" => $row['nom_entreprise'],
                    "num_if_entreprise" => $row['num_if_entreprise'],
                    "region" => $row['region'],
                    "loti_id" => $row['loti_id'],
                ];
                Contact::create($data);
            }else {
                break;
            }
            
        }
    }
    
}
