@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
            <a href="{{url('users/create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i>Adicionar Usuario
            </a>
            <a href="{{url('import')}}" class="btn btn-secondary">
                <i class="fa fa-file-import"></i> Importar Usuarios
            </a>
            <a href="{{ url('generate/pdf/users') }}" class="btn btn-indigo">
                <i class="fa fa-file-pdf"></i> 
                Generar Reporte PDF
            </a>
            <a href="{{ url('generate/excel/users') }}" class="btn btn-indigo">
                <i class="fa fa-file-excel"></i> 
                Generar Reporte EXCEL
            </a>
            {{-- Busqueda --}}
            <br><br>
            <div class="form-inline">
                <input type="search" id="qsearch" name="qsearch" class="form-control" autocomplete="off" placeholder="Buscar...">  
            </div>
            <br>
         {{-- Carga la imagen "d-none" ocula la imagen o cualquier cosa--}}
         <div class="loading d-none text-center" >
            <img src="{{asset('imgs/loading.gif')}}" width="100px">
         </div>
           {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Correo Electronico</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                {{-- users-content permite actualizar la tabla cuando estoy buscando --}}
                <tbody id="users-content">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{asset($user->photo)}}" width="40px"></td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('users/'.$user->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('users/'.$user->id) }}" method="post" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            {{-- Para paginar --}}
                            {{$users->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection
