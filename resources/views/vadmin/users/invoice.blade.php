@extends('layouts.vadmin.invoice')

@section('title','Listado de Usuarios')

@section('table-titles')
    <th>Usuario</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Grupo</th>
    <th>Fecha de Ingreso</th>
@endsection

@section('table-content')
    @foreach($items as $item)
    <tr>
        <td class="show-link">{{ $item->username }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ roleTrd($item->role) }}</td>
        <td>{{ groupTrd($item->group) }}</td>
        <td>{{ transDateT($item->created_at) }}</td>
    </tr>						
    @endforeach
@endsection