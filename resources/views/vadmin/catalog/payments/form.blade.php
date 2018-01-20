<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del método de pago', 'required' => '']) !!}
</div>  
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'size' => '30x5', 'placeholder' => 'Describa el método de pago']) !!}
</div>
<div class="form-group">
    {!! Form::label('percent', 'Porcentaje') !!}
    {!! Form::text('percent', null, ['class' => 'form-control', 'placeholder' => 'Ingrese porcentaje si corresponde']) !!}
</div>  
