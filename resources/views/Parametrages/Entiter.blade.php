@extends('layouts.app',["breadCamps"=>["Entiter"]])
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
                        <a  href="#" class="btn btn-primary float-right financementBtn" data-toggle="modal" data-target="#addNewContact">Créer</a>	
                    </div>
                    <div class="col-md-12">
                        <div class="table-container">
                            <div class="t-header">Entites</div>
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>logo</th>
                                            <th>Nom</th>
                                            <th>Date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($entiter as $entite)
                                            <tr>
                                                <td><img src="{{asset('entites/'.$entite->logo)}}" alt="" width="30" height="30"></td>
                                                <td>{{$entite->nom}}</td>
                                                <td>{{$entite->created_at}}</td>
                                                <td>
                                                    <div class="td-actions">
                                                        <a href="{{(route("Parametrages.Project",['entiter'=>$entite->id]))}}"  class="icon blue" data-toggle="tooltip" data-placement="top" title="Détails">
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

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Modal start -->
            <div class="modal fade" id="addNewContact" tabindex="-1" role="dialog" aria-labelledby="addNewContactLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addNewContactLabel">Créer Entiter</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="" action="{{ route('saveentiter')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="nom">Logo</label> 
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input @if($errors->get('logo')) is-invalid  @endif" id="uploadPhoto">
                                                <label class="custom-file-label" for="uploadPhoto" aria-describedby="uploadPhotoAddon">Upload</label>
                                                @if ($errors->has('logo'))
                                                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="nom">Nom</label> 
                                        <input type="text" name="nom" class="form-control @if($errors->get('nom')) is-invalid  @endif" id="" placeholder="Nom">
                                        @if ($errors->has('nom'))
                                            <span class="text-danger">{{ $errors->first('nom') }}</span>
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

    @if ($errors->has('logo') || $errors->has('nom'))
        <script>
            $(document).ready(function(){
                $(".financementBtn").trigger("click");
            })
        </script>
    @endif
@endsection