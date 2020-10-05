@extends('layouts.app')

@section('content')
<table class="border-separate border-2 text-center border-gray-500 mt-3" style="width: 100%">
    <thead>
        <tr>
        <th class="px-4 py-2">{{ __("id")}}</th>
        <th class="px-4 py-2">{{ __("Genero")}}</th>
        <th class="px-4 py-2">{{ __("Acciones")}}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($generos as $genero)
            <tr>
                <td class="border px-4 py-2">{{ $genero->id }}</td>
                <td class="border px-4 py-2">{{ $genero->genero }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route("generos.edit", ["genero" => $genero]) }}" class="text-blue-400">{{ __("Editar") }}</a> |
                    <a
                        href="#"
                        class="text-red-400"
                        onclick="event.preventDefault();
                            document.getElementById('delete-genero-{{ $genero->id }}-form').submit();"
                    >{{ __("Eliminar") }}
                    </a>
                    <form id="delete-genero-{{ $genero->id }}-form" action="{{ route("generos.destroy", ["genero" => $genero]) }}" method="POST" class="hidden">
                        @method("DELETE")
                        @csrf
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                        <p><strong class="font-bold">{{ __("Datos vacios") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                    
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection