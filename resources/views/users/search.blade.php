{{--  --}}
@forelse ($users as $user)
    <tr>
        <td>{{$user->fullname}}</td>
        <td>{{$user->email}}</td>
        <td><img src="{{asset($user->photo)}}" width="40px"></td>
        <td>
            {{-- Boton de buscar --}}
            <a href="{{ url('users/'.$user->id) }}" class="btn btn-indigo btn-sm"> 
                <i class="fa fa-search"></i> 
            </a>
            {{-- Boton de editar --}}
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-indigo btn-sm"> 
                <i class="fa fa-pen"></i> 
            </a>
            {{-- Botono de eliminar con seguridad--}}
            <form action="{{ url('users/'.$user->id) }}" method="post" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm btn-delete">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </td>
    </tr>
{{-- Permite verficar si hay usuarios o correos con esa letra o nombre --}}
@empty
<tr>
    <td colspan="4" class="bg-info text-light">
    No hay Usuarios con ese nombre o correo electrónico!
    </td>
</tr>
@endforelse