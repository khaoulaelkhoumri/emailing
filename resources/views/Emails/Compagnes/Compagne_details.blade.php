@extends('layouts.app',["breadCamps"=>["Compagnes/Compagne Details"]])
		<!-- Summernote CSS -->
		<link rel="stylesheet" href="{{ asset('front/assets/vendor/summernote/summernote-bs4.css')}}" />
@section('style')
@endsection
@section('content')
	@include('layouts.alert')
	<!-- Main container start -->
	<div class="main-container">
		<!-- Row start -->
		<div class="row gutters">
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<form action="{{ route('editcompange')}}" method="POST">
							@csrf
							<input type="hidden" name="compange_id" value="{{$compange->id}}">
								<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<label for="fullName">Sujet</label>
										@if(!empty($compange))
										<input type="text" name="sujet" value="{{$compange->sujet}}" class="form-control @if($errors->get('sujet')) is-invalid  @endif" id="" placeholder="Sujet" {{($compange->statut != 0)? 'disabled' : ''}}>
										@endif
										@if ($errors->has('sujet'))
											<span class="text-danger">{{ $errors->first('sujet') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<label for="projet">Contacts</label> 
										<select class="form-control @if($errors->get('loti')) is-invalid  @endif"  name="loti" id="" {{($compange->statut != 0)? 'disabled' : ''}}>
											<option value="">Select Contacts</option>
											@foreach ($lotis as $loti)
												<option value="{{$loti->id}}" {{(($compange->emailing) && $compange->emailing->loti_id==$loti->id) ? 'selected' : ''}}>{{$loti->titre}}</option>
											@endforeach
										</select>
										@if ($errors->has('loti'))
											<span class="text-danger">{{ $errors->first('loti') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<label for="disabledInput">Adresse email de l'expéditeur</label>
										<input type="name" name="emailexp" value="{{$compange->email_exp}}" class="form-control @if($errors->get('emailexp')) is-invalid  @endif" id="disabledInput" placeholder="Adresse email de l'expéditeur"  {{($compange->statut != 0)? 'disabled' : ''}}>
										@if ($errors->has('emailexp'))
											<span class="text-danger">{{ $errors->first('emailexp') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="form-group">
										<label for="nomexp">Nom de l'expéditeur</label>
										<input type="name" name="nomexp" value="{{$compange->nom_exp}}" class="form-control @if($errors->get('nomexp')) is-invalid  @endif" id="" placeholder="Nom de l'expéditeur" {{($compange->statut != 0)? 'disabled' : ''}}>
										@if ($errors->has('nomexp'))
											<span class="text-danger">{{ $errors->first('nomexp') }}</span>
										@endif
									</div>
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="card-body" style="padding: 1.25rem 0rem;">
											<label for="">Corps de l'email</label>
											<textarea class="summernote @if($errors->get('message')) is-invalid  @endif" name="message">{{$compange->message}} </textarea>
												@if ($errors->has('message'))
													<span class="text-danger">{{ $errors->first('message') }}</span>
												@endif
											<div>
												@if ($compange->statut == 0)
													<a href=" {{route('Emails.Compagnes.Liste_Compagne')}} "class="btn btn-dark">Annuler</a>
													<button class="btn btn-primary" type="submit">Enregistrer</button>  
													<a href="{{ route('testerlenvoi',['compange_id'=>$compange->id])}}" class="btn btn-primary">Tester l'envoi</a>  
													<a href="{{route('demmarrerenvoi',['compange_id'=>$compange->id])}}" class="btn btn-primary">Démarrer l'envoi</a>
												@elseif($compange->statut == 1)
													<a href="{{ route('traiter',['compange_id'=>$compange->id] )}}" class="btn btn-primary">Traiter</a>
												@elseif($compange->statut == 2)
													<a href="{{ route('archiver',['compange_id'=>$compange->id] )}}" class="btn btn-primary">Archiver</a>
												@endif
											</div>
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
								<p><code style="color: red">{tele}</code> - Numéro de téléphone</p>
							</div>
							<div>
								<p><code style="color: red">{pays}</code> - Pays</p>
							</div>
							<div>
								<p><code style="color: red">{ville}</code> - Ville</p>
							</div>
							<div>
								<p><code style="color: red">{adresse}</code> - Adresse</p>
							</div>
							<div>
								<p><code style="color: red">{code_postal}</code> - Code postal</p>
							</div>
							<div>
								<p><code style="color: red">{nom_entreprise}</code> - Nom de l'entreprise</p>
							</div>
							<div>
								<p><code style="color: red">{num_if_entreprise}</code> - Numéro d'identification fiscale</p>
							</div>
							<div>
								<p><code style="color: red">{region}</code> - Région</p>
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
	<script>
		$(document).ready(function() {
			$('.summernote').summernote({
				height: 300,
				tabsize: 2
			});
		});
	</script>
	<!-- Summernote JS -->
	<script src="{{ asset('front/assets/vendor/summernote/summernote-bs4.js')}}"></script>
@endsection