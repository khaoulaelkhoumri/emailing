<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear', function() {
    'Artisan'::call('cache:clear');
    'Artisan'::call('config:clear');
    'Artisan'::call('config:cache');
    'Artisan'::call('storage:link');
    'Artisan'::call('view:clear');
//   Artisan::call('passport:install');
    return "Cleared!";
}); 
    Auth::routes();
    Route::get('/', function () {
        if (Auth::check()) {
            // dd(Auth::user()->role_id);
            switch (Auth::user()->role_id) {
                case 1: return redirect('/superadmin'); break;
                case 2: return redirect('/admin'); break;
                case 3: return redirect('/user'); break;
                default: return redirect('/login'); break;
            }
        }else{
            return redirect('/login');
        }
    }); 
            // --------------Admin login--------------------\\
        Route::group(['middleware' => ['auth:web','checkAdmin'],'prefix' => 'admin' ], function() {
        Route::get('/', 'AccueilController@index')->name('Accueil');

        Route::get('admin/Profil', 'profilController@profile')->name('admin.profil');
        
        Route::get('/Contacts/Liste_Contacts', 'ContactController@listeContact')->name('Contacts.Liste_Contacts');
        Route::get('/Contacts/Nouveaux_Contact', 'ContactController@nouveauxContact')->name('Contacts.Nouveaux_Contact');
        Route::post('/save-contact', 'ContactController@storecontact')->name('save-contact');
        Route::get('/Contacts/Contact_Details', 'ContactController@contactdetails')->name('Contact.Contact_Details');
        Route::post('/edit-contact', 'ContactController@editcontact')->name('edit-contact');
        Route::post('/importecontacts', 'ContactController@importecontacts')->name('importecontacts');
        
        Route::get('/Emails/Compagnes/Liste_Compagne', 'CompangeController@listecompgane')->name('Emails.Compagnes.Liste_Compagne');
        Route::post('/savecompagne', 'CompangeController@storecompagne')->name('savecompagne');
        Route::get('/copycompagne', 'CompangeController@copycompagne')->name('copycompagne');
        Route::post('/editcopycompagne', 'CompangeController@editcopycompagne')->name('editcopycompagne');
        Route::get('/Emails/Compagnes/Compagne_details', 'CompangeController@compagnedetails')->name('Emails.Compagnes.Compagne_details');
        Route::post('/editcompange', 'CompangeController@editcompagne')->name('editcompange');
        Route::get('/testerlenvoi', 'CompangeController@testerlenvoi')->name('testerlenvoi');
        Route::get('/demmarrerenvoi', 'CompangeController@demmarrerenvoi')->name('demmarrerenvoi');
        Route::get('/traiter', 'CompangeController@traiter')->name('traiter');
        Route::get('/archiver', 'CompangeController@archiver')->name('archiver');  
        
        Route::get('Parametrages/Entiter', 'EntiterController@entiter')->name('Parametrages.Entiter');
        Route::post('/saveentiter', 'EntiterController@storeentiter')->name('saveentiter');
        
        Route::get('Parametrages/Project', 'ProjectController@project')->name('Parametrages.Project');
        Route::post('/saveproject', 'ProjectController@storeproject')->name('saveproject');

        Route::get('Parametrages/Utilisateurs/Liste_Utilisateurs', 'UtilisateurController@utilisateur')->name('Parametrages.Utilisateurs.Liste_Utilisateurs');
        Route::get('Parametrages/Utilisateurs/Nouveaux_Utilisateur', 'UtilisateurController@nvutilisateur')->name('Parametrages.Utilisateurs.Nouveaux_Utilisateur');
        Route::post('/storeutilisateur', 'UtilisateurController@storeutilisateur')->name('storeutilisateur');
        Route::get('Parametrages/Utilisateurs/Utilisateur_Details', 'UtilisateurController@utilisateurdetails')->name('Parametrages.Utilisateurs.Utilisateur_Details');
        Route::post('/editeutilisateur', 'UtilisateurController@editeutilisateur')->name('editeutilisateur'); 
        Route::post('/personnelsentites', 'UtilisateurController@personnelsentites')->name('personnelsentites'); 
        Route::post('/personnelprojects', 'UtilisateurController@personnelprojects')->name('personnelprojects'); 
    }); 
    // --------------User login--------------------\\
    Route::group(['middleware' => ['auth:web','checkUser'],'namespace'=>'User','prefix' => 'user' ], function() { 

        Route::get('/', 'HomeController@index')->name('Accueil');
        
    });
