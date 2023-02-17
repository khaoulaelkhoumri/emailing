@extends('layouts.app',["breadCamps"=>["Contacts"]])
@section('style')
	<!-- Data Tables -->
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
				<div class="row gutters d-flex justify-content-end">
					<div class="col-md-4">
						<select class="form-control" onchange="location = this.value;">
							<option value="{{route('Contacts.Liste_Contacts')}}">Contatcts</option>
							@foreach ($lotis as $loti)
								<option value="{{route('Contacts.Liste_Contacts',['lotis'=>$loti->id])}}" {{($loti->id == request()->lotis) ?'selected':''}}>{{$loti->titre}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-1">
						<a href="{{route('Contacts.Nouveaux_Contact')}}" type="button" class="btn btn-primary ">Créer</a>
					</div>
					<div class="col-2">
						<a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewContact">Importer des contacts</a>
					</div>
				</div>
				<div class="row gutters">
					<div class="col-md-12">
						<div class="table-container">
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
										@foreach ($contacts as $contact)
										<tr>
											<td>{{ $contact->nom}}</td>
											<td>{{ $contact->prenom}}</td>
											<td>{{ $contact->email}}</td>
											<td>{{ $contact->tele}}</td>
											<td>
												<div class="td-actions">
													<a href="{{ route('Contact.Contact_Details',['contact'=> $contact->id])}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Détails">
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

	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<!-- Modal start -->
			<div class="modal fade" id="addNewContact" tabindex="-1" role="dialog" aria-labelledby="addNewContactLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addNewContactLabel">Importer Contats</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="{{ route('importecontacts')}}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="modal-body">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="mb-3">
										<label for="formFile" class="form-label">Default file input example</label>
										<input class="form-control" name="file" type="file" id="formFile" accept=".xlsx, .xls,.csv">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" name="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<button type="submit" name="submit"  class="btn btn-primary">Enregister</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Modal end -->
		</div>
	</div>
@endsection
@section('script')
	<!-- Data Tables -->
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- Custom Data tables -->
	<script src="{{ asset('front/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/custom/fixedHeader.js')}}"></script>
@endsection