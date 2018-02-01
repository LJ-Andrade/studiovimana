{{-- Title --}}
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'id' => 'TitleInput', 
            'required' => '', 'maxlength' => '120', 'minlength' => '4']) !!}
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('slug', 'Url Amigable - Dirección web') !!}
            {!! Form::text('slug', null, ['class' => 'SlugInput form-control', 'placeholder' => 'Dirección visible (en explorador)', 'id' => 'SlugInput', 'required' => '']) !!}
            <div class="slug2"></div>
        </div>
    </div>
    <div class="col-md-2">
        {!! Form::label('stock', 'Stock') !!}
        {!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Stock']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::label('stockmin', 'Stock Mínimo') !!}
        {!! Form::number('stockmin', null, ['class' => 'form-control', 'placeholder' => 'Stock mínimo']) !!}
    </div>
</div>
<div class="row">
    {{--  Code  --}}
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('code', 'Código') !!}
            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código', 'required' => '']) !!}
        </div>
    </div>
    {{--  Price  --}}
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('price', 'Precio') !!}
            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0', 'required' => '', 'maxlength' => '30', 'step'=>'any']) !!}
        </div>
    </div>
    {{--  Discount  --}}
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('discount', '% Oferta') !!}
            {!! Form::number('discount', '0', ['class' => 'form-control', 'min' => '0', 'maxlength' => '30', 'step'=>'any']) !!}
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('atribute1', 'Cualidades') !!}
            {!! Form::select('atribute1[]', $atribute1, null, ['class' => 'Select-Atribute form-control', 'multiple']) !!}
            <div class="slug2"></div>
        </div>
    </div>
    {{--  Textile  --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('textile', 'Propiedades') !!}
            {!! Form::text('textile', null, ['class' => 'form-control', 'placeholder' => 'Ingrese una propiedad', 
            'required' => '', 'maxlength' => '50']) !!}
        </div>
    </div>
</div>
{{-- Content --}}
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control Textarea-Editor']) !!}
</div>
<div class="row">
    {{-- Category --}}
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('category_id', 'Categoría') !!}
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control Select-Category-', 'placeholder' => 'Seleccione una opcion',
            'required' => '']) !!}
        </div>
    </div>
    {{-- Tags--}}
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('tags', 'Etiquetas') !!}
            {!! Form::select('tags[]', $tags, null, ['class' => ' Select-Tags form-control', 'multiple', 'required' => '']) !!}
        </div>
    </div>
    {{-- Status--}}
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="form-group">
            {!! Form::label('status', 'Estado') !!}
            {!! Form::select('status', ['1' => 'Activo','0' => 'Pausado'], null, ['class' => 'form-control']) !!}
        </div>
    </div>	
</div>
{{-- Images--}}
<div class="row">
    <div class="col-md-3">
        @component('vadmin.components.catalogthumbnail')
            @slot('thumbnail')
                @if(isset($article) && $article->thumb != '')
                    <img class="Featured-Image-Container" src="{{ asset('webimages/catalogo/'.$article->thumb) }}">
                @else
                    <img class="Featured-Image-Container" src="{{ asset('webimages/gen/catalog-gen.jpg') }}">
                @endif
            @endslot
        @endcomponent
    </div>
    @if(isset($article) && count($article->images) != 0 )
        <div class="col-md-9 actual-images horizontal-list">
            <h2>Imágenes Publicadas</h2>
            <ul>
                @foreach($article->images->reverse() as $image)
                <li id="Img{{ $image->id }}">	
                    <img src="{{ asset('webimages/catalogo/'.$image->name) }}">
                    <div class="overlayItemCenter">
                        <i class="Delete-Product-Img icon-ios-trash-outline delete-img" data-imgid="{{ $image->id }}"></i>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <br>
        @include('vadmin.components.addimgsform')
    @else
        <div class="col-md-9">
            @include('vadmin.components.addimgsform')
        </div>
    </div> {{--  /Row  --}}
    @endif
