@extends('layouts.vadmin.main')

@section('title', 'Vadmin | Mensaje Recibido')

@section('header')
	@component('vadmin.components.header')
		@slot('breadcrums')
		     <li class="breadcrumb-item"><a href="{{ url('vadmin')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{ url('vadmin/stored_contacts') }}">Mensajes Recibidos</a></li>
            <li class="breadcrumb-item active">Mensaje de <b>{{ $item->name }}</b></li>
		@endslot
		@slot('actions')
		@endslot
	@endcomponent
@endsection

@section('content')
    <div class="row">
        @component('vadmin.components.container')
            @slot('title')
                 <h2>Nombre: {!! $item->name !!}</h2>
            @endslot
            @slot('content')
                {{ transDateAndTime($item->created_at) }}
                <br><br>
                <h2>Mensaje:</h2>
            	<p>{!! $item->message !!}</p>
            	<hr class="softhr">
                <i class="icon-android-mail"></i>  <b>E-Mail: </b>{!! $item->email !!} |
                <i class="icon-android-phone-portrait"></i>  <b>Teléfono: </b>{!! $item->phone !!}
            @endslot
        @endcomponent
    </div>
@endsection

