@extends('layouts.web.main')
@section('title', 'StudioVimana | Inicio')

@section('styles')
    
@endsection

@section('content')

    <div class="container error-page">
        <div class="row">
            <h1>UPS !</h1>
            <h1>La página que está buscando no existe</h1>
            <hr class="softhr">
            <a href="{{ url('/') }}"><button class="button btnHollowGreen">Volver al inicio</button></a>
            <a href="{{ route('web.portfolio') }}"><button class="button btnHollowGreen">Ir al PORTFOLIO</button></button></a>
        </div>
    </div>

@endsection

@section('scripts')

@endsection

@section('custom_js')
    <script>
        $('.navbar-default').css('background-color','rgb(255, 128, 136)');
    </script>
@endsection