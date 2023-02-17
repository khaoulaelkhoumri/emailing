@extends('layouts.app')
@section('style')
    
@endsection
@section('content')

	<!-- Page header start -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Admin Dashboard</li>
        </ol>

        <ul class="app-actions">
            <li>
                <a href="#" id="reportrange">
                    <span class="range-text"></span>
                    <i class="icon-chevron-down"></i>	
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="icon-export"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- Page header end -->
    
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
                    <h3>125</h3>
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
                        <h3>145</h3>
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
                        <h3>1458</h3>
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
                        <h3>10000</h3>
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

