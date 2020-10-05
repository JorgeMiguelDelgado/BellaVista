<div class="w-full max-w-lg">
    <div class="flex flex-wrap">
        <h1 class="mb-5">{{ $title }}</h1>
    </div>
</div>

<form class="w-full max-w-lg" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Nombres") }}
            </label>
            <input name="name" value="{{ old("nombres") ?? $estudiante->nombres }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombres" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Nombre del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Apellidos") }}
            </label>
            <input name="name" value="{{ old("apellidos") ?? $estudiante->apellidos }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="apellidos" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Apellidos del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Nombres") }}
            </label>
            <input name="name" value="{{ old("direccion") ?? $estudiante->direccion }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="direccion" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Direccion de domicilio del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Fecha de nacimiento") }}
            </label>
            <input name="name" value="{{ old("fech_nac") ?? $estudiante->fech_nac }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fech_nac" type="date">
            <p class="text-gray-600 text-xs italic">{{ __("Fecha de nacimiento del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Nombre del tutor o tutora a cargo") }}
            </label>
            <input name="name" value="{{ old("tutor") ?? $estudiante->tutor }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="tutor" type="text">
            <p class="text-gray-600 text-xs italic">{{ __("Nombre del tutor") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Telefono del tutor") }}
            </label>
            <input name="name" value="{{ old("Telf_tutor") ?? $estudiante->Telf_tutor }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="Telf_tutor" type="number">
            <p class="text-gray-600 text-xs italic">{{ __("Telefono/Celular del tutor") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Codigo de Autenticación") }}
            </label>
            <input name="name" value="{{ old("autenticacion") ?? $estudiante->autenticacion }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="autenticacion" type="password">
            <p class="text-gray-600 text-xs italic">{{ __("Codigo de autenticacion del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
        
    <div class="flex flex-wrap -mx-3 mb-6">
        
    
        <div class="w-full px-3">
            
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                {{ __("Género") }}
            </label>
            
                <select name="name"  id="generos">
                @foreach ($generos as $genero)
                    <option value="{{ $genero->id }}">{{$genero->id->genero}}</option>
                @endforeach
                </select>
            
            
            <p class="text-gray-600 text-xs italic">{{ __("Género del estudiante") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
            
        </div>
        
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>
