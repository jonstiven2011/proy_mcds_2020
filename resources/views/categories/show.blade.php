@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-search"></i>
                Consultar Categorias
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('categories') }}">Lista de Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consultar Categoria</li>
                </ol>
            </nav>
            {{-- Tabla --}}
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td colspan="2" class="text-center">
                    <img class="img-thumbnail" src="{{ asset($category->image) }}" width="200px">
                    </td>
                </tr>
                <tr>
                    <th>Nombre Completo:</th>
                    <td>{{ $category->name}}</td>
                </tr>
                <tr>
                    <th>Correo Electronico:</th>
                    <td>{{ $category->description}}</td>
                </tr>
            </table>
        
        </div>
    </div>
</div>
@endsection
