@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        {{-- Boton adicionar usuario --}}
                <a href="{{url('articles/create')}}" class="btn btn-success">
                    <i class="fa fa-plus"></i>
                    Adicionar Articulo
                </a>
                <a href="{{ url('generate/pdf/articles') }}" class="btn btn-indigo">
                    <i class="fa fa-file-pdf"></i> 
                    Generar Reporte PDF
                </a>
                <a href="{{ url('generate/excel/articles') }}" class="btn btn-indigo">
                    <i class="fa fa-file-excel"></i> 
                    Generar Reporte EXCEL
                </a>
                <br><br>
         {{-- Tabla --}}
            <table class="table table-inverse table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre Articulo</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{$article->name}}</td>
                            <td>{{$article->description}}</td>
                            <td><img src="{{asset($article->image)}}" width="40px"></td>
                            <td>
                                {{-- Boton de buscar --}}
                                <a href="{{ url('articles/'.$article->id) }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-search"></i> 
                                </a>
                                {{-- Boton de editar --}}
                                <a href="{{ url('articles/'.$article->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                                    <i class="fa fa-pen"></i> 
                                </a>
                                {{-- Botono de eliminar con seguridad--}}
                                <form action="{{ url('articles/'.$article->id) }}" method="post" style="display: inline-block;">
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
                            {{$articles->links()}}
                        </td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
@endsection
