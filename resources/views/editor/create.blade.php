@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-plus"></i>
                Adicionar un Articulo
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ url('editor/index') }}">Mis Articulos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Adicionar Articulo</li>
                </ol>
            </nav>
        <form action="{{url('articles')}}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nombre Articulo --}}
                <div class="form-group">
                    <label for="name" class="text-md-right">Nombre Articulo</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Categoria --}}
                {{-- <div class="form-group">
                    <label for="category" class="text-md-right">Categoria</label>

                    <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" category="category" value="{{ old('category') }}"  autocomplete="category" autofocus>

                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}
                {{-- Descripcion--}}
                <div class="form-group">
                    <label for="description" class="text-md-right">Descripción</label>

                    <input id="description" type="texto" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description">

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> 
                {{-- User_Id--}}
                <div class="form-group">
                    <label for="user" class="text-md-right">Usuario</label>

                    <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ $user->fullname }}" autocomplete="user" autofocus disabled="true">
                     
                </div> 
                {{-- Category_id--}}
                <div class="form-group">
                    {{-- <label for="category_id" class="text-md-right">Categoria ID</label>

                    <input id="category_id" type="texto" class="form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}"  autocomplete="category_id"> --}}
                    <label for="category" class="text-md-right">Categoria</label>

                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">Seleccione...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if (old('category', $category->category) == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Image--}}
                <div class="form-group">
                    <label for="image" class="text-md-right">Foto</label>
                    <button class="btn btn-indigo btn-block btn-upload @error('image') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar Imagen
                    </button>

                    <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror d-none" name="image" accept="image/*" >
                    <br>
                    {{-- Campo de muestra de imagen --}}
                    <div class="text-center">
                        <img src="{{asset('imgs/noimage.png')}}" id="preview" class="img-thumbnail" width="120px">
                    </div>

                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Fin Form --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-indigo btn-block">
                        <i class="fa fa-save"></i>
                        Adicionar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
