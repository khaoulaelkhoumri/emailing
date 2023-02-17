@extends('layouts.app',["breadCamps"=>["Nouveaux Utilisateur"]])
@section('style')
    
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
						<form action="{{ route('storeutilisateur')}}" method="POST">
							@csrf 
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="inputName" class="col-form-label">Nom de famille</label>
										<input type="text" name="nom" class="form-control @if($errors->get('nom')) is-invalid  @endif "  placeholder="Nom de famille">
										@if ($errors->has('nom'))
											<span class="text-danger">{{ $errors->first('nom') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="inputPrenom" class="col-form-label">Prénom</label>
										<input type="text" name="prenom" class="form-control @if($errors->get('prenom')) is-invalid  @endif"  placeholder="Prénom">
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
										<input type="email"  name="email" class="form-control @if($errors->get('email')) is-invalid  @endif"  placeholder="Email">
										@if ($errors->has('email'))
											<span class="text-danger">{{ $errors->first('email') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="inputPhone" class="col-form-label">Numéro de téléphone</label>
										<input type="text" name="telephone" class="form-control @if($errors->get('telephone')) is-invalid  @endif"  placeholder="Numéro de téléphone">
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
										<input type="text" name="adresse" class="form-control @if($errors->get('adresse')) is-invalid  @endif"  placeholder="Adresse">
										@if ($errors->has('adresse'))
											<span class="text-danger">{{ $errors->first('adresse') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="inputville" class="col-form-label">Ville</label>
										<input type="text" name="ville" class="form-control @if($errors->get('ville')) is-invalid  @endif"  placeholder="Ville">
										@if ($errors->has('ville'))
											<span class="text-danger">{{ $errors->first('ville') }}</span>
										@endif
									</div>
								</div>
							</div>
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="from-group" style="padding-bottom: 15px">
										<label for="inputPays" name="pays" class="col-form-label @if($errors->get('pays')) is-invalid  @endif">Pays</label>
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
										<input type="text" name="region" class="form-control @if($errors->get('region')) is-invalid  @endif"  placeholder="Région">
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
										<input type="text" name="code_postal" class="form-control @if($errors->get('code_postal')) is-invalid  @endif"  placeholder="Code postal">
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
										<input type="radio" id="customRadioInline1" name="type" class="custom-control-input radioItem  " value="indivi" >
										<label class="custom-control-label" for="customRadioInline1">Individuel</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="customRadioInline2" name="type" class="custom-control-input radioItem " value="entre" >
										<label class="custom-control-label" for="customRadioInline2">Entreprise</label>
									</div>
								</div>
								@if ($errors->has('type'))
									<span class="text-danger">{{ $errors->first('type') }}</span>
								@endif
							</div>
							<div class="row gutters" id="formEntreprise" style="display:none; margin-top: 15px;">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
									<div class="form-group"  >
										<label for="inputcodepostal" class="col-form-label">Nom de l'entreprise</label>
										<input type="text" name="nomentreprise" class="form-control @if($errors->get('nomentreprise')) is-invalid  @endif" value="" placeholder="Nom de l'entreprise">
										@if ($errors->has('nomentreprise'))
											<span class="text-danger">{{ $errors->first('nomentreprise') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="inputcodepostal" class="col-form-label">Numéro d'identification fiscale</label>
										<input type="text" name="numidentifi" class="form-control @if($errors->get('numidentifi')) is-invalid  @endif" value=""  placeholder="Numéro d'identification fiscale">
										@if ($errors->has('numidentifi'))
											<span class="text-danger">{{ $errors->first('numidentifi') }}</span>
										@endif
									</div>
								</div>
							</div>
							<button type="submit" name="submit" class="btn btn-primary float-right">Enregistrer</button>
							<!-- Row end -->
						</form> 
					</div>
				</div> 
			</div>
		</div>
		<!-- Row end -->
	</div>
	<!-- Main container end -->
@endsection

@section('script')
	<script> 
		$(document).on('click','.radioItem',function(){
			console.log($(this).val());
			if ($(this).val() === 'indivi') {
				$("#formEntreprise").hide(); 
			} else if ($(this).val() === 'entre') {
				$("#formEntreprise").show();
			} 
		});  
	</script>
@endsection