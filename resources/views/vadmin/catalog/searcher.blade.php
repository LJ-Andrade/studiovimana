<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'catalogo.index', 'class' => 'form-inline', 'role' => 'search']) !!} 
        <div class="form-group">
            {!! Form::label('code', 'Código') !!} <br>  
            {!! Form::text('code', null, ['id' => 'SearchInput', 'class' => 'form-control', 'aria-describedby' => 'search']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Título') !!} <br>  
            {!! Form::text('name', null, ['id' => 'SearchInput', 'class' => 'form-control', 'aria-describedby' => 'search']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category', 'Categoría') !!} <br>
            {!! Form::select('category', $categories, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opcion']) !!}
        </div>
        <div class="form-group">
            <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</button>
        </div>
    {!! Form::close() !!}
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
