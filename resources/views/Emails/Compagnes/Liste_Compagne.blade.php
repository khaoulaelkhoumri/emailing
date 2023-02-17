@extends('layouts.app',["breadCamps"=>["Compagnes"]])
@section('style')
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/datatables/dataTables.bs4.css')}}" />
	<link rel="stylesheet" href="{{ asset('front/assets/vendor/datatables/dataTables.bs4-custom.css')}}" />
	<link href="{{ asset('front/assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />
@endsection
@section('content')
	<!-- Main container start -->
	<div class="main-container">
		<!-- Row start -->
		<div class="card"> 
			<div class="card-body">
				<div class="row">
					<div class="col-md-7"></div>
					<div class="col-md-4">
						<select class="form-control" name="forma" onchange="location = this.value">
							<option value="{{route('Emails.Compagnes.Liste_Compagne')}}">Projects</option>
							@foreach ($projects as $pro)
								<option value="{{route('Emails.Compagnes.Liste_Compagne',['project'=>$pro->id])}}" {{($pro->id == request()->project)? 'selected':''}}>{{$pro->nom}}</option>  
							@endforeach
						</select>  
					</div> 
					<div class="col-md-1">
						<button class="btn btn-primary financementBtn"  data-toggle="modal" data-target="#addNewContact">Créer</button>	
					</div>
				</div>
				<div class="row gutters">
					<div class="col-md-12">
						<div class="table-container">
							<div class="t-header">Campagnes</div>
							<div class="table-responsive">
								<table id="basicExample" class="table custom-table">
									<thead>
										<tr>
											<th>Nom</th>
											<th>Description</th>
											<th>Nombre d'emails</th>
											<th>Date de création</th>
											<th>Statuts</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($compagnes as $compange)
										<tr>
											<td> {{ $compange->titre}} </td>
											<td> {{ $compange->description}} </td>
											<td>
												@if (!empty($compange->emailing))
													@if ($compange->emailing->emailingdetails)
													{{count($compange->emailing->emailingdetails)}}
													@endif
												@endif
											</td>
											<td> {{ $compange->created_at}} </td>
											<td> 
												@switch($compange->statut)
													@case(0) @php $type="btn btn-warning"; $text="Brouillon" @endphp @break
													@case(1)  @php $type="btn btn-primary"; $text="Envoi encore" @endphp @break
													@case(2)  @php $type="btn btn-success"; $text="Traitée" @endphp @break
													@case(3) @php $type="btn btn-secondary"; $text="Archive" @endphp @break
													
												@endswitch
												<span class="badge badge-{{$type}}">{{$text}}</span>	
											</td>
											<td>
												<div class="td-actions">
													<a href="{{ route("Emails.Compagnes.Compagne_details",['compange'=>$compange->id])}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Détails">
														<i class="icon-circle icon-menu1"></i>
													</a>
													<a href="{{ route("copycompagne", ['compange'=>$compange->id])}}" class="icon blue" data-toggle="tooltip" data-placement="top" title="Dupliquer">
														<i class="icon-circle icon-copy"></i>
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
	<!-- Row start -->
	<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<!-- Modal start -->
			<div class="modal fade" id="addNewContact" tabindex="-1" role="dialog" aria-labelledby="addNewContactLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addNewContactLabel">Créer campagne</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="" action="{{ route('savecompagne')}}" method="POST">
							@csrf
							<div class="modal-body">
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<label for="projet">Projet</label> 
											<select class="form-control @if($errors->get('project')) is-invalid  @endif"  name="project" id="">
												<option value="">Select project</option>
												@foreach ($projects as $project)
													<option value="{{$project->id}}">{{$project->nom}}</option>
												@endforeach
											</select>
											@if ($errors->has('project'))
											<span class="text-danger">{{ $errors->first('project') }}</span>
											@endif
										</div>
									</div> 
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div cllass="form-group">
											<label for="nom">Nom</label> 
											<input type="text" name="titre" class="form-control @if($errors->get('titre')) is-invalid  @endif" id="" placeholder="Nom">
											@if ($errors->has('titre'))
											<span class="text-danger">{{ $errors->first('titre') }}</span>
											@endif
										</div>
									</div>
									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-floating" style="padding-top: 15px;">
											<label for="floatingTextarea">Description</label>
											<textarea class="form-control @if($errors->get('description')) is-invalid  @endif" type="text" name="description" placeholder="Description"></textarea>
											@if ($errors->has('description'))
											<span class="text-danger">{{ $errors->first('description') }}</span>
											@endif
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
	<!-- Row end -->
@endsection
@section('script')
	<!-- Data Tables -->
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.min.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
	
	<!-- Custom Data tables -->
	<script src="{{ asset('front/assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
	<script src="{{ asset('front/assets/vendor/datatables/custom/fixedHeader.js')}}"></script>

	@if ($errors->has('project_id') || $errors->has('titre') || $errors->has('description')  )
        <script>
            $(document).ready(function(){
                $(".financementBtn").trigger("click");
            })
        </script>
    @endif
@endsection