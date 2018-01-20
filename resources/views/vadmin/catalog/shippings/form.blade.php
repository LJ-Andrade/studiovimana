<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'id' => 'TitleInput', 'required' => '']) !!}
</div>  
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Descripción sobre el envío']) !!}
</div>  
<div class="form-group">
    {!! Form::label('zone', 'Zona') !!}
    {!! Form::text('zone', null, ['class' => 'form-control', 'placeholder' => 'Zonas o Límites']) !!}
</div>  
<div class="form-group">
    {!! Form::label('delivery_time', 'Tiempo de entrega') !!}
    {!! Form::text('delivery_time', null, ['class' => 'form-control', 'placeholder' => 'Tiempo de espera estimado']) !!}
</div>  
<div class="form-group">
    {!! Form::label('price', 'Costo') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Estimativo o aclaración sobre el costo']) !!}
</div>  
