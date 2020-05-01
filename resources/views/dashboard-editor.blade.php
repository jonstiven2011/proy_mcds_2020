@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/mydata.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('mydata') }}" class="btn btn-indigo btn-block">Mis Datos</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Inicio de tarjeta --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card">
                    <img src="{{ asset('imgs/myarticles.png') }}" class="card-img-top" height="240px">
                    <div class="card-body">
                        <a href="{{ url('editor/index') }}" class="btn btn-indigo btn-block">Mis Articulos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection