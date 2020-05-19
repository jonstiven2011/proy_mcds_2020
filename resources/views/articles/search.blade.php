{{-- Encuentra la busqueda de Articulos --}}
@forelse ($articles as $article)
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
{{-- Permite verficar si hay articulos con esa letra o nombre --}}
@empty
<tr>
    <td colspan="4" class="bg-info text-light">
    No hay Articulos con ese nombre!
    </td>
</tr>
@endforelse