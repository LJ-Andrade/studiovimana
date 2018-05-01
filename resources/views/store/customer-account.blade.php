@extends('layouts.store.main')

@section('content')
    <div class="container padding-bottom-3x mb-2 marg-top-25">
        <div class="row">
            <div class="col-lg-4">
                @include('layouts.store.partials.profile-aside')
            </div>
            <div class="col-lg-8">
                <br>                    
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <form class="row" method="POST" action="{{ route('store.updateCustomer') }}">
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="email" name="email" value="{{ Auth::guard('customer')->user()->email }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de Usuario</label>
                            <input class="form-control" type="text" name="username" value="{{ Auth::guard('customer')->user()->username }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input class="form-control" type="text" name="name" value="{{ Auth::guard('customer')->user()->name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Apellido</label>
                            <input class="form-control" type="text" name="surname" value="{{ Auth::guard('customer')->user()->surname }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input class="form-control" type="text" name="phone" value="{{ Auth::guard('customer')->user()->phone }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Teléfono 2</label>
                            <input class="form-control" type="text" name="phone2" value="{{ Auth::guard('customer')->user()->phone2 }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dirección</label>
                            <input class="form-control" type="text" name="address" value="{{ Auth::guard('customer')->user()->address }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Código Postal</label>
                            <input class="form-control" type="text" name="cp" value="{{ Auth::guard('customer')->user()->cp }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Provincia</label>
                            
                            {!! Form::select('geoprov_id', $geoprovs, Auth::guard('customer')->user()->geoprov_id,
                            ['class' => 'GeoProvSelect form-control', 'placeholder' => 'Seleccione una opción']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Localidad</label>
                            <select id='GeoLocsSelect' name="geoloc_id" 
                                data-actualloc="{{ Auth::guard('customer')->user()->geoloc->name }}" 
                                data-actuallocid="{{ Auth::guard('customer')->user()->geoloc->id }}" 
                                class="form-control GeoLocsSelect">
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <label class="custom-control custom-checkbox d-block">
                            </label>
                            <button class="btn btn-primary margin-right-none" type="submit">Actualizar Datos</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="Error"></div>
    </div>
@endsection

@section('scripts')
	@include('store.components.bladejs')
@endsection

@section('custom_js')
<script>
    $(document).ready(function(){

        getGeoLocs("{{ Auth::guard('customer')->user()->geoprov_id }}");
        
        $('.GeoProvSelect').on('change', function(){
            let prov_id = $(this).val();
            getGeoLocs(prov_id);
        });
    });
</script>
@endsection