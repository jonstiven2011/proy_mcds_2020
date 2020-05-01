@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {{-- Inicio de formulario--}}
        <div class="col-md-8 offset-md-2">
            <h1 class="h3">
                <i class="fa fa-person"></i>
                Mis Datos Personales
            </h1>
            <hr>
            {{-- Menu Migajas de pan --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mis Datos</li>
                </ol>
            </nav>
        <form action="{{url('users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden" name="id" value="{{ $user->id }}">
                {{-- Nombre Completo --}}
                <div class="form-group">
                    <label for="fullname" class="text-md-right">Nombre Completo</label>

                    <input id="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname',$user->fullname) }}"  autocomplete="fullname" autofocus>

                    @error('fullname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Correo Electronico --}}
                <div class="form-group">
                    <label for="email" class="text-md-right">Correo Electrónico</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}"  autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Numero Telefonico--}}
                <div class="form-group">
                    <label for="phone" class="text-md-right">Numero Telefonico</label>

                    <input id="phone" type="texto" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone',$user->phone) }}"  autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Fecha nacimiento --}}
                <div class="form-group">
                    <label for="birthdate" class="text-md-right">Fecha Nacimiento</label>

                    <input id="birthdate" type="texto" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate',$user->birthdate) }}"  autocomplete="birthdate">

                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
{{-- El old lo que hace es recordar el nombre del campo --}}
                {{-- GENERO --}}
                <div class="form-group">
                    <label for="gender" class="text-md-right">Genero</label>

                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                        <option value="">Seleccione...</option>
                        <option value="Male" @if (old('gender',$user->gender) == 'Male') selected @endif>Hombre</option>
                        <option value="Female" @if (old('gender',$user->gender) == 'Female') selected @endif>Mujer</option>
                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- Direccion--}}
                <div class="form-group">
                    <label for="address" class="text-md-right">Dirección</label>

                    <input id="address" type="texto" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address',$user->address) }}"  autocomplete="address">

                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Photo--}}
                <div class="form-group">
                    <label for="photo" class="text-md-right">Foto</label>
                    <button class="btn btn-indigo btn-block btn-upload @error('address') is-invalid @enderror" type="button">
                        <i class="fa fa-upload"></i>
                        Seleccionar Foto
                    </button>

                    <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror d-none" name="photo" accept="image/*" >
                    <br>
                    {{-- Campo de muestra de imagen --}}
                    <div class="text-center">
                        <img src="{{asset($user->photo)}}" id="preview" class="img-thumbnail" width="120px">
                    </div>

                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Contraseña --}}

                {{-- Confirmar Contraseña --}}
                
                <div class="form-group">
                    <button type="submit" class="btn btn-indigo btn-block">
                        <i class="fa fa-save"></i>
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
