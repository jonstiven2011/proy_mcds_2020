@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
                <a href="{{url('categories/create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Adicionar Categoria
                </a>
                <a href="{{ url('generate/pdf/categories') }}" class="btn btn-indigo">
                    <i class="fa fa-file-pdf"></i> 
                    Generar Reporte PDF
                </a>
                <a href="{{ url('generate/excel/categories') }}" class="btn btn-indigo">
                    <i class="fa fa-file-excel"></i> 
                    Generar Reporte EXCEL
                </a>
                <br><br>
         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Categoria</th>
                        <th>Descripción</th>
                        <th>Foto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categoria)
                        <tr>
                            <td>{{$categoria->name}}</td>
                            <td>{{$categoria->description}}</td>
                            <td><img src="{{asset($categoria->image)}}" width="40px"></td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('categories/'.$categoria->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('categories/'.$categoria->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('categories/'.$categoria->id) }}" method="post" style="display: inline-block;">
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
                            {{$categories->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection
