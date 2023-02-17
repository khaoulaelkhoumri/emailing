@extends('layouts.app')
		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{ asset('front/assets/vendor/summernote/summernote-bs4.css')}}" />
@section('style')
    
@endsection
@section('content')
	<!-- Main container start -->
	<div class="main-container">
		<!-- Row start -->
		<div class="row gutters">
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<form action="{{ route('editcopycompagne')}}" method="POST">
							@csrf
							<input type="hidden" name="compange_id" value="{{$compange->id}}">
							<div class="row gutters">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="titre">Nom</label>
									<input type="text" name="titre" value="{{$compange->titre}}" class="form-control" id="" placeholder="Nom" >
								</div>
								<div class="form-group">
									<label for="fullName">Sujet</label>
									<input type="text" name="sujet" value="{{$compange->sujet}}" class="form-control" id="" placeholder="Sujet" >
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
								<div class="form-group">
									<label for="description">Description:</label>
									<input type="text" name="description" value="{{$compange->description}}" class="form-control" id="" placeholder="Description" >
								</div>
								<div class="form-group">
									<label for="projet">Contacts</label> 
									<select class="form-control"  name="loti" id="" >
										<option value="">Select Contacts</option>
										@foreach ($lotis as $loti)
											<option value="{{$loti->id}}" selected>{{$loti->titre}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="nomexp">Nom de l'expéditeur</label>
									<input type="name" name="nomexp" value="{{$compange->nom_exp}}" class="form-control" id="" placeholder="" >
								</div>
								<div class="form-group">
									<label for="email">Adresse email de l'expéditeur</label>
									<input type="name" name="emailexp" value="{{$compange->email_exp}}" class="form-control" id="disabledInput" placeholder=""  >
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<label for="projet">project</label> 
									<select class="form-control"  name="project" id="" >
										<option value="">Select project</option>
										@foreach ($projects as $project)
											<option value="{{$project->id}}" selected>{{$project->nom}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="card-body">
										<label for="ciTy">Corps de l'email</label>
										<textarea class="summernote" name="message">{{$compange->message}} </textarea>
										<a href=" {{route('Compange')}} ">
											<button type="button" class="btn btn-dark">Annuler</button>
										</a>
											<button class="btn btn-primary" type="submit">Enregistrer</button>
										
									</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="row gutters">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Pièces jointes</h5>	
								<a href="#">Ajouter une pièce jointe</a>	
							</div>
						</div>
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<div class="card-title">Variables de substitution</div>
							</div>
							<div class="card-body">
								<div class="categories">
									<p><code style="color: red">{email}</code> - Email</p>
								</div>
								<div>
									<p><code style="color: red">{first_name}</code> - Prénom</p>
								</div>
								<div>
									<p><code style="color: red">{surname}</code> - Nom de famille</p>
								</div>
								<div>
									<p><code style="color: red">{phone_number}</code> - Numéro de téléphone</p>
								</div>
								<div>
									<p><code style="color: red">{country}</code> - Pays</p>
								</div>
								<div>
									<p><code style="color: red">{phone_number}</code> - Numéro de téléphone</p>
								</div>
								<div>
									<p><code style="color: red">{phone_number}</code> - Numéro de téléphone</p>
								</div>
								<div>
									<p><code style="color: red">{city}</code> - Ville</p>
								</div>
								<div>
									<p><code style="color: red">{street_address}</code> - Adresse</p>
								</div>
								<div>
									<p><code style="color: red">{postcode}</code> - Code postal</p>
								</div>
								<div>
									<p><code style="color: red">{company_name}</code> - Nom de l'entreprise</p>
								</div>
								<div>
									<p><code style="color: red">{tax_number}</code> - Numéro d'identification fiscale</p>
								</div>
								<div>
									<p><code style="color: red">{state}</code> - Région</p>
								</div>
								<div>
									<p><code style="color: red">{affiliate_id}</code> -  Identifiant de l'affilié</p>
								</div>
								<div>
									<p><code style="color: red">{affiliate_dashboard}</code> -  URL pour affilier le tableau de bord </p>
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

	<!-- Summernote JS -->
	<script src="{{ asset('front/assets/vendor/summernote/summernote-bs4.js')}}"></script>
	<!-- Main Js Required -->
	<script src="{{ asset('front/assets/js/main.js')}}"></script>

	<script>
		$(document).ready(function() {
			$('.summernote').summernote({
				height: 170,
				tabsize: 2
			});
		});
	</script>

@endsection