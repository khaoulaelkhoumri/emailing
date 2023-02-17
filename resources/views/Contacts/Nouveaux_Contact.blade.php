@extends('layouts.app',["breadCamps"=>["Nouveaux Contact"]])
@section('style')
    
@endsection
@section('content')
	@include('layouts.alert')
	<!-- Main container start -->
	<div class="main-container">
		<!-- Row start -->
		<div class="card">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-md-12"> 
						<div class="card m-0">
							<div class="card-body">
								<form action="{{ route('save-contact')}}" method="POST">
									@csrf 
									<!-- Row start -->
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="inputName" class="col-form-label">Nom de famille</label>
												<input type="text" name="nom" class="form-control @if($errors->get('nom')) is-invalid  @endif"  placeholder="Nom de famille">
												@if ($errors->has('nom'))
													<span class="text-danger">{{ $errors->first('nom') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputEmail" class="col-form-label">Email</label>
												<input type="email"  name="email" class="form-control @if($errors->get('email')) is-invalid  @endif"  placeholder="Email">
												@if ($errors->has('email'))
													<span class="text-danger">{{ $errors->first('email') }}</span>
												@endif
											</div>
											<div class="from-group" style="padding-bottom: 15px">
												<label for="inputPays" name="pays" class="col-form-label">Pays</label>
												<select class="form-control ">{{-- @if($errors->get('pays')) is-invalid  @endif --}}
													<option>Pays</option>
													<option>Brazil</option>
													<option>Turkey</option>
												</select>
												{{-- @if ($errors->has('pays'))
													<span class="text-danger">{{ $errors->first('pays') }}</span>
												@endif --}}
											</div>
											<div class="form-group">
												<label for="inputAdresse" class="col-form-label">Adresse</label>
												<input type="text" name="adresse" class="form-control @if($errors->get('adresse')) is-invalid  @endif"  placeholder="Adresse">
												@if ($errors->has('adresse'))
													<span class="text-danger">{{ $errors->first('adresse') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputText" class="col-form-label">Nom de l'entreprise</label>
												<input type="text" name="nom_entreprise" class="form-control @if($errors->get('nom_entreprise')) is-invalid  @endif"  placeholder="Nom de l'entreprise">
												@if ($errors->has('nom_entreprise'))
													<span class="text-danger">{{ $errors->first('nom_entreprise') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputRegion" class="col-form-label">Région</label>
												<input type="text" name="region" class="form-control @if($errors->get('region')) is-invalid  @endif"  placeholder="Région">
												@if ($errors->has('region'))
													<span class="text-danger">{{ $errors->first('region') }}</span>
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
											<div class="form-group">
												<label for="inputPhone" class="col-form-label">Numéro de téléphone</label>
												<input type="text" name="tele" class="form-control @if($errors->get('tele')) is-invalid  @endif"  placeholder="Numéro de téléphone">
												@if ($errors->has('tele'))
													<span class="text-danger">{{ $errors->first('tele') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputville" class="col-form-label">Ville</label>
												<input type="text" name="ville" class="form-control @if($errors->get('ville')) is-invalid  @endif"  placeholder="Ville">
												@if ($errors->has('ville'))
													<span class="text-danger">{{ $errors->first('ville') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputcodepostal" class="col-form-label">Code postal</label>
												<input type="text" name="code_postal" class="form-control @if($errors->get('code_postal')) is-invalid  @endif"  placeholder="Code postal">
												@if ($errors->has('code_postal'))
													<span class="text-danger">{{ $errors->first('code_postal') }}</span>
												@endif
											</div>
											<div class="form-group">
												<label for="inputNuméro" class="col-form-label">Numéro d'identification fiscale</label>
												<input type="text" name="num_if_entreprise" class="form-control @if($errors->get('num_if_entreprise')) is-invalid  @endif"  placeholder="Numéro d'identification fiscale">
												@if ($errors->has('num_if_entreprise'))
													<span class="text-danger">{{ $errors->first('num_if_entreprise') }}</span>
												@endif
											</div>
											<div class="from-group" style="padding-bottom: 15px">
												<label for="inputNuméro" class="col-form-label">Lotis</label>
												<select class="form-control" name="loti" onchange="location = this.value;">
													<option value="">Lotis</option>
													@foreach ($lotis as $loti)
														<option value="{{$loti->id}}" >{{$loti->titre}}</option>
													@endforeach
												</select>
											</div>
										</div>
										</div>
									<div class="row gutters">
										<div class="col-xl-12">
											<button type="submit" name="submit" class="btn btn-primary float-right">Enregistrer</button>
										</div>
									</div>
									<!-- Row end -->
								</form>
							</div>
						</div> 
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main container end -->
@endsection

@section('script')
    
@endsection