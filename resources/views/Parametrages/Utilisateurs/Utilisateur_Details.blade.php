@extends('layouts.app',["breadCamps"=>["Utilisateur/Utilisateur Détails"]])
@section('style')
	<style>
		.form-groupfieldset {
			border-radius: 5px  ;
		}
	</style>
@endsection
@section('content')
@include('layouts.alert')
	<!-- Main container start -->
	<div class="main-container">
		<!-- Row start -->
		<div class="row gutters">
			<div class="col-md-12"> 
				<div class="card m-0">
					<div class="card-body">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#iformation" type="button" role="tab" aria-controls="home" aria-selected="true">Information</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#entiter" type="button" role="tab" aria-controls="profile" aria-selected="false">Entites</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab" aria-controls="contact" aria-selected="false">Projects</button>
							</li>
						</ul>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="iformation" role="tabpanel" aria-labelledby="nav-home-tab">
									<form action="{{ route('editeutilisateur')}}" method="POST">
										@csrf
									<input type="hidden" name="utilisateur_id" value="{{$utilisateur->id}}">
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputName" class="col-form-label">Nom de famille</label>
												<input type="text" name="nom" value="{{$utilisateur->nom}}" class="form-control @if($errors->get('nom')) is-invalid  @endif "  placeholder="Nom de famille">
												@if ($errors->has('nom'))
													<span class="text-danger">{{ $errors->first('nom') }}</span>
												@endif
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputPrenom" class="col-form-label">Prénom</label>
												<input type="text" value="{{$utilisateur->prenom}}" name="prenom" class="form-control @if($errors->get('prenom')) is-invalid  @endif"  placeholder="Prénom">
												@if ($errors->has('prenom'))
													<span class="text-danger">{{ $errors->first('prenom') }}</span>
												@endif
											</div>
										</div>
									</div>	
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputEmail" class="col-form-label">Email</label>
												<input type="email" value="{{$utilisateur->email}}"  name="email" class="form-control @if($errors->get('email')) is-invalid  @endif"  placeholder="Email">
												@if ($errors->has('email'))
													<span class="text-danger">{{ $errors->first('email') }}</span>
												@endif
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputPhone" class="col-form-label">Numéro de téléphone</label>
												<input type="text" value="{{$utilisateur->telephone}}" name="telephone" class="form-control @if($errors->get('telephone')) is-invalid  @endif"  placeholder="Numéro de téléphone">
												@if ($errors->has('telephone'))
													<span class="text-danger">{{ $errors->first('telephone') }}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputAdresse" class="col-form-label">Adresse</label>
												<input type="text" value="{{$utilisateur->adresse}}" name="adresse" class="form-control @if($errors->get('adresse')) is-invalid  @endif"  placeholder="Adresse">
												@if ($errors->has('adresse'))
													<span class="text-danger">{{ $errors->first('adresse') }}</span>
												@endif
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputville" class="col-form-label">Ville</label>
												<input type="text" value="{{$utilisateur->ville}}" name="ville" class="form-control @if($errors->get('ville')) is-invalid  @endif"  placeholder="Ville">
												@if ($errors->has('ville'))
													<span class="text-danger">{{ $errors->first('ville') }}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="from-group" style="padding-bottom: 15px">
												<label for="inputPays" name="pays" class="col-form-label">Pays</label>
												<select class="form-control">
													<option>Pays</option>
													<option>Brazil</option>
													<option>Turkey</option>
												</select>
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputRegion" class="col-form-label">Région</label>
												<input type="text" name="region" value="{{$utilisateur->region}}" class="form-control @if($errors->get('region')) is-invalid  @endif"  placeholder="Région">
												@if ($errors->has('region'))
													<span class="text-danger">{{ $errors->first('region') }}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputcodepostal" class="col-form-label">Code postal</label>
												<input type="text" name="code_postal" class="form-control @if($errors->get('code_postal')) is-invalid  @endif" value="{{$utilisateur->code_postal}}"  placeholder="Code postal">
												@if ($errors->has('code_postal'))
													<span class="text-danger">{{ $errors->first('code_postal') }}</span>
												@endif
											</div>
										</div>
									</div>
									<div class="row gutters">
										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="col-form-label" style="font-weight: 600;">Type de client</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline1" name="type" class="custom-control-input radioItem" value="indivi" {{ ($utilisateur->type == "indivi" )? "checked" : " " }} >
												<label class="custom-control-label" for="customRadioInline1">Individuel</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="customRadioInline2" name="type" class="custom-control-input radioItem" value="entre"  {{ ($utilisateur->type == "entre" )? "checked" : " " }} >
												<label class="custom-control-label" for="customRadioInline2">Entreprise</label>
											</div>
										</div>
									</div>
									<div class="row gutters" id="formEntreprise" style="display:none; margin-top: 15px;">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
											<div class="form-group"  >
												<label for="inputcodepostal" class="col-form-label">Nom de l'entreprise</label>
												<input type="text" name="nomentite" class="form-control" value="{{$utilisateur->nom_entite}}" placeholder="Nom de l'entreprise">
											</div>
										</div>
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputcodepostal" class="col-form-label">Numéro d'identification fiscale</label>
												<input type="text" name="numidentifi" class="form-control" value="{{$utilisateur->numero_ident_fiscale}}"  placeholder="Numéro d'identification fiscale">
											</div>
										</div>
									</div>
									<button type="submit" name="submit" class="btn btn-primary float-right">Enregistrer</button>
									<!-- Row end -->
								</div>
							</form> 
							<div class="tab-pane fade" id="entiter" role="tabpanel" aria-labelledby="nav-profile-tab">
								<form action="{{ route('personnelsentites')}}" method="POST">
									@csrf
									<input type="hidden" name="personnels_id" value="{{$utilisateur->id}}">
									<div class="card-body">
										<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
											@foreach ($entites as $key => $entit)
												@php
													$perentite = App\Models\Personneentites::where(['personnels_id'=>$utilisateur->id, 'entite_id'=>$entit->id,'statut'=>1])->first();
												@endphp 
												<div class="form-check" style="padding-bottom: 15px">
													<input name="entite_id[]" class="form-check-input checkEntite" type="checkbox" value="{{$entit->id}}" id="flexCheck{{$key}}" {{ ($perentite)? "checked" : " "}}>
													<label class="form-check-label" for="flexCheck{{$key}}">{{ucfirst($entit->nom)}}</label>
												</div> 
											@endforeach
										</div>
											<button type="submit" name="submit" class="btn btn-primary float-right">Enregistrer</button>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="nav-contact-tab">
								<form action="{{route('personnelprojects')}}" method="POST">
									@csrf
									<input type="hidden" name="personnels_id" value="{{$utilisateur->id}}">
									<div class="row">
										@foreach ($entites_prjt as $entit)
											<div class="col-md-6">
												<fieldset class="form-groupfieldset border p-3">
													<legend class="w-auto px-2">{{ucfirst($entit->nom)}}</legend>
													<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
														@foreach ($entit->projects as $key => $pro)
															@php
																$personnelsepro = App\Models\Personnesprojects::where(['personnels_id'=>$utilisateur->id, 'project_id'=>$pro->id ,'statut'=>1])->first();
															@endphp 
															<div class="form-check" style="padding-bottom: 15px">
																<input name="project_id[]" class="form-check-input" type="checkbox" value="{{$pro->id}}"  id="flexCheck{{$key}}" {{ ($personnelsepro)? "checked" : " "}}>
																<label class="form-check-label" for="flexCheck{{$key}}">{{ucfirst($pro->nom)}}</label>
															</div> 
														@endforeach
													</div>
												</fieldset>
											</div>
										@endforeach
									</div>
									@if (count($entites_prjt)>0)
										<button type="submit" name="submit" class="btn btn-primary float-right">Enregistrer</button>
									@endif
								</form>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
		<!-- Row end -->
	</div>
	<!-- Main container end -->
@endsection

@section('script')
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script> 
		$(document).on('click','.radioItem',function(){ 
			console.log($(this).val());
			if ($(this).val() === 'indivi') {
				$("#formEntreprise").hide(); 
			} else if ($(this).val() === 'entre') {
				$("#formEntreprise").show();
			} 
		}); 
		$(document).ready(function(){ 
			if ($("#customRadioInline1").prop("checked") == true) {
				$("#formEntreprise").hide(); 
			} else if ($("#customRadioInline2").prop("checked") == true) {
				$("#formEntreprise").show();
			} 
		});     
	</script>
@endsection
