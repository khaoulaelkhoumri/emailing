@extends('layouts.app',["breadCamps"=>["Tableau de board"]])
@section('style')
    
@endsection
@section('content')
    <!-- Main container start -->
    <div class="main-container">
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-eye1"></i>
                    </div>
                    <div class="sale-num">
                    <h3>{{ count($compagne)}}</h3>
                    <p>Compagnes</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-shopping-cart1"></i>
                    </div>
                    <div class="sale-num">
                        <h3>{{count($project)}}</h3>
                        <p>Projects</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-shopping-bag1"></i>
                    </div>
                    <div class="sale-num">
                        <h3>{{count($lotis)}}</h3>
                        <p>Lotis</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="info-stats4">
                    <div class="info-icon">
                        <i class="icon-contact_mail"></i>
                    </div>
                    <div class="sale-num">
                        <h3>{{count($contact)}}</h3>
                        <p>Contacts</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end -->
    </div>
    <!-- Main container end -->
@endsection
@section('script')
    
@endsection

