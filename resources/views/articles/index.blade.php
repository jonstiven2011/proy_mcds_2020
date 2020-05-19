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
                {{-- Busqueda Articulo --}}
                <div class="form-inline">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="search" id="qqsearch" name="qqsearch" class="form-control" autocomplete="off" placeholder="Buscar...">  
                    </div>
                </div>
                @csrf
                {{-- Carga la imagen "d-none" oculta la imagen o cualquier cosa--}}
                <div class="loading d-none text-center" >
                    <img src="{{asset('imgs/loading.gif')}}" width="100px">
                </div>
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
                {{-- Se requiere de articles-content, esto permite actualizar la tabla cuando estoy buscando y se llama en el jquery de app.blade --}}
                <tbody id="articles-content">
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
