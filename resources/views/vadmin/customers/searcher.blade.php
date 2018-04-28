<div id="SearchFilters" class="search-filters">
    {{-- Search --}}
    <div class="row">
    {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'customers.index', 'class' => 'form-inline col-md-4 col-sm-12', 'role' => 'search']) !!} 
        <div class="form-group">
            {!! Form::label('name', 'Nombre, usuario o e-mail') !!} <br>  
            {!! Form::text('name', null, ['id' => 'SearchInput', 'class' => 'form-control', 'aria-describedby' => 'search']) !!}
        </div>
        <div class="form-group">
            <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</button>
        </div>
        <hr class="softhr">
    {!! Form::close() !!}
    {!! Form::open(['id' => 'SearchForm', 'method' => 'GET', 'route' => 'customers.index', 'class' => 'form-inline col-md-8 col-sm-12', 'role' => 'search']) !!} 
        <div class="form-group">
            {!! Form::label('group', 'Grupo') !!} <br>
            <select name="group" class="form-control">
                <option value="0" selected disabled>Seleccione un Grupo</option>
                <option value="*">Todos</option>
                <option value="1">Nuevos</option>
                <option value="2">Minorístas</option>
                <option value="3">Mayorístas</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" id="SearchFiltersBtn" class="btnSm btnGreen actionBtn">Buscar</button>
        </div>
    {!! Form::close() !!}
    </div>
    {{-- /Search --}}
    <div class="btnClose btn-close"><i class="icon-android-cancel"></i></div>		
</div>
