@extends('layouts.app',["breadCamps"=>["Utilisateurs"]])
@section('style')
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/datatables/dataTables.bs4.css')}}" />
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/datatables/dataTables.bs4-custom.css')}}" />
	<link href="{{ asset('front/assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
@endsection
@section('content')
@include('layouts.alert')
	<!-- Main container start -->
	<div class="main-container">
		<div class="card">
			<div class="card-body">
				<div class="row gutters">
					<div class="col-md-12">
						<a href="{{ route('Parametrages.Utilisateurs.Nouveaux_Utilisateur') }}" class="btn btn-primary float-right">Créer</a>	
					</div>
					<div class="col-md-12">
						<div class="table-container">
							<div class="t-header">Utilisateurs</div>
							<div class="table-responsive">
								<table id="basicExample" class="table custom-table">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Prénom</th>
											<th>Email</th>
											<th>Numéro de téléphone</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($utilisateur as $utili)
										<tr>
												<td>{{$utili->nom}}</td>
												<td>{{$utili->prenom}}</td>
												<td>{{$utili->email}}</td>
												<td>{{$utili->telephone}}</td>
												<td>
												<div class="td-actions">
													<a href="{{ route('Parametrages.Utilisateurs.Utilisateur_Details', ['utilisateur'=>$utili->id])}}" class="icon blue" title="Détails">
													<i class="icon-circle icon-menu1"></i>
													</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
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
	<!-- Data Tables -->
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- Custom Data tables -->
	<script src="{{ asset('front/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/custom/fixedHeader.js')}}"></script>
@endsection