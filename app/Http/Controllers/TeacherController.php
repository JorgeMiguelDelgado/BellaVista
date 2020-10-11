<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::with("genero")->paginate(10);
        return view("teachers.index", compact("teachers"),[
            "generos"=>Genero::get()
            ]);    
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $generos=Genero::get();
        $teacher=new Teacher;
        $title= __("Añadir Profesor");
        $textButton= __("Crear");
        $route=route("teachers.store");
        return view("teachers.create", compact("title","textButton","route","teacher","generos"));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nombres"=>"required",
            "apellidos"=>"required",
            "direccion"=>"required",
            "email"=>"required",
            "usuario"=>"required|unique:teachers",
            "password"=>"required",
            "fech_nacimiento"=>"required",
            "telefono"=>"required",
            "id_genero"=>"required"
        ]);
        Teacher::create($request->only("nombres", "apellidos", "direccion", "email", "usuario", "password", "fech_nacimiento", "telefono", "id_genero"));
        return redirect(route("teachers.index"))
        ->with("success", __("¡Profesor registrado!"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        $update=true;
        $title= __("Editar datos del Profesor");
        $generos=Genero::get();
        $textButton=__("Actualizar");
        $route=route("teachers.update",["teacher"=>$teacher]);
        return view("teachers.edit", compact("update", "title","textButton","route","teacher","generos"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $this->validate($request,[
            "nombres"=>"required",
            "apellidos"=>"required",
            "direccion"=>"required",
            "email"=>"required",
            "usuario"=>"required",
            "password"=>"required",
            "fech_nacimiento"=>"required",
            "telefono"=>"required",
            "id_genero"=>"required"

        ]);
        $teacher->fill($request->only("nombres","apellidos","direccion","email","usuario","password","fech_nacimiento","telefono","id_genero"))->save();
        return back()->with("success", __("¡Datos de Profesor actualizado!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return back()->with("success", __("¡Datos de Profesor Eliminado!"));
    }
}
