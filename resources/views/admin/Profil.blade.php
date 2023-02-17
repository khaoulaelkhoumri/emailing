@extends('layouts.app',['breadCamps' => ['Mon Profile']])
@section('style')
@endsection
@section('content')
    <!-- Row start -->
    <div class="main-container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="{{ asset('front/assets/img/user24.png') }}" alt="Le Rouge Admin">
                                </div>
                                <h5 class="user-name">{{ Auth::user()->name }}</h5>
                                <h6 class="user-email">{{ Auth::user()->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="card-title">Update Profile</div>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">{{ $error }}</p>
                                @endforeach 
                                <div class="form-group">
                                    <label for="fullName">Nom</label>
                                    <input type="text" readonly class="form-control" id="fullName" placeholder="Nom" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input readonly type="email" class="form-control" id="email" value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">poste</label>
                                    <input type="text" readonly class="form-control" id="phone"value="">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <form method="POST" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="addRess"> current password</label>
                                        <input Required id="password" type="password"
                                            class="form-control"name="current_password" autocomplete="current-password"
                                            placeholder="Enter password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">new password</label>
                                        <input Required type="password" class="form-control" id="new_password"
                                            placeholder="Enter new password" name="new_password"
                                            autocomplete="current-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_confirm_password">confirm password</label>
                                        <input Required type="password" class="form-control" id="new_confirm_password"
                                            placeholder="confirm password" name="new_confirm_password"
                                            autocomplete="current-password">
                                    </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-white">Cancel</button>
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-primary">Enregistrer</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Row end -->
@endsection
@section('script')
    <script src="{{ asset('../template/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('../template/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
@endsection