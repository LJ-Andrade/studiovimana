
{{-- Title --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Título del artículo', 'id' => 'TitleInput', 
            'required' => '', 'maxlength' => '120', 'minlength' => '4']) !!}
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('slug', 'Url - Dirección web') !!}
            {!! Form::text('slug', null, ['class' => 'SlugInput form-control', 'placeholder' => 'Dirección visible (en explorador)', 'id' => 'SlugInput', 'required' => '']) !!}
            <div class="slug2"></div>
        </div>
    </div>
</div>
<div class="row">
    {{--  Code  --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('code', 'Código') !!}
            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el código', 'required' => '']) !!}
        </div>
    </div>
    {{--  Price  --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('price', 'Precio') !!}
            {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el precio', 'min' => '0', 'required' => '', 'maxlength' => '30']) !!}
        </div>
    </div>
    {{-- Slug --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('atribute1', 'Talles') !!}
            {!! Form::select('atribute1[]', $atribute1, null, ['class' => 'Select-Atribute form-control', 'multiple']) !!}
            <div class="slug2"></div>
        </div>
    </div>
    {{--  Textile  --}}
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('textile', 'Textil') !!}
            {!! Form::text('textile', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el textil', 
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
            {!! Form::label('tags', 'Tags') !!}
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
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('images', 'Imágenes') !!}
            <span style="font-size: 12px"> | Formatos soportados: jpeg, jpg, png, gif</span>
            {!! Form::file('images[]', array('multiple'=>true, 'id' => 'Multi_Images')) !!}
            <div class="ErrorImage"></div>
        </div>
    </div>
</div>
