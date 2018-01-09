@extends('layouts.store.main')

@section('content')
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.store.partials.profile-aside')
            </div>
            <div class="col-lg-8">
                Favoritos 
                <br>                    
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <form class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">Nombre</label>
                            <input class="form-control" type="text" id="account-fn" value="{{ Auth::guard('customer')->user()->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">Apellido</label>
                            <input class="form-control" type="text" id="account-ln" value="{{ Auth::guard('customer')->user()->surname }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">E-mail</label>
                            <input class="form-control" type="email" id="account-email" value="{{ Auth::guard('customer')->user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Teléfono</label>
                            <input class="form-control" type="text" id="account-phone" value="{{ Auth::guard('customer')->user()->phone }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">Nueva Contraseña</label>
                            <input class="form-control" type="password" id="account-pass">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-confirm-pass">Confirmar Contraseña</label>
                            <input class="form-control" type="password_confirmation" id="account-confirm-pass">
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <label class="custom-control custom-checkbox d-block">
                                <input class="custom-control-input" type="checkbox" checked><span class="custom-control-indicator"></span><span class="custom-control-description">Subscribe me to Newsletter</span>
                            </label>
                            <button class="btn btn-primary margin-right-none" type="button" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="icon-circle-check" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection