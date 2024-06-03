@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <a href="{{route('roles.create')}}" class="btn btn-secondary float-right">Crear Rol</a>
    <h1 class="text-center">Lista de los roles</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Role</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                @can('roles.edit')
                                    <a href="{{route('roles.edit',$role)}}" class="btn btn-sm btn-primary">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('roles.delete')
                                    <form action="{{ route('roles.destroy',$role)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
@stop