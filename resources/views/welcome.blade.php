@extends('layouts.app')
    <link href="{{asset('css/galleryArticles.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
@section('content')

<h1 style="text-align:center;color:blank;">IMAGENES DE CATEGORIA</h1><br>

    {{-- Seleccion de articulos --}}                                                             
    <div align="center">
        <div class="content-select">
            <select name="catid" id="catid" class="form-control">
                <option value="">Seleccione una Categoria</option>
                <option value="0">Todas</option>
                @foreach ($cats as $cat)
                    <option value="{{ $cat->id}}">{{ $cat->name}}</option>
                @endforeach
            </select>
            <img src="{{ asset('imgs/loading.gif') }}" class="loader mt-5 d-none" height="100px">
            <i></i>
        </div>
    </div><br>
    {{-- Fin del select --}}

<div class="container" id="content">
    @csrf
        <div class="container-fluid" style="margin-top:20px;">
            {{-- <hr noshade style="margin-top:-20px;"> --}}
            {{-- Imagenes --}}
            <div class="container">
                @foreach ($cats as $cat)
                <div class="card">   
                  <div class="card-body">
                    <img src="{{ asset($cat->image) }}" class="img-thumbnail" width="80px" height="80px">
                    <label class="text-capitalize font-weight-bold" style="font-size: 1.5rem;">{{ $cat->name }}</label>
                  </div>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($artsbycats as $abc)
                            @if ($abc->category_id == $cat->id)
                                <div class="tab-pane fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">
                                    <div class="Portfolio"><img src="{{asset($abc->image)}}"><div class="desc">{{$abc->description}}</div></div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div> 
                @endforeach
            </div>
        </div>
</div>
@endsection

