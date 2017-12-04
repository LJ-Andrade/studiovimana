<div class="form-group">
    {!! Form::label('images', 'Agregar Imágenes') !!}
    <span style="font-size: 12px"> | Formatos soportados: jpeg, jpg, png, gif</span>
    {{--  Images Input  --}}
    {!! Form::file('images[]', array('multiple'=>true, 'id' => 'Multi_Images')) !!}
    {{--  Thumbnail Input  --}}
    <div class="Hidden">
        {!! Form::file('thumbnail', array('multiple'=>false, 'id' => 'ThumbnailUploader')) !!}
    </div>
    
    <div class="ErrorImage"></div>
</div>