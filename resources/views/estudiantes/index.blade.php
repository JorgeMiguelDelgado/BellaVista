@extends("layouts.app")

@section('content')
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-5">
        <div class="text-center">
        <h1 class="mb-5">{{ __("Lista de Estudiantes")}}</h1>
        <a href="{{route("estudiantes.create")}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        {{ __("Añadir Estudiante")}}
        </a>
        </div>
    </div>
    <table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
        <thead>
            <tr>
            <th class="px-4 py-2">{{ __("Nombre")}}</th>
            <th class="px-4 py-2">{{ __("Apellidos")}}</th>
            <th class="px-4 py-2">{{ __("Direccion")}}</th>
            <th class="px-4 py-2">{{ __("Fecha de Nacimiento")}}</th>
            <th class="px-4 py-2">{{ __("Tutor a Cargo")}}</th>
            <th class="px-4 py-2">{{ __("Telefono del tutor")}}</th>
            <th class="px-4 py-2">{{ __("Autenticación")}}</th>
            <th class="px-4 py-2">{{ __("Género")}}</th>
            <th class="px-4 py-2">{{ __("Acciones")}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($estudiantes as $estudiante)
                <tr>
                    <td class="border px-4 py-2">{{ $estudiante->nombres }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->apellidos }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->direccion }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->fech_nac }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->tutor }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->Telf_tutor }}</td>
                    <td class="border px-4 py-2">{{ $estudiante->autenticacion }}</td>

                    @foreach($generos as $genero)
                    @if($estudiante->id_genero == $genero->id)
                    <td class="border px-4 py-2">{{$genero->genero}}</td>
                    @endif
                    @endforeach

                    <td class="border px-4 py-2">{{ date_format($estudiante->created_at, "d/m/Y") }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route("estudiantes.edit", ["estudiante" => $estudiante]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                        <a
                            href="#"
                            class="text-red-400"
                            onclick="event.preventDefault();
                                document.getElementById('delete-estudiante-{{ $estudiante->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-estudiante-{{ $estudiante->id }}-form" action="{{ route("estudiantes.destroy", ["estudiante" => $estudiante]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                            <p><strong class="font-bold">{{ __("No hay proyectos") }}</strong></p>
                            <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                        
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    @if($estudiantes->count())
        <div class="mt-3">
            {{ $estudiantes->links() }}
        </div>
    @endif

@endsection