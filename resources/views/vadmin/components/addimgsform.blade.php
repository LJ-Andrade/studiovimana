<div class="form-group">
    {!! Form::label('images', 'Agregar Imágenes') !!}
    <span style="font-size: 12px"> | Formatos soportados: jpeg, jpg, png, gif</span>
    {!! Form::file('images[]', array('multiple'=>true, 'id' => 'Multi_Images')) !!}
    <div class="Hidden"><input type="file" name="thumbnail" id="Single_Image"></div>
    <div class="ErrorImage"></div>
</div>