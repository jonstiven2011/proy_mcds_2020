@extends('layouts.app')
<link href="{{asset('css/galleryArticles.css')}}" rel="stylesheet" type="text/css">

@section('content')

    <div class="container">
        <div class="card bg-light mt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('users') }}">Lista de Usuarios</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Importar Usuarios</a></li>
                </ol>
            </nav>                
            <h2>
                Importar Usuarios
            </h2>
            <div class="card-body">
                <form action="{{ route('users.import.excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        @if(Session::has('message'))
                           
                        @endif

                    <label for="file-upload" class="subir">
                        <i class="fa fa-file-excel"></i> Seleccionar archivo Excel
                    </label>
                        <input id="file-upload" onchange='cambiar()' type="file" name="file" style='display: none;'/>
                        <div id="info"></div>
                        {{-- <input type="file" name="file"> --}}
                    <button class="btn btn-success btn-excel"><i class="fas fa-cloud-upload-alt"></i> Importar Usuarios</button>
                </form>
               
            </div>
        </div>
    </div>

    <script>
        function cambiar(){
            var pdrs = document.getElementById('file-upload').files[0].name;
            document.getElementById('info').innerHTML = pdrs;
        }
    </script>

@endsection